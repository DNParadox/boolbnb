<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'bathroom', 'bed_number', 'description', 'price', 'photo', 'room_number', 'square_meters', 'title', 'user_id', 'visibility', 'latitude', 'longitude','visibility'
        // mancano latitidine e longitudine e l'indirizzo non va messo perche viene composto nel controller
    ];

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
        return $this->belongsTo('App\Message');
    }
}
