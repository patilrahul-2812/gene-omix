<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service(Request $request)
    {
        $service = Service::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        
        return view('service.service', ['service' => $service, 'meta_title' => getSettingData('config_services_meta_title'), 'meta_description' => getSettingData('config_services_meta_description'), 'meta_keyword' => getSettingData('config_services_meta_keyword'), 'schema_tag' => getSettingData('config_services_schema_tag')]);
    }

    public function service_detail(Request $request)
    {
        $servicedetail = Service::where('seo_url', $request->slug)->firstOrFail();
        $otherservice = Service::where('status', 1)->whereNot('seo_url', $request->slug)->get();

        return view('service.service_detail', ['servicedetail' => $servicedetail, 'otherservice' => $otherservice, 'meta_title' => $servicedetail->meta_title, 'meta_description' => $servicedetail->meta_description, 'meta_keyword' => $servicedetail->meta_keyword, 'schema_tag' => $servicedetail->schema_tag]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = Service::get();
            
            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('service.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['service_name'] =  $row->service_name;
                    $nest['sort_order'] =  $row->sort_order;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('service.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->icon))
        {
            $get_icon = explode('storage/', $request->icon);
            $request->merge(['icon' => $get_icon[1]]);
        }
        
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

        if(Service::create($request->all()))
        {
            return redirect()->route('service.index')->with('success_message', 'Data Successfully Submitted');
        }

        return redirect()->route('service.add')->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        if(!empty($request->icon))
        {
            $get_icon = explode('storage/', $request->icon);
            $request->merge(['icon' => $get_icon[1]]);
        }
        else
        {
            $request->merge(['icon' => $request->edit_icon]);
        }
        
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

        if($service->update($request->all()))
        {
            return redirect()->route('service.index')->with('success_message', 'Data Successfully Updated');
        }
        
        return redirect()->route('service.edit', $service->id)->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }

    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(Service::where('id', $id)->update([$column_name => '']))
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

            if (Service::whereIn('id',$data_id)->delete())
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

            if(Service::where('id',$id)->update(['status'=>$status]))
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
