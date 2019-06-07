<?php

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Roles extends Model
{
	public function users()
	{
	    return $this
	        ->belongsToMany('App\Model\User')
	        ->withTimestamps();
	}
}