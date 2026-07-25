<?php
    function servicelist() 
    {
        $servicelist = \App\Models\Service::where('status', 1)->orderBy('sort_order', 'ASC')->get();
    
        return $servicelist;
    }
    
    function ourproductlist() 
    {
        $ourproductlist = \App\Models\OurProduct::where('status', 1)->orderBy('sort_order', 'ASC')->get();

        return $ourproductlist;
    }

    function gender_list()
    {
        $gender_list = array(
            '' => 'Select',
            'Male' => 'Male',
            'Female' => 'Female',
        );

        return $gender_list;
    }

    function status()
    {
        $status_arr = array(
            '1' => 'Active',
            '0' => 'Inactive'
        );

        return $status_arr;
    }

    function check_curtain_data()
    {
        return \App\Models\Setting::where('config_key','is_banner_active')->first()->config_value;
    }

    function getImage($image_path)
    {
        if(isset($image_path) && !empty($image_path))
        {
            $image = asset('storage/'.$image_path);
        }
        else
        {
            $image=asset(config('constants.default_image'));
        }

        return $image;
    }

    function IsParent()
    {
        $is_parent_arr = array(
            '0' => 'No',
            '1' => 'Yes'
        );

        return $is_parent_arr;
    }

    function getSettingData($key)
    {
        $data = \App\Models\Setting::select('config_value')->where('config_key', $key)->get()->first();

        if(!empty($data->config_value))
        {
            return $data->config_value;
        }
        else
        {
            return '';
        }
    }

    function getFooterAbout()
    {
        $data = \App\Models\About::where('id', 1)->first();

        return $data;
    }

    function getWorkgallery()
    {
        $data = \App\Models\WorkGallery::where('id', 1)->first();

        return $data;
    }