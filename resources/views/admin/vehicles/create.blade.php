@extends('layouts.navbar')

@section('content')
<div class="container-fluid" data-aos="fade-down" data-aos-duration="1000" >
<form method="POST" action="{{ route('vehicles.store') }}">
    {{csrf_field()}}

    <div class="row">
        <div class="col">
            <label for="vehicle_name">Vehicle Name</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" name="vehicle_name" >
            @error('vehicle_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label for="rental_per_day">Rental Per Day</label>
        </div>
        <div class="col">
            <input type="text" class="form-control" name="rental_per_day" >
            @error('rental_per_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary text-right">Save</button>

  </form>
</div>
@endsection
