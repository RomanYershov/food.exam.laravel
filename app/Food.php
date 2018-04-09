<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table="foods";
    protected $guarded=['id'];

    public function comments()
    {
        return $this->hasMany("App\Comment");
    }

    public function category()
    {
      return $this->belongsTo("App\Category");
    }
}
