<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .property-details {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            /* padding: 20px; */
            margin-top: 20px;
        }
        .property-details h1 {
            font-size: 2rem;
            font-weight: bold;
        }
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        .image-container img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .image-container img:hover {
            transform: scale(1.05);
        }
        .property-info {
            margin-top: 20px;
        }
        .property-info p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .btn-back {
            margin-top: 30px;
        }
        .pagination {
            margin-top: 30px;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="property-details animate__animated animate__fadeIn">
            <h1 class="text-center">{{ $property->status }} - {{ $property->city }}</h1>
            <div class="image-container">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/images/' . $image->image_path) }}" alt="Image of {{ $property->city }}" class="animate__animated animate__zoomIn">
                @endforeach
            </div>
            <div class="property-info mt-4">
                <p><strong>Type:</strong> {{ $property->type }}</p>
                <p><strong>Price:</strong> {{ $property->price }}DH</p>
                <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                <p><strong>Space:</strong> {{ $property->space }}m²</p>
                <p><strong>description:</strong> {{ $property->description }}</p>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-back">Back to Listings</a>
        </div>
        <nav class="pagination justify-content-center mt-4">
            {{ $images->links() }}
        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const propertyDetails = document.querySelector('.property-details');
            propertyDetails.classList.add('animate__animated', 'animate__fadeIn');

            const images = document.querySelectorAll('.image-container img');
            images.forEach((image, index) => {
                image.classList.add('animate__animated', 'animate__zoomIn');
                image.style.animationDelay = `${index * 0.2}s`;
            });
        });
    </script>
</body>
</html>
