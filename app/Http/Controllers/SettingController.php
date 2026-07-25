<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = Setting::where('master_key', '=', 'config')->get();

		return view('setting.index');
    }

    public function setting_submit(Request $request)
    {
        if(!empty($request->company_logo))
        {
            $get_company_logo = explode('storage/', $request->company_logo);
            $request->merge(['company_logo' => $get_company_logo[1]]);
        }
        else
        {
            $request->merge(['company_logo' => $request->edit_company_logo]);
        }

        if(!empty($request->company_fav_logo))
        {
            $get_company_fav_logo = explode('storage/', $request->company_fav_logo);
            $request->merge(['company_fav_logo' => $get_company_fav_logo[1]]);
        }
        else
        {
            $request->merge(['company_fav_logo' => $request->edit_company_fav_logo]);
        }
        
        if(!empty($request->config_about_banner_image))
        {
            $get_config_about_banner_image = explode('storage/', $request->config_about_banner_image);
            $request->merge(['config_about_banner_image' => $get_config_about_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_about_banner_image' => $request->edit_config_about_banner_image]);
        }
        
        if(!empty($request->config_brand_banner_image))
        {
            $get_config_brand_banner_image = explode('storage/', $request->config_brand_banner_image);
            $request->merge(['config_brand_banner_image' => $get_config_brand_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_brand_banner_image' => $request->edit_config_brand_banner_image]);
        }
        
        if(!empty($request->config_services_banner_image))
        {
            $get_config_services_banner_image = explode('storage/', $request->config_services_banner_image);
            $request->merge(['config_services_banner_image' => $get_config_services_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_services_banner_image' => $request->edit_config_services_banner_image]);
        }
        
        if(!empty($request->config_our_product_banner_image))
        {
            $get_config_our_product_banner_image = explode('storage/', $request->config_our_product_banner_image);
            $request->merge(['config_our_product_banner_image' => $get_config_our_product_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_our_product_banner_image' => $request->edit_config_our_product_banner_image]);
        }
        
        if(!empty($request->config_blog_banner_image))
        {
            $get_config_blog_banner_image = explode('storage/', $request->config_blog_banner_image);
            $request->merge(['config_blog_banner_image' => $get_config_blog_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_blog_banner_image' => $request->edit_config_blog_banner_image]);
        }
        
        if(!empty($request->config_knowledge_hub_banner_image))
        {
            $get_config_knowledge_hub_banner_image = explode('storage/', $request->config_knowledge_hub_banner_image);
            $request->merge(['config_knowledge_hub_banner_image' => $get_config_knowledge_hub_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_knowledge_hub_banner_image' => $request->edit_config_knowledge_hub_banner_image]);
        }
        
        if(!empty($request->config_contact_us_banner_image))
        {
            $get_config_contact_us_banner_image = explode('storage/', $request->config_contact_us_banner_image);
            $request->merge(['config_contact_us_banner_image' => $get_config_contact_us_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_contact_us_banner_image' => $request->edit_config_contact_us_banner_image]);
        }
        
        if(!empty($request->config_our_team_banner_image))
        {
            $get_config_our_team_banner_image = explode('storage/', $request->config_our_team_banner_image);
            $request->merge(['config_our_team_banner_image' => $get_config_our_team_banner_image[1]]);
        }
        else
        {
            $request->merge(['config_our_team_banner_image' => $request->edit_config_our_team_banner_image]);
        }

        $result = Setting::where('master_key', '=', 'config')->get();

        if(($request->all()) != 'null' && !empty($request->all()))
        {
            foreach($request->all() as $key => $value)
            {
                if($key != '_token')
                {
                    if(!empty($result))
                    {
                        foreach($result as $k => $val)
                        {
                            if($val['config_key'] == $key)
                            {
                                Setting::where('id', $val['id'])->update(['config_value' => $value]);
                            }
                        }
                    }
                }
            }
        }
        return redirect()->route('setting.index')->with('success_message', 'Data Successfully Submitted');
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
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
