<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
        'author',
        'email',
        'url',
        'comment_post_ID',
        'status',
    ];

}
