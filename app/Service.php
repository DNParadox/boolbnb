<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function apartmentsponsorship() {
        return $this->belongsToMany('App\ApartmentSponsorship');
    }
}
