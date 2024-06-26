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
        $properties = Property::paginate(6); // استخدم paginate مباشرةً على النموذج
        return view('home', compact('properties'));
    }
    public function index2(Request $request)
{
    $properties = Property::with('images')
        ->where('qualite', 'جيدة')
        ->take(4)
        ->get();

    return view('acceuil', compact('properties'));
}


}
