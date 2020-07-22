<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = "events";
    protected $primaryKey = "id";
    protected $fillable = [
        'title',
        'place',
        'time',
        'date',
        'details',
        'contact_phone',
        'contact_email',
        'image' 
    ];
}
