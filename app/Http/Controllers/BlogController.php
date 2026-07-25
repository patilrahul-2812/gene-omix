<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        $blog = Blog::where('status', 1)->orderBy('sort_order', 'ASC')->get();

        return view('blog.blog', ['blog' => $blog, 'meta_title' => getSettingData('config_blog_meta_title'), 'meta_description' => getSettingData('config_blog_meta_description'), 'meta_keyword' => getSettingData('config_blog_meta_keyword'), 'schema_tag' => getSettingData('config_blog_schema_tag')]);
    }

    public function blog_detail(Request $request)
    {
        $blogdetail = Blog::where('seo_url', $request->slug)->firstOrFail();

        return view('blog.blog_detail', ['blogdetail' => $blogdetail, 'meta_title' => $blogdetail->meta_title, 'meta_description' => $blogdetail->meta_description, 'meta_keyword' => $blogdetail->meta_keyword, 'schema_tag' => $blogdetail->schema_tag]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = Blog::get();
            
            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('blog.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['title'] =  $row->title;
                    $nest['sort_order'] =  $row->sort_order;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('blog.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->image))
        {
            $get_image = explode('storage/', $request->image);
            $request->merge(['image' => $get_image[1]]);
        }

        if(!empty($request->banner_image))
        {
            $get_banner_image = explode('storage/', $request->banner_image);
            $request->merge(['banner_image' => $get_banner_image[1]]);
        }

        if(Blog::create($request->all()))
        {
            return redirect()->route('blog.index')->with('success_message', 'Data Successfully Submitted');
        }

        return redirect()->route('blog.add')->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if(!empty($request->image))
        {
            $get_image = explode('storage/', $request->image);
            $request->merge(['image' => $get_image[1]]);
        }
        else
        {
            $request->merge(['image' => $request->edit_image]);
        }
        
        if(!empty($request->banner_image))
        {
            $get_banner_image = explode('storage/', $request->banner_image);
            $request->merge(['banner_image' => $get_banner_image[1]]);
        }
        else
        {
            $request->merge(['banner_image' => $request->edit_banner_image]);
        }

        if($blog->update($request->all()))
        {
            return redirect()->route('blog.index')->with('success_message', 'Data Successfully Updated');
        }
        
        return redirect()->route('blog.edit', $blog->id)->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(Blog::where('id', $id)->update([$column_name => '']))
            {
                $status=true;
                $message="Image Removed successfully updated";
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

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (Blog::whereIn('id',$data_id)->delete())
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

            if(Blog::where('id',$id)->update(['status'=>$status]))
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
