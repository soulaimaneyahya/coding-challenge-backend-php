<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSRF Token -->
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:image" content="https://pngimg.com/uploads/circle/circle_PNG36.png" />
    <meta property="og:description" content="{{ config('app.name') }}" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="https://pngimg.com/uploads/circle/circle_PNG36.png" type="image/png">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </div>
    <div>
    <div class="container my-4">
        @yield('content')
    </div>
    </div>
</body>

</html>
