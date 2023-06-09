<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $user_vehicles = Vehicle::with('user')->paginate(5);

        return view('admin.vehicles.index', compact('user_vehicles'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request)
    {
        $vehicles=new Vehicle;

        request()->validate([
            'vehicle_name'=> 'required|string|min:1|max:255',
            'rental_per_day'=> 'required|string',
        ]);
        //dd($request);
        $vehicles->vehicle_name=$request->vehicle_name;
        $vehicles->rental_per_day=$request->rental_per_day;
        $vehicles->user_id = Auth::id();

        $vehicles->save();

        // $vehicles->users()->attach($request->user);

        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle created successfully.');
    }

    public function show($id)
    {
        $vehicles = Vehicle::find($id);
        return view('admin.vehicles.show', compact('vehicles'));
    }

    public function edit($id)
    {
        $vehicles=Vehicle::find($id);
        return view('admin.vehicles.edit',compact('vehicles'));

    }

    public function update(Request $request, $id)
    {
        $vehicles=new Vehicle;
        request()->validate([
            'vehicle_name'=> 'required|string|min:1|max:255',
            'rental_per_day'=> 'required|string'
        ]);

        $vehicles->vehicle_name=$request->vehicle_name;
        $vehicles->rental_per_day=$request->rental_per_day;
        $vehicles->user_id = Auth::id();

        $vehicles->update();

        return redirect()->route('vehicles.index')
                        ->with('success','Vehicle updated successfully.');
    }

    public function destroy($id)
    {
        $vehicles = Vehicle::find($id);

        $vehicles->vehicles()->delete();
        $vehicles->delete();

        return redirect()->route('admin.vehicles.index')
        ->with('success','Vehicle deleted successfully');
    }
}
