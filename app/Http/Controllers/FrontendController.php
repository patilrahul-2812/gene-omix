<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\About;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function home(Request $request)
    {
        $slider = Slider::where('status', 1)->orderBy('sort_order', 'ASC')->get();
        $about = About::where('id', 1)->first();
        $service = Service::where('status', 1)->get();
        $testimonial = Testimonial::where('status', 1)->get();
        $blog = Blog::where('status', 1)->latest()->limit(3)->get();

        $meta_title = getSettingData('config_home_meta_title');
        $meta_description = getSettingData('config_home_meta_description');
        $meta_keyword = getSettingData('config_home_meta_keyword');
        $schema_tag = getSettingData('config_home_schema_tag');
        
        return view('frontend.home', compact('slider', 'about', 'service', 'testimonial', 'blog', 'meta_title', 'meta_description', 'meta_keyword', 'schema_tag'));
    }
}