<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function course_detail(Request $request)
    {
        $course_data = Course::where('seo_url', $request->slug)->firstorFail();

        return view('course.course_detail', ['course_data' => $course_data, 'meta_title' => $course_data->meta_title, 'meta_description' => $course_data->meta_description, 'meta_keyword' => $course_data->meta_keyword, 'schema_tag' => $course_data->schema_tag]);
    }

    public function course_inquiry(Request $request)
    {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = Course::select('id', 'category_id', 'course_name', 'sort_order', 'status')->with('category:id,category_name')->get();

            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('course.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['category_name'] = $row->category->category_name;
                    $nest['course_name'] =  $row->course_name;
                    $nest['sort_order'] =  $row->sort_order;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('course.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course_category_list = \App\Models\Category::where('status', 1)->pluck('category_name', 'id');

        return view('course.create', ['course_category_list' => $course_category_list]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->multiple_image))
        {
            foreach($request->multiple_image as $ikey => $ivalue)
            {
                if(!empty($ivalue['image']))
                {
                    $get_image = explode('storage/', $ivalue['image']);
                    $explode_array[] = array(
                        'image' => $get_image[1]
                    );
                }
            }
            $request->merge(['image' => json_encode($explode_array)]);
        }

        $request->merge(['seo_url' => Str::slug($request->course_name, '-')]);

        if(Course::create($request->all()))
        {
            return redirect()->route('course.index')->with('success_message', 'Data Successfully Submitted');
        }
        else
        {
            return redirect()->route('course.add')->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $course_category_list = \App\Models\Category::where('status', 1)->pluck('category_name', 'id');

        return view('course.edit', ['result' => $course,'course_category_list' => $course_category_list]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $img_arr = array();
        if(!empty($request->multiple_image))
        {
            foreach($request->multiple_image as $ikey => $ivalue)
            {
                if(!empty($ivalue['image']))
                {
                    $get_image = explode('storage/', $ivalue['image']);
                    $img_url = $get_image[1]; 
                }
                else
                {
                    $img_url = $ivalue['edit_image'];
                }

                $img_arr[] = array(
                    'image' => $img_url
                );
            }
        }
        $request->merge(['image' => json_encode($img_arr)]);

        $request->merge(['seo_url' => Str::slug($request->course_name, '-')]);

        if($course->update($request->all()))
        {
            return redirect()->route('course.index')->with('success_message', 'Data Successfully Updated');
        }
        else
        {
            return redirect()->route('course.edit', $course->id)->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (Course::whereIn('id',$data_id)->delete())
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

            if(Course::where('id',$id)->update(['status'=>$status]))
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
