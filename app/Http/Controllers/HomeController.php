<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get search parameters from the request
        // $type = $request->input('type');
        // $city = $request->input('city');
        // $price = $request->input('price');
        // $status = $request->input('status');

        // Build the query
        // $query = Property::query();

        // if ($type) {
        //     $query->where('type', $type);
        // }
        // if ($city) {
        //     $query->where('city', $city);
        // }
        // if ($price) {
        //     $query->where('price', '<=', $price);
        // }
        // if ($status) {
        //     $query->where('status', $status);
        // }

        // Get the results
        // $properties = $query->get();
        $properties=Property::All();
        return view('home',compact('properties'));
    }

}
