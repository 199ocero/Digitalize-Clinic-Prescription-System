<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Clinicians;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function viewClinician(){
        $clinician = User::whereRoleIs('clinician')->get();
        return view('pages.admin.clinician.view-clinician',compact('clinician'));
    }
    public function viewAddClinician(){
        return view('pages.admin.clinician.create-clinician');
    }
    public function addClinician(Request $request){
        $validateData = $request->validate([
            'username' => ['required','unique:users','max:255'],
            'email' => ['required','unique:users','max:255']
        ]);
        $date = Carbon::now()->format('m-d-Y');
        $clinician = new User();
        $clinician->username = $request->username;
        $clinician->email = $request->email;
        $clinician->password= Hash::make($date.'-'.$request->username);
        $clinician->save();
        $clinician->attachRole($request->role_id);

        $clinician_info = new Clinicians();
        $clinician_info->clinician_id = $clinician->id;
        $clinician_info->email = $request->email;
        $clinician_info->save();
        
        return redirect()->route('view.admin.clinician')->with('success','Clinician Added!');
    }
    public function editClinician($id){
        $clinician = User::find($id);
        return view('pages.admin.clinician.edit-clinician',compact('clinician'));
    }
    public function updateClinician(Request $request, $id){
        $clinician = User::find($id);
        
        $validateData = $request->validate([
            'username' => [
                'required',
                Rule::unique('users')->ignore($clinician->id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($clinician->id),
            ],
        ]);
        $clinician->username = $request->username;
        $clinician->email = $request->email;
        $clinician->update();

        return redirect()->route('view.admin.clinician')->with('success','Clinician Updated!');
    }
    public function deleteClinician($id){
        User::find($id)->delete();
        Clinicians::where('clinician_id',$id)->delete();
        return redirect()->route('view.admin.clinician')->with('success','Clinician Deleted!');
    }

    //Staff
    public function viewStaff(){
        $staff = User::whereRoleIs('staff')->get();
        return view('pages.admin.staff.view-staff',compact('staff'));
    }
    public function viewAddStaff(){
        return view('pages.admin.staff.create-staff');
    }
    public function addStaff(Request $request){
        $validateData = $request->validate([
            'username' => ['required','unique:users','max:255'],
            'email' => ['required','unique:users','max:255']
        ]);
        $date = Carbon::now()->format('m-d-Y');
        $staff = new User();
        $staff->username = $request->username;
        $staff->email = $request->email;
        $staff->password= Hash::make($date.'-'.$request->username);
        $staff->save();
        $staff->attachRole($request->role_id);
        return redirect()->route('view.admin.staff')->with('success','Staff Added!');
    }
    public function editStaff($id){
        $staff = User::find($id);
        return view('pages.admin.staff.edit-staff',compact('staff'));
    }
    public function updateStaff(Request $request, $id){
        $staff = User::find($id);
        
        $validateData = $request->validate([
            'username' => [
                'required',
                Rule::unique('users')->ignore($staff->id),
            ],
            'email' => [
                'required',
                Rule::unique('users')->ignore($staff->id),
            ],
        ]);
        $staff->username = $request->username;
        $staff->email = $request->email;
        $staff->update();

        return redirect()->route('view.admin.staff')->with('success','Staff Updated!');
    }
    public function deleteStaff($id){
        User::find($id)->delete();
        return redirect()->route('view.admin.staff')->with('success','Staff Deleted!');
    }

}
