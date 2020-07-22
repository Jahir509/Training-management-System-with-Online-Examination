<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    //
    use Notifiable;
    protected $guard = 'teacher';
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'password',
        'field'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
