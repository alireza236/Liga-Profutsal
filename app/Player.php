<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

    protected $attributes = [
        'status' => true,
    ];

    protected $fillable = ['name','address','assuransi'];

    public function club()
    {
        return $this->belongsTo('App\Club','id_club');
    }
    
}
