<?php

namespace App\Models;

use App\Models\User;
use App\Models\Booking;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'contact_number',
        'customer_email',
        'postal_address'
    ];

    public function booking(){
        return $this->hasOne(Booking::class);
    }

}
