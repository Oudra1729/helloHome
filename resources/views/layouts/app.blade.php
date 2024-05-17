
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
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('layouts.navbar.navbar')
        {{-- @yield('content') --}}
        <main>
            @include('sections.section-1')
            @include('sections.section-2')
            @include('sections.section-3')
            @include('sections.section-4')
            @include('sections.section-5')
            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    @include('layouts.footer.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
