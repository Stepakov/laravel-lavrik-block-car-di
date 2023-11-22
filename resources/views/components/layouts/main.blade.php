@props([
    'title',
    'h1' => null
    ])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite( [ 'resources/css/app.scss' ] )
</head>
<body>

<div>
    @if( session()->has( 'message' ) )
        <div class="alert alert-success container">
            <div class="row">
                {{ session( 'message' ) }}
            </div>
        </div>
    @endif
</div>

<header class="border-bottom pb-4">
    <div class="container">
        <div class="row">
            HEADER
            @auth
            {{ auth()->user()->email }}
            @endauth
            @guest
                <a href="{{ route( 'auth.login.create' ) }}">
                    Login
                </a>
            @endguest
        </div>
    </div>
</header>

<main>
    <div class="container">
        <div class="row">

            <div class="col col-3">

                <div class="list-group">
                    <div class="list-group-item">
                        <a href="{{ route( 'posts.index' ) }}">Posts</a>
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item">
                        <a href="{{ route( 'cars.index' ) }}">Cars</a>
                    </div>
                </div>
                <div class="list-group">
                    <div class="list-group-item">
                        <a href="{{ route( 'brands.index' ) }}">Brands</a>
                    </div>
                </div>

            </div>
            <div class="col col-9">
                <h1>
                    {{ $h1 ?? $title }}
                </h1>

                {{ $slot }}
            </div>

        </div>
    </div>
</main>

<footer class="border-top pt-4 mt-3">
    <div class="container">
        <div class="row">
            FOOTER
        </div>
    </div>
</footer>

@vite( [ 'resources/js/app.js' ] )
</body>
</html>
