<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinicians extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'sex',
        'civil_status',
        'address',
        'birthdate',
        'height',
        'weight',
        'blood_type',
        'contact_number',
        'clinic_name',
        'image',
        'ptr_number',
        'license_number',
    ];

    protected $dates = ['birthdate'];
}
