<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answere extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'student_id',
        'exam_id',
        'start',
        'end',
        'totalmark',
        'currectans',
        'answeres',
    ];
}
