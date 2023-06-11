<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('bookings', BookingController::class);

Auth::routes();

//----All Admin Routes List----

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/vehicle_list', [VehicleController::class, 'index'])->name('vehicle.list');
    Route::resource('vehicles', VehicleController::class);
    Route::get('/admin/booking_list', [BookingController::class, 'index'])->name('booking.list');
});

Route::controller(SearchController::class)->group(function(){
    Route::get('demo-search', 'index');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});

