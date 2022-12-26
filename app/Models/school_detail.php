<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class school_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'school_id',
        'school_domain',
        'SMS_TOKEN',
        'SCHOLL_NAME',
        'SCHOLL_ADDRESS',
        'SCHOLL_BUILD',
        'SCHOLL_CODE',
        'HISTORY_OF_THE_ORGANIZATION_IMAGE',
        'HISTORY_OF_THE_ORGANIZATION',
        'Principals_name',
        'PRINCIPALS_IMGAGE',
        'PRINCIPALS_Signature',
        'PRINCIPALS_WORDS',
        'Vice_Principals_name',
        'VICE_PRINCIPALS_IMGAGE',
        'VICE_PRINCIPALS_Signature',
        'VICE_PRINCIPALS_STATEMENT',
        'facebook_page',
        'contact_email',
        'contact_number',
        'meta_keywords',
        'meta_description',
        'meta_author',
        'theme',
        'application',
        'slider',
    ];
}
