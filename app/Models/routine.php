<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routine extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'routne_id',
        'year',
        'class',
        'week_name',
        'first_period',
        'second_period',
        'thard_period',
        'fourth_period',
        'fith_period',
        'sixth_period',
        'seventh_period',
        'status',
    ];

}
