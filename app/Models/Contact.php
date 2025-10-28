<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['phone', 'city', 'student_id'];
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
