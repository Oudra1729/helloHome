<header class="header">
    <a href="{{ route('properties.index') }}">
        <img src="{{ asset('assets/icons/logo.png') }}" alt="logo" class="logo" />

    </a>
    <nav>
        <ul>
            <li><a href="{{ route('properties.achats') }}" class="link">Acheter</a></li>
            <li><a href="" class="link">Louer</a></li>
            <li id="inscription-btn">
                @if (Auth()->user())
                <li><a href="#" class="link">Vendre</a></li>
                <li><a href="#" class="link">Services</a></li>

                    <h4>{{ Auth()->user()->name }}</h4>
                    <a class="btn btn-link" href="{{ route('logout') }}">
                        {{ __('Deconnexion') }}
                    </a>
                @else
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Inscription') }}
                    </a>
                @endif
                {{-- <a href="" class="link btn"></a> --}}
            </li>
        </ul>
    </nav>
</header>
