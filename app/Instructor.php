<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    //
    protected $table="instructors";
    protected $primaryKey = "id";
    protected $fillable = ['name','email','mobile_no','field','password','status'];
}
