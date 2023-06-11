<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()
    {
        return view('searchDemo');
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function autocomplete(Request $request)
    {//dd($request);
        $data = Vehicle::select("vehicle_name as value","rental_per_day","id")
        ->where('vehicle_name', 'LIKE', '%'. $request->get('search'). '%')
        ->get();
        //dd($data);
return response()->json($data);
    }
}
