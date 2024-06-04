@extends('layouts.app')

@section('content')
{{-- <div class="container">
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
</div> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    {{-- Uncomment the following line if you're using Bootstrap --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('css/tilwind.css') }}">

    <style>
        .carousel .item-img {
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 200px;
        }
        .pagination {
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            margin-top: 20px;
        }
        .pagination a {
            width: 40px !important;
        }
        .image-container {
            position: relative;
        }
        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .image-container img.active {
            opacity: 1;
        }
    </style>
</head>
<body>

<section class="section-2">
    <div class="titles">
        <h1>

        </h1>
        <h1>Trouvez votre maison de rêve dès maintenant</h1>
        {{-- <h3>
            Découvrez notre sélection exclusive de propriétés à vendre,
            à acheter et à louer.
        </h3> --}}
    </div>

    <div class="carousel">
        @foreach ($properties as $property)
            <div class="item">
                <div class="item-img image-container">
                    <label><h2>{{ $property->status }}</h2></label>
                    @foreach ($property->images as $image)
                        <img src="{{ asset('storage/images/' . $image->image_path) }}" alt="Image of {{ $property->city }}">
                    @endforeach
                </div>
                <div class="item-body">
                    <div class="info-1">
                        <div class="">
                            <div class="iconed info-set">
                                <img src="{{ asset('assets/icons/location1.png') }}" alt="" />
                                <p>{{ $property->city }}</p>
                            </div>
                            <div class="iconed info-set">
                                <img src="{{ asset('assets/icons/home-icon.png') }}" alt="" />
                                <span>{{ $property->type }}</span>
                            </div>
                        </div>
                        <div class="price">
                            <span><p>{{ $property->price }}$</p></span>
                        </div>
                    </div>
                    <div class="info-2">
                        <div class="info-set">
                            <div class="iconed">
                                <img src="{{ asset('assets/icons/bed2.png') }}" alt="" />
                                <span>{{ $property->bedrooms }}</span>
                            </div>
                            <div class="iconed">
                                <img src="{{ asset('assets/icons/shower.png') }}" alt="" class="custom-icon" />
                                <span>{{ $property->bathrooms }}</span>
                            </div>
                            <div class="iconed">
                                <img src="{{ asset('assets/icons/ruler.png') }}" alt="" class="custom-icon" />
                                <span>{{ $property->space }}m²</span>
                            </div>
                        </div>
                        <a href="{{ route('details', $property->id) }}" class="btn">Détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{-- Pagination links --}}
        {{-- {{ $properties->links() }} --}}
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const carousels = document.querySelectorAll('.image-container');

    carousels.forEach(container => {
        const images = container.querySelectorAll('img');
        let currentIndex = 0;

        // Function to show the next image
        const showNextImage = () => {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        };

        // Show the first image initially
        if (images.length > 0) {
            images[0].classList.add('active');
        }

        // Change images every 3 seconds
        let interval = setInterval(showNextImage, 3000);

        // Pause the interval on mouse enter and resume on mouse leave
        container.addEventListener('mouseenter', () => {
            clearInterval(interval);
        });

        container.addEventListener('mouseleave', () => {
            interval = setInterval(showNextImage, 3000);
        });

        // Change image on click
        container.addEventListener('click', showNextImage);
    });
});
</script>


</body>
</html>

@endsection
