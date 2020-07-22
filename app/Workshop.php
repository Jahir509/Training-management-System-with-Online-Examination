<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    //
    protected $table = "workshops";
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
