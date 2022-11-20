<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'school_id',
        'post_id',
        'title',
        'slug',
        'description',
        'Images',
        'Tags',
        'Category',
        'status',
    ];
}
