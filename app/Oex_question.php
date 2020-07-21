<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_question extends Model
{
    //
    protected $table = 'oex_questions';
    protected $primaryKey = 'id';
    protected $fillable = [
    'exam_id',
    'question',
    'ans',
    'options',
    'status'
    ];
}
