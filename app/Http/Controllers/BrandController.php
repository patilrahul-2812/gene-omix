<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function brand(Request $request)
    {
        $brand = Brand::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        
        return view('brand.brand', ['brand' => $brand, 'meta_title' => getSettingData('config_brand_meta_title'), 'meta_description' => getSettingData('config_brand_meta_description'), 'meta_keyword' => getSettingData('config_brand_meta_keyword'), 'schema_tag' => getSettingData('config_brand_schema_tag')]);
    }

    public function brand_detail(Request $request)
    {
        $branddetail = Brand::where('seo_url', $request->slug)->with('ourproduct')->firstOrFail();

        return view('brand.brand_detail', ['branddetail' => $branddetail, 'meta_title' => $branddetail->meta_title, 'meta_description' => $branddetail->meta_description, 'meta_keyword' => $branddetail->meta_keyword, 'schema_tag' => $branddetail->schema_tag]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = Brand::get();
            
            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('brand.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['brand_name'] =  $row->brand_name;
                    $nest['sort_order'] =  $row->sort_order;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('brand.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->brand_logo))
        {
            $get_brand_logo = explode('storage/', $request->brand_logo);
            $request->merge(['brand_logo' => $get_brand_logo[1]]);
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
        
        if(!empty($request->brochure))
        {
            $get_brochure = explode('storage/', $request->brochure);
            $request->merge(['brochure' => $get_brochure[1]]);
        }

        if(Brand::create($request->all()))
        {
            return redirect()->route('brand.index')->with('success_message', 'Data Successfully Submitted');
        }
        
        return redirect()->route('brand.add')->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
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
        
        if(!empty($request->brand_logo))
        {
            $get_brand = explode('storage/', $request->brand_logo);
            $request->merge(['brand_logo' => $get_brand[1]]);
        }
        else
        {
            $request->merge(['brand_logo' => $request->edit_brand_logo]);
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
        
        if(!empty($request->brochure))
        {
            $get_brochure = explode('storage/', $request->brochure);
            $request->merge(['brochure' => $get_brochure[1]]);
        }
        else
        {
            $request->merge(['brochure' => $request->edit_brochure]);
        }
        
        if($brand->update($request->all()))
        {
            return redirect()->route('brand.index')->with('success_message', 'Data Successfully Updated');
        }
        
        return redirect()->route('brand.edit', $brand->id)->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }

    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(Brand::where('id', $id)->update([$column_name => '']))
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

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (Brand::whereIn('id',$data_id)->delete())
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

            if(Brand::where('id',$id)->update(['status'=>$status]))
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
