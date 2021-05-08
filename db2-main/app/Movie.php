<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    protected $table = "movie";
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
