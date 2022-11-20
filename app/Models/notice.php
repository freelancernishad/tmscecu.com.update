<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'title',
        'description',
        'end',
        'file',
        'status',
    ];
}
