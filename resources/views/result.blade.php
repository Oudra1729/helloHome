<!-- resources/views/properties/search.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="search-results">
        <h1>Résultats de la recherche</h1>
        @if($properties->isEmpty())
            <p>Aucune propriété trouvée.</p>
        @else
            @foreach ($properties as $property)
                <div class="property">
                    <h2>{{ $property->title }}</h2>
                    <p>{{ $property->description }}</p>
                    <p>Price: {{ $property->price }}</p>
                    <p>Bedrooms: {{ $property->bedrooms }}</p>
                    <p>Bathrooms: {{ $property->bathrooms }}</p>
                    @foreach ($property->images as $image)
                        <img src="{{ $image->image_url }}" alt="Image of {{ $property->title }}">
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
@endsection
