<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'class',
        'group',
        'subject',
        'title',
        'description',
        'files',
        'startdate',
        'enddate',
        'status',

    ];

}
