<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function movies(){
      return $this->belongsTo(movie::class);
    }
}

