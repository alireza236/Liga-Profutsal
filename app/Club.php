<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Club extends Authenticatable
{
    use Notifiable;

    protected $table = 'club';
    
    protected $guard = 'club';

    protected $attributes = [
        'status' => true,
    ];

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function player()
    {
        return $this->hasMany('App\Player', 'id_club');
    }
}
