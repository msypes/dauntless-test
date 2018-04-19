<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDate extends Model
{
    protected $guarded = ['id'];

    public function property(){
    	return $this->belongsTo('App\Property');
    }
}
