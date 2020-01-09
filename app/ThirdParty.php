<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ThirdParty extends Authenticatable
{
    use Notifiable;

    protected $guard = 'third_parties';

    protected $fillable = [
        'name', 'type', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
