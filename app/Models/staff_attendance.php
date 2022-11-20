<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff_attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'date',
        'month',
        'year',
        'attendance',
        'status',
        'message_status',
    ];


}
