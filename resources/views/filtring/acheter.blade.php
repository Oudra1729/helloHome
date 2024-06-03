@extends('layouts.app')
<header>
    <link rel="stylesheet" href="{{ asset('css/filtring.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</header>
@section('content')

    <div class="louer">
        <aside>
            <form action="" method="post">
                <div class="taches">
                    <label for="" class="title">Taches</label>
                    <div>
                        <div>
                            <input type="checkbox" name="" id="" />
                            <label for="">Louer</label>
                        </div>
                    </div>
                </div>
                <div class="taches">
                    <label for="" class="title">Type de propriété</label>
                    <div>
                        <div>
                            <input type="checkbox" name="" id="" />
                            <label for="">Appartement</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="" />
                            <label for="">Maisons</label>
                        </div>
                        <div>
                            <input type="checkbox" name="" id="" />
                            <label for="">Ateliers</label>
                        </div>
                    </div>
                </div>

                <button type="submit">Appliquer</button>
            </form>
        </aside>

        <main class="content-wrap">
            <!-- resources/views/properties/index.blade.php -->


<div class="container">
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
            </div>
        </main>
    </div>
@endsection
