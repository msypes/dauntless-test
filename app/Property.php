<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $guarded = ['id'];

	public function bookingDates(){
		return $this->hasMany('App\BookingDate');
	}
}
