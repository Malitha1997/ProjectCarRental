@extends('layouts.navbar')

@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2 class="text-dark mb-1">Vehicle List</h2>

        </div>
    </div>
</div>
<table class="table table-bordered text-dark mb-1" >
    <tr>
        <th>Vehicle Name</th>
        <th>Rental Per Day</th>
        <th>Action</th>
    </tr>
    @foreach ($user_vehicles as $key => $vehicles)
    <tr>
        <td>{{ $vehicles->vehicle_name }}</td>
        <td>Rs.{{ $vehicles->rental_per_day }}</td>
        <td> <a class="btn btn-success" href="{{ route('vehicles.edit',$vehicles->id) }}">Edit</a></td>
    </tr>
    @endforeach
</table>
@endsection
