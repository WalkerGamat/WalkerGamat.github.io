<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='posts';

    public function categories(){
        return $this->belongsTo('App\Categories');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
