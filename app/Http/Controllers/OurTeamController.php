<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class OurTeamController extends Controller
{
    public function ourteam()
    {
        $department = Department::where('status', 1)->with('ourteam', 'ourteam.designation')->get();

        return view('ourteam.ourteam', ['department' => $department,'meta_title' => getSettingData('config_our_team_meta_title'), 'meta_description' => getSettingData('config_our_team_meta_description'), 'meta_keyword' => getSettingData('config_our_team_meta_keyword'), 'schema_tag' => getSettingData('config_our_team_schema_tag')]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            $result = OurTeam::with('department', 'designation')->get();
            
            $data = array();

            if($result)
            {
                foreach($result as $key => $row)
                {
                    $edit = "<a href='".route('ourteam.edit',$row->id)."' title='Edit'><i class='fa fa-edit'></i></a>";

                    $nest['checkbox'] = '<input type="checkbox" name="data[data_id][]" value="'.$row->id.'" class="form-check-input checkboxes">';
                    $nest['srno'] = $key + 1;
                    $nest['department_id'] =  $row->department->department_name;
                    $nest['designation_id'] =  $row->designation->designation_name;
                    $nest['name'] =  $row->name;
                    $nest['status'] = "<div class='form-check form-switch'><input type='checkbox' class='form-check-input on_off' value='".$row->id."' ".($row->status==1?'checked':"")."/></div>";
                    $nest['action'] = $edit;
                    $data[]=$nest;
                }
            }

            return response()->json(array('data' => $data));
        }
        return view('ourteam.index',[]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $department_list = Department::where('status', 1)->pluck('department_name', 'id');
        $designation_list = Designation::where('status', 1)->pluck('designation_name', 'id');

        return view('ourteam.create', compact('department_list', 'designation_list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->profile_image))
        {
            $get_image = explode('storage/', $request->profile_image);
            $request->merge(['profile_image' => $get_image[1]]);
        }

        if(OurTeam::create($request->all()))
        {
            return redirect()->route('ourteam.index')->with('success_message', 'Data Successfully Submitted');
        }
        
        return redirect()->route('ourteam.add')->with('error_message', 'Opps something went wrong!');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurTeam $ourTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurTeam $ourteam)
    {
        $department_list = Department::where('status', 1)->pluck('department_name', 'id');
        $designation_list = Designation::where('status', 1)->pluck('designation_name', 'id');

        return view('ourteam.edit', compact('ourteam', 'department_list', 'designation_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurTeam $ourteam)
    {
        if(!empty($request->profile_image))
        {
            $get_profile_image = explode('storage/', $request->profile_image);
            $request->merge(['profile_image' => $get_profile_image[1]]);
        }
        else
        {
            $request->merge(['profile_image' => $request->edit_profile_image]);
        }

        if($ourteam->update($request->all()))
        {
            return redirect()->route('ourteam.index')->with('success_message', 'Data Successfully Updated');
        }
        
        return redirect()->route('ourteam.edit', $ourteam->id)->with('error_message', 'Opps something went wrong!');
    }
    
    public function delete_image(Request $request)
    {
        if($request->ajax())
        {
            $id = $request->id;
            $column_name = $request->column_name;

            if(OurTeam::where('id', $id)->update([$column_name => '']))
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
    public function destroy(OurTeam $ourTeam)
    {
        //
    }

    public function multiple_delete(Request $request)
    {
        if($request->ajax())
        {
            $data_id = json_decode($request->data_id);

            if (OurTeam::whereIn('id',$data_id)->delete())
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

            if(OurTeam::where('id',$id)->update(['status'=>$status]))
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
