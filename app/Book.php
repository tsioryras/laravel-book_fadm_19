<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }

    public function picture(){
        return $this->hasOne(Picture::class);
    }


}
