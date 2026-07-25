<?php

namespace App\Http\Controllers;

use App\Models\OurProductInquiry;
use App\Models\OurProduct;
use Illuminate\Http\Request;
use App\Mail\OurProductInquiryMail;
use Illuminate\Support\Facades\Mail;
use App\Rules\ReCaptcha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class OurProductInquiryController extends Controller
{
    public function submit_product_inquiry(Request $request)
    {
        if($request->ajax())
        {
            $request->validate([
                'g-recaptcha-response' => ['required', new ReCaptcha]
            ]);

            if($request->ourproduct_id == '')
            {
                return response()->json(['success' => false, 'message' => 'Something Went Wrong. Please Try Again!']);
            }

            $string = strtolower($request->first_name . $request->last_name . $request->message);

            foreach(config('custom.spamwords') as $url)
            {
                if(strpos($string, $url) !== FALSE)
                {
                    return response()->json(['success' => false, 'message' => 'Something Went Wrong. Please Try Again!']);
                }
            }

            $ourproduct = OurProduct::find($request->ourproduct_id);

            $data = $request->all();
            $data['product_name'] = $ourproduct->product_name;
            
            if(OurProductInquiry::create($request->all()))
            {
                $email_separation = explode(',', getSettingData('config_getting_our_product_inquiry_form_email'));

                foreach($email_separation as $eskey => $recipient)
                {
                    Mail::to($recipient)->send(new OurProductInquiryMail($data));
                }

                if (Storage::disk('public')->exists($ourproduct->brochure)) {
                    return response()->json(['success' => true,
                    'message' => 'Your brochure is ready for download! Please Click to Download Brochure button',
                    'brochure_url' => Storage::url($ourproduct->brochure)]);
                }

                return response()->json(['success' => true, 'message' => 'Inquiry submitted successfully!']);
            }
        }
        return response()->json(['success' => false, 'message' => 'Oops, something went wrong!']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = OurProductInquiry::select('id', 'ourproduct_id', 'first_name', 'last_name', 'email', 'mobile_no')->with('ourproduct')->get();

            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('ourproductinquiry.show',$row->id)."' title='View'><i class='fa fa-eye'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['product_name'] = $row->ourproduct->product_name;
                    $nest['full_name'] = $row->first_name.' '.$row->last_name;
                    $nest['email'] =  $row->email;
                    $nest['mobile_no'] = $row->mobile_no;
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('ourproductinquiry.index',[]);
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
    public function show(OurProductInquiry $ourproductinquiry)
    {
        return view('ourproductinquiry.show', compact('ourproductinquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurProductInquiry $ourProductInquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurProductInquiry $ourProductInquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurProductInquiry $ourProductInquiry)
    {
        //
    }

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (OurProductInquiry::whereIn('id',$data_id)->delete())
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
}
