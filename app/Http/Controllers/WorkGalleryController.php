<?php

namespace App\Http\Controllers;

use App\Models\WorkGallery;
use Illuminate\Http\Request;

class WorkGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $workgallery = WorkGallery::where('id', 1)->first();

        return view('workgallery.index', compact('workgallery'));
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
    public function show(WorkGallery $workGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkGallery $workGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkGallery $workgallery)
    {
        if($request->image)
        {
            foreach($request->image as $qkey => $qvalue)
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

                $workgallery_arr[] = array(
                    'image' => $image_path,
                );
            }
            $request->merge(['image' => json_encode($workgallery_arr)]);
        }
        else
        {
            $request->merge(['image' => '']);
        }

        if($workgallery->update($request->all()))
        {
            return redirect()->route('workgallery.index')->with('success_message', 'Data Successfully Updated');
        }
        
        return redirect()->route('workgallery.edit')->with('error_message', 'Opps something went wrong!');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkGallery $workGallery)
    {
        //
    }
}
