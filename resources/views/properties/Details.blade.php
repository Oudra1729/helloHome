<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .property-details {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
        .contact-info {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .contact-info i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        .contact-info a {
            color: inherit;
            text-decoration: none;
        }
        .contact-info a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="property-details animate__animated animate__fadeIn">
            <h1 class="text-center">{{ $property->status }} - {{ $property->city }}</h1>
            <div class="image-container">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $property->city }}" class="animate__animated animate__zoomIn">
                @endforeach
            </div>
            <div class="property-info mt-4">
                <p><strong>Type:</strong> {{ $property->type }}</p>
                <p><strong>Price:</strong> {{ $property->price }}DH</p>
                <p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
                <p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
                <p><strong>Space:</strong> {{ $property->space }}m²</p>
                <p><strong>Description:</strong> {{ $property->description }}</p>
                <p><strong>For {{ $property->status }}:</strong> Contact us now for more information!</p>
                <div class="contact-info">
                    <i class="fas fa-building"></i>
                    <p><strong>Agence Immobilière Supérieure</strong></p>
                </div>
                <div class="contact-info">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Adresse: 123 Rue Principale, Ville, Pays</p>
                </div>
                <div class="contact-info">
                    <i class="fas fa-phone"></i>
                    <a href="tel:+212 0 123 45 67">+212 0 123 45 67</a>
                </div>
                <div class="contact-info">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:brahimbra1236@gmal.com">brahimbra1236@gmal.com</a>
                </div>
                <div class="contact-info">
                    <i class="fab fa-whatsapp"></i>
                    <p> <a href="https://wa.me/+212695968053">+212 695-968053</a></p>
                    {{-- <a href="https://wa.me/+212 695-968053">+212 695-968053</a> --}}
                </div>
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
