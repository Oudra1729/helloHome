<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
                              ->where('status', ' À vendre')
                              ->paginate(10);
        // إرجاع العرض مع العقارات
        return view('properties/acheter', compact('properties'));
    }
    public function louer()
    {
        // جلب العقارات المعروضة للإيجار فقط
        $properties = Property::with('images')
                              ->where('status', 'À louer')
                              ->paginate(10);

        // إرجاع العرض مع العقارات
        return view('properties.louer', compact('properties'));
    }
     // Function to return the form view
     public function create()
     {
        if (!auth()->check()) {
            return redirect('login');
        }

        return view('ajouter');

     }

     public function show($id)
     {
         $property = Property::findOrFail($id);
         $images = DB::table('images')->where('property_id', $id)->paginate(5);
         return view('properties.Details', compact('property', 'images'));
     }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'status' => 'required|string',
            'type' => 'required|string',
            'city' => 'required|string',
            'space' => 'required|integer',
            'user_id' => 'sometimes|integer',  // Make user_id optional and integer
        ]);

        // Create the property
        $created_property = Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'status' => $request->status,
            'type' => $request->type,
            'city' => $request->city,
            'space' => $request->space,
            'user_id' => $request->user_id ?? auth()->id(),  // Default to authenticated user's ID
        ]);

        if ($created_property) {
            // Fetch the created property from the database
            $properties = Property::find($created_property->id);
            // dd($property);

            return view('insert_images', compact('properties'));
        } else {
            // If property creation fails, redirect back to the property creation form with an error message
            return redirect()->route('insertImages')->withErrors(['error' => 'An error occurred while adding the property. Please try again.']);
        }
    }



    public function edit($id)
{
    $property = Property::findOrFail($id);
    return view('properties.edit', compact('property'));
}



public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'bedrooms' => 'required|integer',
        'bathrooms' => 'required|integer',
        'status' => 'required|string',
        'type' => 'required|string',
        'city' => 'required|string',
        'space' => 'required|integer',
    ]);

    // Find the property by its ID
    $property = Property::findOrFail($id);

    // Update the property with new data
    $property->update([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'bedrooms' => $request->bedrooms,
        'bathrooms' => $request->bathrooms,
        'status' => $request->status,
        'type' => $request->type,
        'city' => $request->city,
        'space' => $request->space,
    ]);

    // Redirect back with a success message
    return redirect()->route('properties.index', $property->id)->with('success', 'Property updated successfully.');
}


    public function destroy($id)
    {
        // Find the property by its ID
        $property = Property::findOrFail($id);

        // Delete the related images
        $property = Property::findOrFail($id);

        // Delete the related images
        foreach ($property->images as $image) {
            // Delete the image file from storage (if necessary)
            if(Storage::disk('public')->exists( $image->image_path)){
                Storage::disk('public')->delete( $image->image_path);
                $image->delete();
            }

        }

        $property->delete();

        // Redirect back with a success message
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }




}
