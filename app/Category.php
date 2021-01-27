<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //relazione per il model
    public function posts(){

        return $this->hasMany('App\Post');

    }
}
