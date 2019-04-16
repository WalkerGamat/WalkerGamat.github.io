<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // protected $table='tags'; pour indiquer que ce model et relier à la table de BD explicitement

    public function posts(){
        
        return $this->belongsToMany('App\Post','post_tag');
    }
}
