<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'class',
        'type',
        'fees',
        'status',
        'index_number',
    ];
}
