<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>
    <title>@yield('pageTitle', $pageTitle ?? '')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @routes
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div>
            <div class="navbar-nav d-flex flex-row">
                <a class="nav-item nav-link mr-3 {{\Illuminate\Support\Facades\Request::path() == 'products' ? 'active' : ''}}" href="{{route('products.index')}}">Product</a>
                <a class="nav-item nav-link {{\Illuminate\Support\Facades\Request::path() == 'categories' ? 'active' : ''}}" href="{{route('categories.index')}}">Category</a>
            </div>
        </div>
    </nav>
</header>
<main class="pt-4 pb-4">
    @yield('content')
</main>

<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')

</body>
</html>
