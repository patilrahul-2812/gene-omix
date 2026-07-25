<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = Testimonial::select('id', 'client_name', 'sort_order', 'status')->get();

            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('testimonial.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['client_name'] =  $row->client_name;
                    $nest['sort_order'] =  $row->sort_order;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('testimonial.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->profile_image))
        {
            $get_image = explode('storage/', $request->profile_image);
            $request->merge(['profile_image' => $get_image[1]]);
        }

        if(Testimonial::create($request->all()))
        {
            return redirect()->route('testimonial.index')->with('success_message', 'Data Successfully Submitted');
        }
        else
        {
            return redirect()->route('testimonial.add')->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit', ['result' => $testimonial]);
    }

    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(Testimonial::where('id', $id)->update([$column_name => '']))
            {
                $status=true;
                $message="Image Delete Successfully";
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        if(!empty($request->profile_image))
        {
            $get_image = explode('storage/', $request->profile_image);
            $request->merge(['profile_image' => $get_image[1]]);
        }
        else
        {
            $request->merge(['profile_image' => $request->edit_image]);
        }
        
        if($testimonial->update($request->all()))
        {
            return redirect()->route('testimonial.index')->with('success_message', 'Data Successfully Updated');
        }
        else
        {
            return redirect()->route('testimonial.edit')->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        //
    }

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (Testimonial::whereIn('id',$data_id)->delete())
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

    public function change_status(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->status_id;
            $status = $request->status;

            if(Testimonial::where('id',$id)->update(['status'=>$status]))
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
