<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultLog extends Model
{
    use HasFactory;


    protected $fillable = [
        'class',
        'group',
        'subject',
        'examName',
        'StudentReligion',
        'month',
        'year',
        'status',
    ];

}
