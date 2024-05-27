<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
    <div class="property-details">
        <h1>{{ $property->status }} - {{ $property->city }}</h1>
        <div class="image-container">
            @foreach ($images as $image)
                <img src="{{ asset('storage/images/' . $image->image_path) }}" alt="Image of {{ $property->city }}">
            @endforeach
        </div>
        </div>
        <div class="property-info">
            <p>Type: {{ $property->type }}</p>
            <p>Price: {{ $property->price }}$</p>
            <p>Bedrooms: {{ $property->bedrooms }}</p>
            <p>Bathrooms: {{ $property->bathrooms }}</p>
            <p>Space: {{ $property->space }}m²</p>
        </div>
        <a href="{{ url()->previous() }}" class="btn">Back to Listings</a>
    </div>
    <div class="pagination">
        {{ $images->links() }}
    </div>


    <script >
        document.addEventListener('DOMContentLoaded', function() {
    // Apply animation to the property details container
    const propertyDetails = document.querySelector('.property-details');
    propertyDetails.classList.add('animate__animated', 'animate__fadeIn');

    // Apply animation to each image in the gallery
    const images = document.querySelectorAll('.image-gallery img');
    images.forEach((image, index) => {
        image.classList.add('animate__animated', 'animate__zoomIn');
        image.style.animationDelay = `${index * 0.2}s`; // stagger the animation
    });
});

    </script>
</body>
</html>
