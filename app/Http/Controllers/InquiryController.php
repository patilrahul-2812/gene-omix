<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Mail\InquiryMail;
use Illuminate\Support\Facades\Mail;
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;

class InquiryController extends Controller
{
    public function contact()
    {
        return view('contact.contact', ['meta_title' => getSettingData('config_contact_us_meta_title'), 'meta_description' => getSettingData('config_contact_us_meta_description'), 'meta_keyword' => getSettingData('config_contact_us_meta_keyword'), 'schema_tag' => getSettingData('config_contact_us_schema_tag')]);
    }

    public function submit_inquiry(Request $request): RedirectResponse
    {
        $request->validate([
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $string = strtolower($request->full_name. $request->message);

        foreach(config('custom.spamwords') as $url)
        {
            if(strpos($string, $url) !== FALSE)
            {
                return back()->with('error_message', 'Something Went Wrong. Please Try Again!');
                return false;
                die;
            }
        }

        if(Inquiry::create($request->all()))
        {
            $email_separation = explode(',', getSettingData('config_getting_inquiry_form_email'));

            foreach($email_separation as $eskey => $recipient)
            {
                Mail::to($recipient)->send(new InquiryMail($request->all()));
            }

            return redirect()->route('contact')->with('success_message', 'We Have Received Your Inquiry. We Will Connect You.');
        }

        return redirect()->route('contact')->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = Inquiry::get();

            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('inquiry.show',$row->id)."' title='View'><i class='fa fa-eye'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['full_name'] = $row->full_name;
                    $nest['email'] = $row->email;
                    $nest['mobile_no'] = $row->mobile_no;
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('inquiry.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inquiry $inquiry)
    {
        return view('inquiry.show', compact('inquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inquiry $inquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inquiry $inquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inquiry $inquiry)
    {
        
    }

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (Inquiry::whereIn('id', $data_id)->delete())
            {
                $status=true;
                $message="Record successfully deleted";
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
