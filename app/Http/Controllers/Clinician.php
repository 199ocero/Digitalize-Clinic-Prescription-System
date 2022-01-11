<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use App\Models\Clinicians;
use App\Models\Appointment;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Clinician extends Controller
{
    public function viewProfile(){
        $clinician = Clinicians::where('clinician_id',Auth::id())->first();
        return view('pages.clinician.profile.view-profile',compact('clinician'));
    }
    public function editProfile(){
        $clinician = Clinicians::where('clinician_id',Auth::id())->first();
        return view('pages.clinician.profile.edit-profile',compact('clinician'));
    }
    public function updateProfile(Request $request){
        $clinician = Clinicians::where('clinician_id',Auth::id())->first();
        
        $validateData = $request->validate([
            'first_name' => ['required', 'max:255'],
            'middle_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'suffix' => ['max:255'],
            'sex' => ['required', 'max:255'],
            'civil_status' => ['required','max:255'],
            'blood_type' => ['required', 'max:255'],
            'weight' => ['required', 'max:255'],
            'height' => ['required', 'max:255'],
            'contact' => ['required','max:255'],
            'birthdate' => ['required','max:255'], 
            'address' => ['required','max:255'], 
            'clinic_name' => ['required','max:255'],  
            'image' => ['image','mimes:jpg,png,jpeg','dimensions:min_width=416,min_height=416,max_width=416,max_height=416'],  
            'email' => [
                'required',
                Rule::unique('clinicians')->ignore($clinician->id),
            ],
        ]);

        $clinician->first_name = $request->first_name;
        $clinician->middle_name = $request->middle_name;
        $clinician->last_name = $request->last_name;
        $clinician->suffix = $request->suffix;
        $clinician->sex = $request->sex;
        $clinician->civil_status = $request->civil_status;
        $clinician->blood_type = $request->blood_type;
        $clinician->weight = $request->weight;
        $clinician->height = $request->height;
        $clinician->email = $request->email;
        $clinician->contact_number = $request->contact;
        $clinician->birthdate = $request->birthdate;
        $clinician->address = $request->address;
        $clinician->clinic_name = $request->clinic_name;
        // $clinician->ptr_number = $request->clinic_name;
        // $clinician->license_number = $request->clinic_name;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$clinician->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $clinician['image'] = $filename;
        }
        $clinician->update();

        return redirect()->route('view.profile.clinician')->with('success','Profile Updated!');
    }

    //Change Password
    public function viewPassword(){
        return view('pages.clinician.password.change-password');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required','confirmed'],
        ]);
        
        // User::find(Auth::id())->update(['password'=> Hash::make($request->password)]);
        $hashPassword = Auth::user()->password;
        if(Hash::check($request->current_password,$hashPassword)){
            $clinician = User::find(Auth::id());
            $clinician->password = Hash::make($request->password);
            $clinician->update();

        }
        return redirect()->route('view.password.clinician')->with('success','Password Change!');
    }

    //Patient
    public function viewPatient(){
        $patient = Patient::all();
        return view('pages.clinician.patient.view-patient',compact('patient'));
    }

    public function viewRecord($id){
        $patient = Appointment::where('patient_id',$id)->get();
        $first_name = Patient::find($id);
        return view('pages.clinician.patient.view-record',compact('patient','id','first_name'));
    }
    public function addViewRecord($id){
        return view('pages.clinician.patient.create-record',compact('id'));
    }
    public function addRecord(Request $request, $id){

        $tests = $request->input('test');
        $result = array();
        $test_item = array("Echocardiogram('echo')","Electrocardiogram(ECG or EKG)","Chest X-ray","Blood Test(CBC)","Urinalysis(Urine Test)","Ultrasound","CT Scan","Stool Test");
        
        if($tests == null){
            $tests = array("","","","","","","","");
        }
        for ($i=0;$i<count($test_item);$i++){
            if (in_array($test_item[$i], $tests, TRUE)){
                array_push($result,"1");
            }else{
                array_push($result,"0");
            }
        }

        $test = new Test();
        $test->echocardiogram = $result[0];
        $test->electrocardiogram = $result[1];
        $test->x_ray = $result[2];
        $test->cbc = $result[3];
        $test->urinalysis = $result[4];
        $test->ultrasound = $result[5];
        $test->ct_scan = $result[6];
        $test->stool_test = $result[7];
        $test->save();
        
        $appointment = new Appointment();
        $appointment->patient_id = $id;
        $appointment->test_id = $test->id;
        if($request->symptoms==null){
            $appointment->symptoms = "None";
        }else{
            $appointment->symptoms = $request->symptoms;
        }
        if($request->diagnosis==null){
            $appointment->diagnosis = "None";
        }else{
            $appointment->diagnosis = $request->diagnosis;
        }
        
        $appointment->save();
        return redirect()->route('clinician.patient.records',['id'=>$id])->with('success','Appointment Added!');
    }
    public function detailsViewRecord($id){
        $appointment = Appointment::find($id);
        dd($appointment->toArray());
    }
    public function deleteRecord($id,$patient_id){
        $test = Appointment::find($id)->toArray();
        Test::find((int)$test['test_id'])->delete();
        Appointment::find($id)->delete();
        return redirect()->route('clinician.patient.records',['id'=>$patient_id])->with('success','Appointment Deleted!');
    }

}
