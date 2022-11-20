<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeworksubmit extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'student_id',
        'student_name',
        'homework_id',
        'description',
        'class',
        'group',
        'subject',
        'files',
        'startdate',
        'enddate',

    ];
}
