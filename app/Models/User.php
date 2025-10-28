<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Order;
use App\Models\Company;
use App\Models\PhoneNumber;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    // many to many relationship
    public function roles(){
        return $this->belongsToMany(Role::class,'user_role');
    }

    //one to one relationship
    public function company(){
        return $this->hasOne(Company::class);
    }
    // has one through relationship
    public function companyPhoneNnumber(){
        return $this->hasOneThrough(PhoneNumber::class,Company::class);
    }



    //has one relationship with latest order
    public function latestOrder(){
        // return $this->hasOne(Order::class)->latest('date');
        return $this->hasOne(Order::class)->latestOfMany();
    }

    //has one relationship with oldest order
    public function oldestOrder(){
        // return $this->hasOne(Order::class)->oldest('date');
        return $this->hasOne(Order::class)->oldestOfMany();
    }

    //has one relationship with oldest order
    public function largestOrder(){
        return $this->hasOne(Order::class)->ofMany('amount','max');
    }

    //has one relationship with oldest order
    public function smallestOrder(){
        return $this->hasOne(Order::class)->ofMany('amount','min');
    }

    //has many relationship with order
    public function orders(){
        return $this->hasMany(Order::class);
    }

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
