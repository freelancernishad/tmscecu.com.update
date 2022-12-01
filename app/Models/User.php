<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use App\Notifications\PasswordReset;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'class',
        'email',
        'teacherOrstudent',
        'school_id',
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function roles(){
    //     return $this->belongsTo(Role::class, 'role', 'id');
    // }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }



    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token,$this->id));
    }
}
