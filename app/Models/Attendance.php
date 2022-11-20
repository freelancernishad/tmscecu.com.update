<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [


        'school_id',
        'date',
        'month',
        'year',
        'student_class',
        'attendance',
        'status',
        'message_status',
    ];
}
