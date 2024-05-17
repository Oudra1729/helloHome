<head>
    <title>My Page</title>
    <style>
        .carousel .item-img {
            overflow: hidden;
            position: relative;
            width: 100%; /* Adjust this as needed */
            height: 300px; /* Adjust this as needed */
        }



        </style>


</head>
<body>

<section class="section-2">
    <div class="titles">
        <h1>Explorez nos annonces de qualité supérieure</h1>
        <h3>
            Nous sommes là pour vous guider dans votre recherche d'un bien
            hellohome à louer au Maroc sur hellohome.com
        </h3>
    </div>

    @foreach ($properties as $property)
    {{-- <div class="property">
        <h2>{{ $property->title }}</h2>
        <p>{{ $property->description }}</p>
        <p>Price: {{ $property->price }}</p>
        <p>Bedrooms: {{ $property->bedrooms }}</p>
        <p>Bathrooms: {{ $property->bathrooms }}</p>
        @foreach ($property->images as $image)
            <img src="{{ $image->image_url }}" alt="Image of {{ $property->title }}">

    </div> --}}

    <div class="carousel">
        <div class="item">
            <div class="item-img">
                <label>    <h2>{{ $property->status }}</h2></label>
                {{-- <img src="{{ asset('assets/img/img4 2.png') }}" alt="" /> --}}
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
                        <span> <p> {{ $property->price }}$</p></span>
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
            @endforeach
        </div>
    </div>
    <div class="navs">
        <a href="#"><img src="{{ asset('assets/icons/left.png') }}" alt="" /></a>
        <a href="#"><img src="{{ asset('assets/icons/right.png') }}" alt="" /></a>
    </div>
</section>

</body>
</html>
