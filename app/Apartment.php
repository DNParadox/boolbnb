<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function service() {
        return $this->belongsToMany('App\Service');
    }

    public function sponsorship() {
        return $this->belongsToMany('App\Sponsorship');
    }
    
    public function message() {
        return $this->hasMany('App\Message');
    }
}
