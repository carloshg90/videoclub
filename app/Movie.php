<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'year',
        'director',
        'poster',
        'trailer',
        'synopsis'
      ];

      public function reviews(){
        return $this->hasMany(Review::class);
      }

      public function category(){
        return $this->belongsTo(Category::class);
      }

}
