<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

    public function category($name){
    	return $this::where('name', $name)->first();
    }

    /**
    * Relationship between categories table and post table
    * Foreign key is category
    */
    public function posts(){
    	return $this->hasMany('App\Posts', 'category');
    }

    /**
    * The author of the post
    */
    public function postAuthor(){
    	return $this->hasOne('App\User', 'id');
    }
}
