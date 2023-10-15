<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
       'assessment_id',
       'student_id',
       'type',
       'score',
       'report_name',
       'date',
       'class',
       'subject',
       'type',
       'chapter_name',
       'teacher_name',
       'note'

    ];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }

        public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}
