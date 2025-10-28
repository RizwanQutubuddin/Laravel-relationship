<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'date_of_issue', 'student_id'];
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
