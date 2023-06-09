<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    protected $fillable = [
        'vehicle_name',
        'rental_per_day'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function booking(){
        return $this->hasOne(Booking::class);
    }

}
