<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'school_id',
        'TeacherName',
        'TeacherGender',
        'TeacherDateOfBirth',
        'TeacherId',
        'TeacherEmail',
        'teacherPassword',
        'TeacherPhoneNumber',
        'TeacherPosition',
        'TeacherQualification',
        'TeacherJoiningDate',
        'TeacherLeavingDate',
        'TeacherWorkingHours',
        'TeacherAddress',
        'TeacherSubjectHandling',
        'InchargeClass',
        'ProfilePicture',
        'TeacherStatus'
    ];

}
