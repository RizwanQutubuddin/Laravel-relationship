<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // has many through relationship
    public function posts(){
        return $this->hasManyThrough(Post::class,User::class);
    }

    // one to many relationship
    public function users(){
        return $this->hasMany(User::class);
    }
}
