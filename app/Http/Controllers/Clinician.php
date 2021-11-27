<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Clinician extends Controller
{
    public function viewProfile(){
        $clinician = User::find(Auth::id());
        return view('pages.clinician.profile.view-profile',compact('clinician'));
    }
    
}
