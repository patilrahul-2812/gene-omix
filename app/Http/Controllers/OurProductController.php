<?php

namespace App\Http\Controllers;

use App\Models\OurProduct;
use App\Models\Brand;
use Illuminate\Http\Request;

class OurProductController extends Controller
{
    public function ourproduct(Request $request)
    {
        $ourproduct = OurProduct::where('status', 1)->orderBy('sort_order', 'ASC')->get();

        return view('ourproduct.ourproduct', ['ourproduct' => $ourproduct, 'meta_title' => getSettingData('config_our_product_meta_title'), 'meta_description' => getSettingData('config_our_product_meta_description'), 'meta_keyword' => getSettingData('config_our_product_meta_keyword'), 'schema_tag' => getSettingData('config_our_product_schema_tag')]);
    }

    public function ourproduct_detail(Request $request)
    {
        $ourproductdetail = OurProduct::where('seo_url', $request->slug)->firstOrFail();

        if($ourproductdetail->id == 1)
        {
            return view('ourproduct.surface_plasmon', ['ourproductdetail' => $ourproductdetail, 'meta_title' => $ourproductdetail->meta_title, 'meta_description' => $ourproductdetail->meta_description, 'meta_keyword' => $ourproductdetail->meta_keyword, 'schema_tag' => $ourproductdetail->schema_tag]);
        }

        return view('ourproduct.ourproductdetail', ['ourproductdetail' => $ourproductdetail, 'meta_title' => $ourproductdetail->meta_title, 'meta_description' => $ourproductdetail->meta_description, 'meta_keyword' => $ourproductdetail->meta_keyword, 'schema_tag' => $ourproductdetail->schema_tag]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = OurProduct::get();
            
            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('ourproduct.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['product_name'] =  $row->product_name;
                    $nest['sort_order'] =  $row->sort_order;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('ourproduct.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brandlist = Brand::where('status', 1)->pluck('brand_name', 'id');
        return view('ourproduct.create', compact('brandlist'));
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
        
        if(!empty($request->brochure))
        {
            $get_brochure = explode('storage/', $request->brochure);
            $request->merge(['brochure' => $get_brochure[1]]);
        }

        if(OurProduct::create($request->all()))
        {
            return redirect()->route('ourproduct.index')->with('success_message', 'Data Successfully Submitted');
        }

        return redirect()->route('ourproduct.add')->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurProduct $ourProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurProduct $ourproduct)
    {
        $brandlist = Brand::where('status', 1)->pluck('brand_name', 'id');
        return view('ourproduct.edit',compact('ourproduct', 'brandlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurProduct $ourproduct)
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
        
        if(!empty($request->brochure))
        {
            $get_brochure = explode('storage/', $request->brochure);
            $request->merge(['brochure' => $get_brochure[1]]);
        }
        else
        {
            $request->merge(['brochure' => $request->edit_brochure]);
        }

        if($ourproduct->update($request->all()))
        {
            return redirect()->route('ourproduct.index')->with('success_message', 'Data Successfully Updated');
        }
        
        return redirect()->route('ourproduct.edit', $ourproduct->id)->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurProduct $ourProduct)
    {
        //
    }

    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(OurProduct::where('id', $id)->update([$column_name => '']))
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

            if (OurProduct::whereIn('id',$data_id)->delete())
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

            if(OurProduct::where('id',$id)->update(['status'=>$status]))
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
