<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\OurProductInquiry;
use App\Models\Inquiry;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;

class UserController extends Controller
{
    function getData()
    {
        return User::all();
    }

    public function login()
    {
        return view('user.login');
    }

    public function update_password(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ],[
            'old_password.required'=>'Old Password is Required',
            'new_password.required' => 'Please Enter New Password',
            'new_password.min' => 'New Password At Least 8 Characters',
            'confirm_new_password.required' => 'Please Enter Confirm Password',
            'confirm_new_password.same' => 'New Password & Confirm Password Not Match'
        ]);

        /*validation FOr request
            - Old password req.
            - New password lend/req
            - new password not same with old password
            - New passwrd same as confirm password
            */

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            return redirect()->back()->with("error_message","Your Old Password Does Not Matches With the Provided Password. Please try again.");
        }

        if(User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->new_password)]))
        {
            return redirect()->route('changepassword')->with('success_message', 'Your Password Updated Successfully. When You Login Use New Password');
        }

        return redirect()->route('changepassword')->with('error_message', 'Your Password Not Update. Please Try Again!');
    }

    public function dashboard()
	{
        $product_inquiry = OurProductInquiry::count();
        $inquiry = Inquiry::count();

        return view('user.admin_dashboard', ['product_inquiry' => $product_inquiry, 'inquiry' => $inquiry]);
	}

    public function change_password()
    {
        return view('user.change_password');
    }

    public function update_profile(Request $request)
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if(User::where('id', $user_id)->update($request->except(['_token','confirm_password','_profile'])))
		{
			return redirect()->route('admin.profile')->with('success_message', 'Successfully Submitted');
		}
        else
        {
			return redirect()->route('admin.profile')->with('error_message', 'Opps Something Went Wrong');
		}
    }

    public function profile()
	{
		$user_id=Auth::user()->id;
		$user = User::where('id',$user_id)->first()->toArray();

		/* $last_login=\AppHelper::getLastLogin();
		$login_history=\AppHelper::getLoginHistory();*/
        
  	    return view('user.profile',["user"=>$user]);
	}

    public function login_submit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user_data_username = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password'),
            'status' => 1
        );

        if(Auth::attempt($user_data_username))
		{
		 	// \AppHelper::addLoginHistory();

            return redirect()->route('dashboard');
		}
		else
		{
		    return back()->with('error_message', 'Username Or Password Incorrect');
		}
    }

    public function check_duplication(Request $request)
    {
        if($request->ajax())
        {
            $check_dup = '';
            if($request->email_id)
            {
                $check_dup = User::where('email_id', $request->email_id)->first();
            }
            elseif($request->id_number)
            {
                $check_dup = User::where('id_number', $request->id_number)->first();
            }

            if(isset($check_dup->id))
            {
                echo "false"; //already registered
                die;
            }
            else
            {
                echo "true";
                die;
            }
        }
    }

    public function forgot_password(Request $request)
    {
        $token = Str::random(64);

        $email_exist = User::where(['email_id' => $request->email, 'status' => 1, 'role_id' => [1,2]])->first();

        if(!empty($email_exist))
        {
            $insert = array(
                'email' => $request->email,
                'token' => $token,
                'created_at' => date('Y-m-d H:i:s')
            );

            \App\Models\PasswordReset::create($insert);

            $email_exist->remember_token = $token;
            User::where('id', $email_exist->id)->update(['remember_token' => $token]);

            $result = array(
                'first_name' => $email_exist->first_name,
                'last_name' => $email_exist->last_name,
                'token' => $token
            );

            Mail::to($email_exist->email_id)->send(new ForgotPasswordMail($result));

            return back()->with('success_message', 'Forgot Password link is send to your registered email id');
        }

        return back()->with('error_message', 'Sorry this email id is not registered');
    }

    public function post_password(Request $request, $remember_token)
    {
        $result = User::where('remember_token', $remember_token)->first();

        if(!empty($result))
        {
            if($request->new_password == $request->confirm_new_password)
            {
                User::where('id', $result->id)->update(['password' => Hash::make($request->confirm_new_password), 'remember_token' => '']);

                if($result->role_id == 1)
                {
                    return redirect()->route('login')->with('success_message', 'Your password is updated successfully. Login with new password');
                }
                else
                {
                    return redirect()->route('thank.you')->with('success_message', 'Your password is updated successfully. Login with new password');
                }
            }
            else
            {
                return redirect()->back()->with('error_message', 'New Password & Confirm Password Not match. Please Try Again!');
            }
        }
    }

    public function reset_password($remember_token)
    {
        $user = User::where('remember_token', $remember_token)->first();

        if(!empty($user))
        {
            return view('user.reset_password', ['result' => $user]);
        }
        else
        {
            abort(404);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = User::select('id', 'first_name', 'middle_name', 'last_name', 'email_id', 'mobile_no', 'status')->whereNotIn('role_id', [1,3])->get();

            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('user.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['full_name'] = $row->first_name.' '.$row->middle_name.' '.$row->last_name;
                    $nest['email_id'] = $row->email_id;
                    $nest['mobile_no'] =  $row->mobile_no;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('user.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['role_id' => 2]);

        if(User::create($request->all()))
        {
            return redirect()->route('user.index')->with('success_message', 'Data Successfully Submitted');
        }
        else
        {
            return redirect()->route('user.add')->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', ['result' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data = $request->except(['_token', '_method' ]);

        if(User::where('id', $request->id)->update($data))
        {
            return redirect()->route('user.index')->with('success_message', 'Data Successfully Updated');
        }
        else
        {
            return redirect()->route('user.edit', [$id])->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success_message', 'Successfully Logout');
    }

    function change_status(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->status_id;
            $status = $request->status;

            if(User::where('id',$id)->update(['status'=>$status]))
            {
                $status=true;
                $message="Status successfully updated";
            }
            else
            {
                $status=false;
                $message="Opps Something went wrong";
            }
        }
        else
        {
            $status=false;
            $message="Bad Request";
        }

        return response()->json(['status'=>$status,'message'=>$message]);
    }
}
