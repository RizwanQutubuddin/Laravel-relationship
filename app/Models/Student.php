<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'age', 'gender'];
    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function book(){
        return $this->hasMany(Book::class);
    }
}
