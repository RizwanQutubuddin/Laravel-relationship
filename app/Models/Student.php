<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    public function setNameAttribute($value)
    {
        $this->attributes['name']=strtoupper($value);
    }

    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    // new way accessor and mutator introduced in laravel 9 version
    protected function Gender():Attribute{
        return Attribute::make( 
            get:fn(string $value)=>strtoupper($value),
            set:fn(string $value)=>strtolower($value)
        );
    }
}
