<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignCourse extends Model
{
    //
    protected $table="assign_courses";
    protected $primaryKey = "id";
    protected $fillable = ['instructor_name','course_id'];
}
