@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($properties as $property)
    <div class="property">
        @foreach ($property->images as $image)
        <img src="{{ asset('storage/images/' . $image->image_path) }}" alt="Image of {{ $property->city }}">
    @endforeach
            <h2>{{ $property->title }}</h2>
            <p>{{ $property->description }}</p>
            <p>Price: {{ $property->price }}</p>
            <p>Bedrooms: {{ $property->bedrooms }}</p>
            <p>Bathrooms: {{ $property->bathrooms }}</p>
            @foreach ($property->images as $image)
            @endforeach
        </div>
    @endforeach
</div>
@endsection
