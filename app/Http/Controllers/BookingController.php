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
            'vehicle_id'=>'required',
            'customer_id'=>'required',
            'contact_number'=>'required',
            'customer_email'=>'required',
            'postal_address'=>'required'
        ]);
//dd($request);
        $booking=new Booking;

        $booking->pickup_date=$request->pickup_date;
        $booking->dropoff_date=$request->dropoff_date;
        $booking->total_amount=$request->total_amount;
        $booking->vehicle_id=$request->vehicle_id;
        $booking->customer_id=$request->customer_id;

        $booking->save();

        // $vehicle=new Vehicle;

        // $vehicle->vehicle_name=$request->vehicle_name;

        // $vehicle->save();

        $customer=new Customer;

        // $customer->customer_name=$request->customer_name;
        $customer->contact_number=$request->contact_number;
        $customer->customer_email=$request->customer_email;
        $customer->postal_address=$request->postal_address;

        $customer->save();

        return redirect()->route('bookings.create')
                            ->with('success','Booking created successfully.');
    }

    public function livesearch(Request $request)
    { //dd('hi');
        $query = $request->get('query');
          $vehicles = Vehicle::where('vehicle_name', 'LIKE', '%'. $query. '%')->get();
          //dd($user->getRoleNames());


          foreach($vehicles as $vehicle){
            if($vehicle != null){

             $response[] = array("value"=>$vehicle->id,"label"=>$vehcle->vehicle_name);

                }
            }

          return response()->json($response);

    }
}
