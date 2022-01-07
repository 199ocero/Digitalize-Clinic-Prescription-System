<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class Staff extends Controller
{
    public function viewPatient(){
        $patient = Patient::all();
        return view('pages.staff.view-patient',compact('patient'));
    }
    public function viewAddPatient(){
        return view('pages.staff.create-patient');
    }
    public function addPatient(Request $request){
        $validateData = $request->validate([
            'first_name' => ['required', 'max:255'],
            'middle_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'suffix' => ['max:255'],
            'sex' => ['required', 'max:255'],
            'civil_status' => ['required','max:255'],
            'address' => ['required','max:255'],
            'blood_type' => ['required', 'max:255'],
            'weight' => ['required', 'max:255'],
            'height' => ['required', 'max:255'],
            'email' => ['required','unique:patients','max:255'],
            'contact' => ['required','max:255'],
            'birthdate' => ['required','max:255'], 
        ]);
        $patient = new Patient();
        $patient->first_name = $request->first_name;
        $patient->middle_name = $request->middle_name;
        $patient->last_name = $request->last_name;
        $patient->suffix = $request->suffix;
        $patient->sex = $request->sex;
        $patient->civil_status = $request->civil_status;
        $patient->address = $request->address;
        $patient->blood_type = $request->blood_type;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->contact_number = $request->contact;
        $patient->email = $request->email;
        $patient->birthdate = $request->birthdate;
        $patient->save();
        return redirect()->route('view.staff.patient')->with('success','Patient Added!');
    }
    public function editPatient($id){
        $patient = Patient::find($id);
        return view('pages.staff.edit-patient',compact('patient'));
    }
    public function updatePatient(Request $request, $id){
        $patient = Patient::find($id);
        
        $validateData = $request->validate([
            'first_name' => ['required', 'max:255'],
            'middle_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'suffix' => ['max:255'],
            'sex' => ['required', 'max:255'],
            'civil_status' => ['required','max:255'],
            'address' => ['required','max:255'],
            'blood_type' => ['required', 'max:255'],
            'weight' => ['required', 'max:255'],
            'height' => ['required', 'max:255'],
            'contact' => ['required','max:255'],
            'birthdate' => ['required','max:255'], 
            'email' => [
                'required',
                Rule::unique('patients')->ignore($patient->id),
            ],
        ]);
        $patient->first_name = $request->first_name;
        $patient->middle_name = $request->middle_name;
        $patient->last_name = $request->last_name;
        $patient->suffix = $request->suffix;
        $patient->sex = $request->sex;
        $patient->civil_status = $request->civil_status;
        $patient->blood_type = $request->blood_type;
        $patient->weight = $request->weight;
        $patient->height = $request->height;
        $patient->email = $request->email;
        $patient->contact_number = $request->contact;
        $patient->birthdate = $request->birthdate;
        $patient->update();

        return redirect()->route('view.staff.patient')->with('success','Patient Updated!');
    }
    public function deletePatient($id){
        Patient::find($id)->delete();
        return redirect()->route('view.staff.patient')->with('success','Patient Deleted!');
    }
}