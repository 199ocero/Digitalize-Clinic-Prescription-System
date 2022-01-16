<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'echocardiogram',
        'electrocardiogram',
        'x_ray',
        'cbc',
        'urinalysis',
        'ultrasound',
        'ct_scan',
        'stool_test',
    ];
}
