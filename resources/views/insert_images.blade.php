@extends('layouts.app')
@section('content')

<h1>image form</h1>
{{--  
<form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="">
        <input type="hidden" name="property_id" value="{{ $id }}">
        <input type="hidden" name="property_id" value="{{ $property_id }}">
        <label for="image">Image:</label>
        {{-- value={{ old('image') }} 
        <input class="form-control" type="file" name="image_path" id="image_path" >
        <!-- Le message d'erreur pour "picture" -->
        @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit">Ajouter</button>
</form>
--}}
<form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image_path" required>
    <input type="hidden" name="property_id" value="{{ $property_id }}">
    <button type="submit">Upload Image</button>
</form>

@endsection
