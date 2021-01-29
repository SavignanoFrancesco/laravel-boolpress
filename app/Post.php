<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'content', 'notes', 'slug', 'category_id'];

    //relazione per il model
    public function category(){

        return $this->belongsTo('App\Category');

    }

    public function tags(){

        return $this->belongsMany('App\Tag');

    }


}
