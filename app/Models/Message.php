<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'conversion_id',
        'from_id',
        'to_id',
        'body'
    ];




}
