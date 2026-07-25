<?php

namespace App\Http\Controllers;

use App\Models\WhyChoose;
use Illuminate\Http\Request;

class WhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $result = WhyChoose::where('id', 1)->first();
        return view('whychoose.index',['result' => $result]);
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
    public function show(WhyChoose $whyChoose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyChoose $whyChoose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyChoose $whychoose)
    {
        if($request->our_speciality)
        {
            foreach($request->our_speciality as $qkey => $qvalue)
            {
                if(!empty($qvalue['image']))
                {
                    $image = explode('storage/', $qvalue['image']);
                    $image_path = $image[1];
                }
                else
                {
                    $image_path = $qvalue['edit_image'];
                }

                $specialit_arr[] = array(
                    'image' => $image_path,
                    'title' => $qvalue['title'] ?? ''
                );
            }
            $request->merge(['our_speciality' => json_encode($specialit_arr)]);
        }
        
        if($request->rotating_images)
        {
            foreach($request->rotating_images as $rotkey => $rotvalue)
            {
                if(!empty($rotvalue['image']))
                {
                    $rot_img = explode('storage/', $rotvalue['image']);
                    $rot_img_path = $rot_img[1];
                }
                else
                {
                    $rot_img_path = $rotvalue['edit_image'];
                }

                $rotate_img_arr[] = array(
                    'image' => $rot_img_path,
                    'bg_color' => $rotvalue['bg_color']
                );
            }
            $request->merge(['rotating_images' => json_encode($rotate_img_arr)]);
        }

        if(!empty($request->about_pg_img))
        {
            $get_about_pg_img = explode('storage/', $request->about_pg_img);
            $request->merge(['about_pg_img' => $get_about_pg_img[1]]);
        }
        else
        {
            $request->merge(['about_pg_img' => $request->edit_about_pg_img]);
        }

        if($whychoose->update($request->all()))
        {
            return redirect()->route('whychoose.index')->with('success_message', 'Data Successfully Updated');
        }
        else
        {
            return redirect()->route('whychoose.edit')->with('error_message', 'Opps something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyChoose $whyChoose)
    {
        //
    }
}
