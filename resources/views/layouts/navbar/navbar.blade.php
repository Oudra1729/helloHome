<header class="header">
    <a href="{{ route('properties.index') }}">
        <img src="{{ asset('assets/icons/logo.png') }}" alt="logo" class="logo" />

    </a>
    <nav>
        <ul>
            <li><a href="{{ route('properties.achats') }}" class="link">Acheter</a></li>
            <li><a href="{{ route('properties.louer') }}" class="link">Louer</a></li>
            <li><a href="{{ route('properties.vender') }}" class="link">Vendre</a></li>
            <li id="inscription-btn">
                @if (Auth()->user() && Auth()->user()->isAdmin())
                @endif
                <li><a href="#" class="link">Services</a></li>

                @if (Auth()->user())
                    <h4>{{ Auth()->user()->name }}</h4>
                    <a class="btn btn-link" href="{{ route('logout') }}">
                        {{ __('Déconnexion') }}
                    </a>
                @else
                    <a class="btn btn-link" href="{{ route('login') }}">
                        {{ __('Inscription') }}
                    </a>
                @endif
            </li>

        </ul>
    </nav>
</header>
