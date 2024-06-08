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
        .carousel {
            display: flex;
            overflow: hidden;
            width: 100%;
        }
        .carousel-inner {
            display: flex;
            transition: transform 0.5s ease;
        }
        .carousel .item {
            flex: 0 0 33.33%; /* Display 3 items at a time */
            box-sizing: border-box;
            padding: 10px;
        }
        .item-img {
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
            transition: opacity 0.0000s ease-in-out;
        }
        .image-container img.active {
            opacity: 1;
        }
    </style>
</head>
<body>

<section class="section-3">
    <div class="titles">
        <h1>Explorez nos annonces de qualité supérieure</h1>
        <h3>
            Nous sommes là pour vous guider dans votre recherche d'un bien hellohome à louer au Maroc sur hellohome.com
        </h3>
    </div>
    <div class="carousel">
        <div class="carousel-inner">
            @foreach ($properties as $property)
                <div class="item">
                    <div class="item-img">
                        <label>{{ $property->status }}</label>
                        @foreach ($property->images as $image)
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image of {{ $property->city }}">
                        @endforeach
                    </div>
                    <div class="item-body">
                        <div class="info-1">
                            <div class="">
                                <div class="iconed info-set">
                                    <img src="{{ asset('assets/icons/location1.png') }}" alt="" />
                                    <span>{{ $property->city }}</span>
                                </div>
                                <div class="iconed info-set">
                                    <img src="{{ asset('assets/icons/home-icon.png') }}" alt="" />
                                    <span>{{ $property->type }}</span>
                                </div>
                            </div>
                            <div class="price">
                                <span>{{ $property->price }} DH</span>
                            </div>
                        </div>
                        <div class="info-2">
                            <div>
                                <div class="iconed">
                                    <img src="{{ asset('assets/icons/bed2.png') }}" alt="" />
                                    <span>{{ $property->bedrooms }}</span>
                                </div>
                                <div class="iconed">
                                    <img src="{{ asset('assets/icons/bath.png') }}" alt="" class="custom-icon"/>
                                    <span>{{ $property->bathrooms }} Bath</span>
                                </div>
                            </div>
                            <a href="{{ route('details', $property->id) }}" class="btn">Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carouselInner = document.querySelector('.carousel-inner');
        const items = document.querySelectorAll('.carousel .item');
        const itemCount = items.length;
        const itemsPerSlide = 3;
        let currentIndex = 0;

        function showNextSlide() {
            currentIndex = (currentIndex + itemsPerSlide) % itemCount;
            const offset = -currentIndex * (100 / itemsPerSlide);
            carouselInner.style.transform = `translateX(${offset}%)`;

            if (currentIndex === 0) {
                // Move the first set of items to the end of the list for a continuous effect
                for (let i = 0; i < itemsPerSlide; i++) {
                    carouselInner.appendChild(carouselInner.firstElementChild);
                }
                // Reset the transform to show the seamless transition
                carouselInner.style.transition = 'none';
                carouselInner.style.transform = 'translateX(0)';
                setTimeout(() => {
                    carouselInner.style.transition = 'transform 1s ease';
                });
            }
        }

        setInterval(showNextSlide, 4000); // Change slide every 4 seconds
    });
</script>

</body>
</html>
