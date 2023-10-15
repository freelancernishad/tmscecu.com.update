<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable= [
        'report_name',
        'date',
        'class',
        'subject',
        'type',
        'chapter_name',
        'teacher_name',
        'note'
    ];





    public function assessmentRecord()
    {
        return $this->hasOne(AssessmentRecord::class);
    }
}
