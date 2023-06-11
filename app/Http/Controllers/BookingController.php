<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request){
        $booking = Booking::paginate(10);
        return view('Booking.index', compact('booking'));
    }

    public function create(){
        return view('booking.create');
    }

    public function store(Request $request){

        request()->validate([
            'pickup_date'=>'required',
            'dropoff_date'=>'required',
            'total_amount'=>'required',
            'vehicle_name'=>'required',
            'customer_name'=>'required',
            'contact_number'=>'required',
            'customer_email'=>'required',
            'postal_address'=>'required'
        ]);


        $customer=new Customer;
        $customer->customer_name=$request->customer_name;
        $customer->contact_number=$request->contact_number;
        $customer->customer_email=$request->customer_email;
        $customer->postal_address=$request->postal_address;

        $customer->save();

        $booking=new Booking;

        $booking->pickup_date=$request->pickup_date;
        $booking->dropoff_date=$request->dropoff_date;
        $booking->total_amount=$request->total_amount;
        $booking->vehicle_id=$request->vehicle_id;
        $booking->customer_id=$customer->id;
        $booking->save();

        return redirect()->route('bookings.create')
                            ->with('success','You successfully booked a vehicle!');
    }

    
}
