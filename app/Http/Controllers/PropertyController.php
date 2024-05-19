<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        // جلب جميع العقارات مع صورهم
        $properties = Property::with('images')->paginate(6);

        // // إرجاع العرض مع العقارات
        // return view('properties.index', compact('properties'));
        return view('acceuil', compact('properties'));
    }

    public function search(Request $request)
    {
        // Get search parameters from the request
        $type = $request->input('type');
        $city = $request->input('city');
        $price = $request->input('price');
        $status = $request->input('status');

        // Build the query
        $query = Property::query();

        if ($type) {
            $query->where('type', $type);
        }
        if ($city) {
            $query->where('city', $city);
        }
        if ($price) {
            $query->where('price', '<=', $price);
        }
        if ($status) {
            $query->where('status', $status);
        }

        // Get the results
        $properties = $query->get();

        // Return the results to the search view
        return view('result', compact('properties'));
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
