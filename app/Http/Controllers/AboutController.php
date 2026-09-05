<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $about = About::where('id', 1)->first();
        
        return view('about.about', ['about' => $about, 'meta_title' => getSettingData('config_about_meta_title'), 'meta_description' => getSettingData('config_about_meta_description'), 'meta_keyword' => getSettingData('config_about_meta_keyword'), 'schema_tag' => getSettingData('config_about_schema_tag')]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = About::where('id', 1)->first();
        return view('about.index', ['result' => $result]);
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
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        $request->validate([
            'core_values' => ['nullable', 'array'],
            'core_values.*.title' => ['nullable', 'string', 'max:255'],
            'core_values.*.description' => ['nullable', 'string'],
        ]);

        if(!empty($request->experience_img))
        {
            $get_experience_img = explode('storage/', $request->experience_img);
            $request->merge(['experience_img' => $get_experience_img[1]]);
        }
        else
        {
            $request->merge(['experience_img' => $request->edit_experience_img]);
        }
        
        if(!empty($request->distribution_network_img))
        {
            $get_distribution_network_img = explode('storage/', $request->distribution_network_img);
            $request->merge(['distribution_network_img' => $get_distribution_network_img[1]]);
        }
        else
        {
            $request->merge(['distribution_network_img' => $request->edit_distribution_network_img]);
        }

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
        $request->merge(['our_clients' => json_encode($img_arr)]);

        $core_values = collect($request->input('core_values', []))
            ->filter(fn ($value) => !empty($value['title']) || !empty($value['description']))
            ->map(fn ($value) => [
                'title' => $value['title'] ?? '',
                'description' => $value['description'] ?? '',
            ])
            ->values()
            ->all();
        $request->merge(['core_values' => json_encode($core_values)]);
        
        if($about->update($request->all()))
        {
            return redirect()->route('about.index')->with('success_message', 'Data Successfully Updated');
        }
        else
        {
            return redirect()->route('about.index')->with('error_message', 'Opps something went wrong!');
        }
    }

    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(About::where('id', $id)->update([$column_name => '']))
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
