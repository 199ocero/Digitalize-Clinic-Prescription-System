<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
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
        'email',
    ];
}
