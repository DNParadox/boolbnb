<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email','apartment_id','message',
    ];

    public function apartment() {
        return $this->hasMany('App\Apartment');
    }
}
