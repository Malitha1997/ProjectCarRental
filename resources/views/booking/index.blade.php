@extends('layouts.navbar')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2 class="text-dark mb-1">Rented Vehicles</h2>

        </div>
    </div>
</div>
<table class="table table-bordered text-dark mb-1" >
    <tr>
        <th>Vehicle Name</th>
        <th>Customer Name</th>
        <th>Pickup date</th>
        <th>Dropoff date</th>
        <th>Total amount</th>
    </tr>
    @foreach ($booking as $key => $bookings)
    <tr>
        <td>{{ $bookings->vehicle->vehicle_name }}</td>
        <td>{{ $bookings->customer->customer_name }}</td>
        <td>{{ $bookings->pickup_date }}</td>
        <td>{{ $bookings->dropoff_date }}</td>
        <td>Rs.{{ $bookings->total_amount }}</td>
    @endforeach
</table>
@endsection
