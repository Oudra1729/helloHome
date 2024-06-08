<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Code for displaying a listing of images (if needed)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();
        // Code for showing the form for creating a new image (if needed)
        return view('insert_images',compact('properties'));

    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)

    // {
    //     dd($request);
    //     // Validate the request
    //     $request->validate([
    //         'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'property_id' => 'required|exists:properties,id'
    //     ]);

    //     // Check if the request contains an uploaded image file
    //     if ($request->file('image_path')) {
    //         $file = $request->file('image_path');
    //         $newFileName = time() . '-' . $file->getClientOriginalName();

    //         // Store the uploaded image file in the specified directory
    //         $file->storeAs('my-uploaded-images', $newFileName, 'public');

    //         // Create a new image instance
    //         $image = new Image();
    //         $image->image_path = $newFileName;
    //         $image->property_id = $request->property_id;
    //     dd($image);
    //         // Save the image instance to the database
    //         $image->save();

    //         // Optionally, you can return a success response or redirect
    //         return response()->json(['message' => 'Image uploaded successfully'], 200);
    //     } else {
    //         // Handle case where no image file is uploaded in the request
    //         return response()->json(['error' => 'No image uploaded'], 400);
    //     }
    // }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
            'property_id' => 'required|exists:properties,id', // Ensure property_id exists in the properties table
        ]);

        // Check if the request contains an uploaded image file
        if ($request->hasFile('image_path')) {
            // Store the uploaded image file in the specified directory with a unique name
            $filePath = $request->file('image_path')->store('images', 'public');

            // Create a new image instance using the create() method
            $image = Image::create([
                'image_path' => $filePath,
                'property_id' => $request->property_id,
            ]);
            // dd($image);

            // Redirect to a success page or view
            return redirect()->route('properties.index')->with('success', 'Image uploaded successfully');
        } else {
            // Handle case where no image file is uploaded in the request
            return redirect()->back()->with('error', 'No image uploaded');
        }
    }

}
