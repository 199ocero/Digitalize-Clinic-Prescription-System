<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Clinician extends Controller
{
    public function viewProfile(){
        $clinician = User::find(Auth::id());
        return view('pages.clinician.profile.view-profile',compact('clinician'));
    }
    public function editProfile(){
        $clinician = User::find(Auth::id());
        return view('pages.clinician.profile.edit-profile',compact('clinician'));
    }
    public function updateProfile(Request $request){
        $clinician = User::find(Auth::id());
        
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
            'image' => ['required'], 
            'email' => [
                'required',
                Rule::unique('users')->ignore($clinician->id),
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
        $patient = User::whereRoleIs('patient')->get();
        return view('pages.clinician.patient.view-patient',compact('patient'));
    }
}
