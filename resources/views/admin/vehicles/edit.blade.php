@extends('layouts.navbar')


@section('content')
<div class="container-fluid" data-aos="fade-down" data-aos-duration="1000" >
    <form method="POST" action="{{ route('vehicles.update',$vehicles->id)}}">
        {{csrf_field()}}
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="vehicle_name">Vehicle Name</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="vehicle_name" value="{{ $vehicles->vehicle_name }}" required>
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
                <input type="text" class="form-control" name="rental_per_day" value="{{ $vehicles->rental_per_day }}" required>
                @error('rental_per_day')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary text-right">Update</button>

      </form>
    </div>
@endsection
