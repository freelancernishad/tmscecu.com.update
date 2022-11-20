<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;


    protected $fillable = [




        'school_id',
        'studentClass',
        'studentRoll',
        'studentId',
        'admissionId',
        'Name',
        'method',
        'amount',
        'bokeya',
        'type',
        'type_name',
        'date',
        'month',
        'year',
        'status',

    ];

}
