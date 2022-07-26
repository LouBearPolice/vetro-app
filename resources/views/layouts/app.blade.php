<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Vetro</title>

        <!-- Style -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>span.relative.z-0.inline-flex.shadow-sm.rounded-md {display: none;}p.text-sm.text-gray-700.leading-5 {margin-top: 20px;}</style>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" defer></script>

    </head>
    <body class="">

        <div class="navbar navbar-inverse navbar-fixed-top pt-0">
            <div class="w-100">
                <nav class="navbar navbar-expand-lg bg-light w-100 p-2">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Vetro</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                                </li>
                            </ul>
                            <span class="navbar-text">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    @if (auth()->user())
                                        <li class="nav-item">
                                            <a class="nav-link">Welcome {{ auth()->user()->name }}</a>
                                        </li>
                                        <li class="nav-item d-block mt-1 ms-3">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button type="submit" class="">Logout</button>
                                            </form>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endif
                                </ul> 
                            </span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container body-content">
            @yield('content')
        </div>  

    </body>
</html>