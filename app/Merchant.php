<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
	public function user()
	{
		return $this->hasOne('App\User');
	}
}
