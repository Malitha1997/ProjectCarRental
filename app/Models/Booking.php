<?php

namespace App\Models;

use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    protected $fillable = [
        'pickup_date',
        'dropoff_date',
        'vehicle_id',
        'total_amount',
        'customer_id',
        'contact_number',
        'customer_email',
        'postal_address'
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
