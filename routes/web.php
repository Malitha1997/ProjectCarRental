<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/booking', function () {
    return view('booking.create');
});

Route::resource('bookings', BookingController::class);

Route::post('/livesearch', [BookingController::class, 'livesearch'])->name('livesearch');

Auth::routes();



/*

All Normal Users Routes List

*/

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/customer/home', [BookingController::class, 'create'])->name('customer.home');
});



/*

All Admin Routes List

*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/vehicle_list', [VehicleController::class, 'index'])->name('vehicle.list');
    Route::resource('vehicles', VehicleController::class);
    Route::get('/admin/booking_list', [BookingController::class, 'index'])->name('booking.list');
});



/*

All Admin Routes List

*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

Route::controller(SearchController::class)->group(function(){
    Route::get('demo-search', 'index');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});

Route::get('/booking/vehicle', [BookingController::class, 'create'])->name('booking.vehicle');
