<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onlineexam extends Model
{
    use HasFactory;

    protected $fillable=[
        'school_id',
        'year',
        'class',
        'group',
        'subject',
        'title',
        'description',
        'start_date',
        'end_date',
        'duration',
        'totalmark',
        'questions',
    ];
}
