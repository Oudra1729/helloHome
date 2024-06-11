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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script> <!-- Replace YOUR_API_KEY with your actual API key -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .property-details {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }
        .property-details h1 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
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
        .property-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .property-info th, .property-info td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
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
        #map {
            height: 400px;
            width: 100%;
            margin-top: 20px;
        }
        .whatsapp-link:hover {
            animation: tada 1s; /* Add the animation */
        }
    </style>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="property-details animate__animated animate__fadeIn">
            <h1>{{ $property->status }} - {{ $property->city }}</h1>
            <div class="image-container">
                @foreach ($images as $image)
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $property->city }}" class="animate__animated animate__zoomIn">
                @endforeach
            </div>
            <div class="property-info mt-4">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Title:</th>
                            <td>{{ $property->title}}</td>
                        </tr>
                        <tr>
                            <th>Type:</th>
                            <td>{{ $property->type }}</td>
                        </tr>
                        <tr>
                            <th>Price:</th>
                            <td>{{ $property->price }} DH</td>
                        </tr>
                        <tr>
                            <th>Bedrooms:</th>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <th>Bathrooms:</th>
                            <td>{{ $property->bathrooms }}</td>
                        </tr>
                        <tr>
                            <th>Space:</th>
                            <td>{{ $property->space }} m²</td>
                        </tr>
                        <tr>
                            <th>Description:</th>
                            <td>{{ $property->description }}</td>
                        </tr>
                        <tr>
                            <th>Contact:</th>
                            <td>Contact us now for more information!</td>
                        </tr>
                    </tbody>
                </table>
       <!-- Blade template -->

<div class="contact-info">
    <i class="fas fa-building"></i>
    <p><strong>Agence Immobilière Supérieure</strong></p>
</div>
<div class="contact-info">
    <i class="fas fa-map-marker-alt"></i>
    <p>Adresse: 123 HAY AIN ALATI 1, ERRACHIDIA, DRAA-TAFILALATE</p>
</div>
<div class="contact-info">
    <i class="fas fa-phone"></i>
    <a href="tel:+212 0 123 45 67">+212 9 596 80 53</a>
</div>
<div class="contact-info">
    <i class="fas fa-envelope"></i>
    <a href="mailto:brahimbra1236@gmal.com" class="auth-required">brahimbra1236@gmal.com</a>
</div>
<div class="contact-info">
    <i class="fab fa-whatsapp"></i>
    <a href="https://wa.me/+212695968053" class="auth-required whatsapp-link">+212 695-968053</a>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const authRequiredLinks = document.querySelectorAll('.auth-required');

        authRequiredLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                @if(!Auth::check())
                    event.preventDefault();
                    window.location.href = "{{ route('login') }}"; // Redirect to login page
                @endif
            });
        });
    });
</script>


                        @if(Auth::user() && Auth::user()->name === 'hello home')
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning mt-4">Edit Property</a>
                        <form method="POST" action="{{ route('properties.destroy', $property->id) }}" onsubmit="return confirm('Are you sure you want to delete this property?');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-4">Delete Property</button>
                        </form>
                    @endif
                    </div>
                    <div id="map">
                        <div className='maps'><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Errachidia+(My%20Business%20Name)&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a></iframe></div>
                        </div> <!-- Map container -->
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

            // Initialize Google Maps
            // function initMap() {
            //     // The location of the property (Replace with actual coordinates)
            //     const propertyLocation = { lat: 31.9314, lng: -4.4238 };

            //     // The map, centered at the property location
            //     const map = new google.maps.Map(document.getElementById('map'), {
            //         zoom: 15,
            //         center: propertyLocation
            //     });

            //     // The marker, positioned at the property location
            //     const marker = new google.maps.Marker({
            //         position: propertyLocation,
            //         map: map
            //     });
            // }

            // // Load the map
            // initMap();

        });
    </script>

</body>
</html>
