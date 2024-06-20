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
        #detail{
            color: black;
            z-index: 9999;
        }
        #detail:hover{
            color: black;
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
                            <a href="{{ route('details', $property->id) }}" class="btn" id="detail" >Détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Carousel Variables
        const carouselInner = document.querySelector('.carousel-inner');
        const carouselItems = document.querySelectorAll('.carousel .item');
        const carouselItemCount = carouselItems.length;
        const itemsPerSlide = 3;
        let carouselCurrentIndex = 0;
        let carouselInterval;

        // Image Slider Variables
        const imageContainers = document.querySelectorAll('.image-container');

        // Function to show the next slide in the carousel
        const showNextSlide = () => {
            carouselCurrentIndex++;
            const offset = -carouselCurrentIndex * (100 / itemsPerSlide);
            carouselInner.style.transform = `translateX(${offset}%)`;

            if (carouselCurrentIndex >= carouselItemCount / itemsPerSlide) {
                // Reset to the first item for a seamless effect
                setTimeout(() => {
                    carouselInner.style.transition = 'none';
                    carouselInner.style.transform = 'translateX(0)';
                    carouselCurrentIndex = 0;
                    // Force reflow to reset transition
                    carouselInner.offsetHeight;
                    carouselInner.style.transition = 'transform 1s ease';
                }, 1000); // 1000ms corresponds to the transition duration
            }
        };

        // Function to show the next image in the slider
        const showNextImage = (images, currentIndex) => {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
            return currentIndex;
        };

        // Initialize carousels if needed
        if (carouselItemCount > itemsPerSlide) {
            carouselInterval = setInterval(showNextSlide, 4000); // Change slide every 4 seconds
        }

        // Initialize image sliders
        imageContainers.forEach(container => {
            const images = container.querySelectorAll('img');
            let imageCurrentIndex = 0;

            // Show the first image initially
            if (images.length > 0) {
                images[0].classList.add('active');
            }

            // Change images every 3 seconds
            let imageInterval = setInterval(() => {
                imageCurrentIndex = showNextImage(images, imageCurrentIndex);
            }, 3000);

            // Pause the interval on mouse enter and resume on mouse leave
            container.addEventListener('mouseenter', () => {
                clearInterval(imageInterval);
            });

            container.addEventListener('mouseleave', () => {
                imageInterval = setInterval(() => {
                    imageCurrentIndex = showNextImage(images, imageCurrentIndex);
                }, 3000);
            });

            // Change image on click
            container.addEventListener('click', () => {
                imageCurrentIndex = showNextImage(images, imageCurrentIndex);
            });
        });

        // Clean up intervals when page is unloaded (optional)
        window.addEventListener('beforeunload', () => {
            if (carouselInterval) clearInterval(carouselInterval);
            imageContainers.forEach(container => {
                const imageInterval = container.dataset.intervalId;
                if (imageInterval) clearInterval(parseInt(imageInterval));
            });
        });
    });
</script>



</body>
</html>
