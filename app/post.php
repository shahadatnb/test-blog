<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function category(){
    	return $this->beLongsTo('App\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag'); //,'post_tag'
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }
}
