<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = ['status'];
    public function reservation(){
        return $this->belongsTo('App\Reservation');
    }
}
