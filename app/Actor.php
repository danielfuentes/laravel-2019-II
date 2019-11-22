<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movie;

class Actor extends Model
{
    protected $guarded = [];

    public function movies()
	{
		return $this->belongsToMany(Movie::class);
		//return $this->belongsToMany(Movie::class,'movie_id','actor_id','movies:id');
	}


}
