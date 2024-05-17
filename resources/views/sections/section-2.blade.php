<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page</title>
    {{-- Uncomment the following line if you're using Bootstrap --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/tilwind.css') }}">

    <style>
        .carousel .item-img {
            overflow: hidden;
            position: relative;
            width: 100%; /* Adjust this as needed */
            height: 300px; /* Adjust this as needed */
        }
        .pagination {
            display: flex;
            justify-content: space-between;
            font-size: 20px;
            margin-top: 20px;


        }

        .pagination   {
            width: 40px !important;

        }


    </style>
</head>
<body>

<section class="section-2">
    <div class="titles">
        <h1>Explorez nos annonces de qualité supérieure</h1>
        <h3>
            Nous sommes là pour vous guider dans votre recherche d'un bien hellohome à louer au Maroc sur hellohome.com
        </h3>
    </div>

    <div class="carousel">
        @foreach ($properties as $property)
            <div class="item">
                <div class="item-img">
                    <label><h2>{{ $property->status }}</h2></label>
                    @foreach ($property->images as $image)
                        <img src="{{ $image->image_url }}" alt="Image of {{ $property->title }}">
                    @endforeach
                </div>
                <div class="item-body">
                    <div class="info-1">
                        <div class="">
                            <div class="iconed info-set">
                                <img src="{{ asset('assets/icons/location1.png') }}" alt="" />
                                <p>{{ $property->title }}</p>
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
                                <span>2097m²</span>
                            </div>
                        </div>
                        <a href="#" class="btn">Détails</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination">
        {{-- Pagination links --}}
        {{ $properties->links() }}
    </div>
</section>

</body>
</html>
