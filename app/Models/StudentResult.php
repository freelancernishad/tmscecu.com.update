<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;

    protected $fillable = [


        'school_id',
        'stu_id',
        'name',
        'roll',
        'month',
        'subject',
        'year',
        'exam_name',
        'class',
        'class_group',
        'StudentReligion',
        'Bangla_1st',
        'Bangla_1st_d',
        'Bangla_2nd',
        'Bangla_2nd_d',
        'English_1st',
        'English_1st_d',
        'English_2nd',
        'English_2nd_d',
        'Math',
        'Math_d',
        'Chemistry',
        'Chemistry_d',
        'physics',
        'physics_d',
        'Biology',
        'Biology_d',
        'Science',
        'Science_d',
        'vugol',
        'vugol_d',
        'orthoniti',
        'orthoniti_d',
        'itihas',
        'itihas_d',
        'B_and_B',
        'B_and_B_d',
        'ReligionIslam',
        'ReligionIslam_d',
        'ReligionHindu',
        'ReligionHindu_d',
        'Agriculture',
        'Agriculture_d',
        'Higher_Mathematics',
        'Higher_Mathematics_d',
        'ICT',
        'ICT_d',
        'Physical_Education_and_Health',
        'Physical_Education_and_Health_d',
        'Arts_and_Crafts',
        'Arts_and_Crafts_d',
        'Work_and_life_oriented_education',
        'Work_and_life_oriented_education_d',
        'Career_Education',
        'Career_Education_d',
        'failed',
        'total',
        'greed',
        'GPA',
        'status',
        'message_status',
        'FinalResultStutus',
        'nextroll',
        'promote',
        'date',
        'marksheetCode',


];


}
