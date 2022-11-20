<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionbank extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'year',
        'class',
        'group',
        'subject',
        'question',
        'answers',
        'currect_answer',
    ];
}
