<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag','post_tag','post_id','tag_id');
    	/* 'post_tag','post_id','tag_id'  are optional in above statement since we followed laravel naming convention for pivot table and 2 foreign keys*/
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }
}
