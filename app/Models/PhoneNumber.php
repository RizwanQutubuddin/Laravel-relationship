<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $table = 'phone_numbers';
    public function company(){
        return $this->belongsTo(Company::class);
    }
    
}
