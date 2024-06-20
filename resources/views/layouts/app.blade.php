
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Links to CSS files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filtring.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



</head>
<body>
    <div class="container">
        @include('layouts.navbar.navbar')

        <main>
            @yield('content')
        </main>
        @include('layouts.footer.footer')
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
