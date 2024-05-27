@extends('layouts.app')

@section('content')
    <header class="header">
        <a href="{{ url('/index.html') }}">
            <img src="{{ asset('assets/icons/logo.png') }}" alt="logo" class="logo" />
        </a>
        <nav>
            <ul>
                <li><a href="{{ url('/index.html') }}" class="link">Accuiel</a></li>
                <li><a href="#" class="link">Acheter</a></li>
                <li><a href="#" class="link">Services</a></li>
                <li id="inscription-btn">
                    <a href="#" class="link btn">Inscription</a>
                </li>
            </ul>
        </nav>
    </header>

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
            <div class="content">
                <section class="person-boxes">
                    <div class="person-box">
                        <div class="property-card">
                            <img src="{{ asset('assets/img/m2 2.png') }}" alt="Property Image" />
                            <div class="property-info">
                                <h2>$2500/M</h2>
                                <p>Office, Barrio Allerdi</p>
                                <p>3 Bedrooms - 60m²</p>
                                <p>3 Baths - 3 Dormitories</p>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </main>
    </div>
@endsection
