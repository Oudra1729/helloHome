<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // جلب جميع العقارات مع صورهم
        $properties = Property::with('images')->get();

        // // إرجاع العرض مع العقارات
        // return view('properties.index', compact('properties'));
        return view('acceuil', compact('properties'));
    }
    public function vender()
    {
        // جلب العقارات المعروضة للبيع فقط
        $properties = Property::with('images')
                              ->where('status', 'للبيع')
                              ->get();

        // إرجاع العرض مع العقارات
        return view('properties.index', compact('properties'));
    }
    public function louer()
    {
        // جلب العقارات المعروضة للبيع فقط
        $properties = Property::with('images')
                              ->where('status', 'louer')
                              ->get();

        // إرجاع العرض مع العقارات
        return view('properties.index', compact('properties'));
    }
     // Function to return the form view
     public function create()
     {
        // if (!auth()->check()) {
        //     return redirect('login');  // أو أي مسار تسجيل دخول لديك
        // }

        return view('ajouter');

     }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'bedrooms' => 'required|int',
            'bathrooms' => 'required|int',
            'status' => 'required|string',
            'type' => 'required|string',
            'city' => 'required|string',
        ]);

        $created_object = Property::create($request->all());
        if($created_object){
             $id= $created_object->id;
             return view('insert_images',compact('id'));
        } else {
            return redirect()->route('properties.create')->withErrors(['error' => 'An error occurred while adding the property. Please try again.']);
        }
        // return redirect()->route('properties.store')->with('success', 'Property added successfully!');
    }
}
