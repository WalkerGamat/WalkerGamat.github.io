<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comments';

    public function post(){//le nom doit etre le meme que le nom du model
     
        return $this->belongsTo('App\Post');
    }
}
