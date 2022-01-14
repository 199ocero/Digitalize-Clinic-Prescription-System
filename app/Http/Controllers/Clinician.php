<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use App\Models\Test;
use App\Models\User;
use App\Models\Patient;
use App\Models\Clinicians;
use App\Models\Appointment;
use App\Models\Prescription;
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
            'ptr_number' => ['required','max:255'],  
            'license_number' => ['required','max:255'],  
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
        $clinician->ptr_number = $request->ptr_number;
        $clinician->license_number = $request->license_number;

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
        $test = Test::find((int)$appointment['test_id']);
        $echocardiogram = $test['echocardiogram'][0];
        $electrocardiogram = $test['electrocardiogram'][0];
        $x_ray = $test['x_ray'][0];
        $cbc = $test['cbc'][0];
        $urinalysis = $test['urinalysis'][0];
        $ultrasound = $test['ultrasound'][0];
        $ct_scan = $test['ct_scan'][0];
        $stool_test = $test['stool_test'][0];
        
        return view('pages.clinician.patient.view-details',compact('appointment','echocardiogram','electrocardiogram','x_ray','cbc','urinalysis','ultrasound','ct_scan','stool_test'));
    }
    public function editRecord($id){
        
        $appointment = Appointment::find($id);
        $test = Test::find((int)$appointment['test_id']);
        $echocardiogram = $test['echocardiogram'][0];
        $electrocardiogram = $test['electrocardiogram'][0];
        $x_ray = $test['x_ray'][0];
        $cbc = $test['cbc'][0];
        $urinalysis = $test['urinalysis'][0];
        $ultrasound = $test['ultrasound'][0];
        $ct_scan = $test['ct_scan'][0];
        $stool_test = $test['stool_test'][0];
        
        return view('pages.clinician.patient.edit-record',compact('appointment','echocardiogram','electrocardiogram','x_ray','cbc','urinalysis','ultrasound','ct_scan','stool_test'));
    }

    public function updateRecord(Request $request, $id){

        $tests = $request->input('test');
        $result = array();
        $test_item = array("Echocardiogram('echo')","Electrocardiogram(ECG or EKG)","Chest X-ray","Blood Test(CBC)","Urinalysis(Urine Test)","Ultrasound","CT Scan","Stool Test");
        
        // dd($tests);
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
        $tests = Appointment::find($id)->toArray();
        
        $test = Test::find((int)$tests['test_id']);
        $test->echocardiogram = $result[0];
        $test->electrocardiogram = $result[1];
        $test->x_ray = $result[2];
        $test->cbc = $result[3];
        $test->urinalysis = $result[4];
        $test->ultrasound = $result[5];
        $test->ct_scan = $result[6];
        $test->stool_test = $result[7];
        $test->update();
        
        $appointment = Appointment::find($id);
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
        
        $appointment->update();
        return redirect()->route('patient.record.view.details',['id'=>$id])->with('success','Appointment Updated!');
    }
    public function deleteRecord($id,$patient_id){
        $test = Appointment::find($id)->toArray();
        Test::find((int)$test['test_id'])->delete();
        Appointment::find($id)->delete();
        return redirect()->route('clinician.patient.records',['id'=>$patient_id])->with('success','Appointment Deleted!');
    }
    public function viewPrescription($id){
        $patient = Appointment::find($id);
        $prescription = Prescription::where('patient_id',(int)$patient['patient_id'])->where('test_id',(int)$patient['test_id'])->get();
        return view('pages.clinician.patient.prescription.view-prescription',compact('prescription','id'));
    }
    public function addViewPrescription($id){
        return view('pages.clinician.patient.prescription.create-recipe',compact('id'));
    }
    public function addPrescription(Request $request,$id){
        $request->validate([
            'medicine' => ['required'],
            'brand' => ['required'],
            'form' => ['required'],
            'frequency' => ['required'],
            'duration' => ['required'],
            'instruction' => ['required'],
        ]);
        $patient = Appointment::find($id);
        $prescription = new Prescription();
        $prescription->patient_id=$patient['patient_id'];
        $prescription->test_id=$patient['test_id'];
        $prescription->medicine=$request->medicine;
        $prescription->brand=$request->brand;
        $prescription->form=$request->form;
        $prescription->frequency=$request->frequency;
        $prescription->duration=$request->duration;
        $prescription->instruction=$request->instruction;
        $prescription->save();
        return redirect()->route('patient.prescription.view',['id'=>$id])->with('success','Recipe Added!');
    }
    public function editPrescription($id){
        $prescription = Prescription::find($id);
        return view('pages.clinician.patient.prescription.edit-recipe',compact('prescription','id'));
    }
    public function updatePrescription(Request $request,$id){
        $request->validate([
            'medicine' => ['required'],
            'brand' => ['required'],
            'form' => ['required'],
            'frequency' => ['required'],
            'duration' => ['required'],
            'instruction' => ['required'],
        ]);
        $prescription = Prescription::find($id);
        $prescription->medicine=$request->medicine;
        $prescription->brand=$request->brand;
        $prescription->form=$request->form;
        $prescription->frequency=$request->frequency;
        $prescription->duration=$request->duration;
        $prescription->instruction=$request->instruction;
        $prescription->update();

        $appointment = Appointment::where('test_id',(int)$prescription['test_id'])->first();

        return redirect()->route('patient.prescription.view',['id'=>$appointment['id']])->with('success','Recipe Updated!');
    }
    public function deletePrescription($id,$patient_id){
        Prescription::find($id)->delete();
        return redirect()->route('patient.prescription.view',['id'=>$patient_id])->with('success','Recipe Deleted!');
    }

    public function generatePrescription($id){
        $patient_id= Appointment::find($id);
        $patient['patient']= Patient::find((int)$patient_id['patient_id'])->first();
        $appointment['appointment'] = Appointment::find($id);
        $clinician['clinician']= Clinicians::where('clinician_id',Auth::id())->first();

        

        $prescription['prescription']= Prescription::where('patient_id',(int)$patient_id['patient_id'])->where('test_id',(int)$patient_id['test_id'])->get();
        // dd(count($prescription));
        $datetime['datetime'] = Carbon::now()->format('F j, Y g:i A');
        $data['data']=array_merge($patient, $appointment,$clinician,$datetime);

        // dd($data);
        $pdf = PDF::loadView('pages.clinician.patient.prescription.generate-prescription',$data,$prescription);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('prescription.pdf');
    }
}
