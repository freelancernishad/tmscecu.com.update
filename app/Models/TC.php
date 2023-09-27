<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TC extends Model
{
    use HasFactory;
    protected $table = 'tc';
    protected $guarded = [];

    protected $fillable = [
      'sl',
      'token',
      'studentId',
      'name',
      'academic_year',
      'student_type',
      'group',
      'roll',
      'year',
      'sscRoll',
      'sscReg',
      'sscGpa',
      'dateOfBirth',
      'fatherName',
      'motherName',
      'division',
      'district',
      'upazila',
      'union',
      'post_office',
      'StudentAddress',
      'status',
      'paymentStatus',
    ];


}
