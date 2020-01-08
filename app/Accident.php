<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accident extends Model
{
    protected $fillable = [
        'user_id', 'lang', 'lat','image_01','image_02','status'
    ];
}
