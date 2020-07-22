<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    //
    use Notifiable;
    protected $guard = 'student';
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
