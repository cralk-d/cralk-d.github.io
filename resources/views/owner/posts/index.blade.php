<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- fonts-awesome -->
    <link rel="stylesheet" type="text/css" href="/plugins/fontawesome-free/css/all.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white mb-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}"> <img src="icons/app-indicator.svg" width="42" height="42">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <form action="/search" method="GET">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control"  value="{{ old('email') }}" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary">
                                    <span class="fas fa-search"></span>
                                </button>
                            </div>
                        </div>
                    </form>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><img src="/icons/lock.svg" class="text-break" height="20" width="20"> {{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> <img src="/icons/pencil.svg" class="text-break" height="20" width="20">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> <i class="fa fa-user"></i>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}"> <i class="fa fa-th"></i>  Profile</a>
                                    <a class="dropdown-item" href=""> <i class="fa fa-cog"></i> Setting</a>

                                    <a class="dropdown-item" href=""> <i class="fas fa-tachometer-alt"></i> Dashboard</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-md-10 pt-5 mt-5">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <a href="/p/{{ $post->id }}">
                            <img class="bd-placeholder-img card-img-top" src="/storage/{{ $post->image }}">
                        </a>
                        <div class="card-body">
                            <p class="card-text">{{ $post->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/p/{{ $post->id }}"  class="btn btn-md btn-outline-info"><img src="icons/eye.svg"> View</a>
                                    <button  class="btn btn-md btn-primary"><img src="icons/cart-fill.svg"> Request </button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="jumbotron">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <h4>Pages</h4>
                    <hr>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pl-4"><a class="nav-link" href="/profile/{user}"><img src="/icons/house.svg" class="text-break" height="20" width="20"> Home</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href="#"><img src="/icons/check2-all.svg" class="text-break" height="20" width="20"> Houses</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href="#"><img src="/icons/command.svg" class="text-break" height="20" width="20"> Terms</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href=""><img src="/icons/wifi.svg" class="text-break" height="20" width="20"> Feedback</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href="#"><img src="/icons/phone.svg" class="text-break" height="20" width="20"> Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4>Payment</h4>
                    <hr>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pl-4"><a class="nav-link" href="/profile/{user}"><img src="/icons/house.svg" class="text-break" height="20" width="20"> Home</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href="#"><img src="/icons/check2-all.svg" class="text-break" height="20" width="20"> Houses</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href="#"><img src="/icons/command.svg" class="text-break" height="20" width="20"> Terms</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href=""><img src="/icons/wifi.svg" class="text-break" height="20" width="20"> Feedback</a></li>
                        <li class="nav-item pl-4"><a class="nav-link" href="#"><img src="/icons/phone.svg" class="text-break" height="20" width="20"> Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer text-muted  bg-white ">
    <div class="container mt-5 pb-0">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p class="">&copy; </p>

            </div>
            <div class="col-md-6">
                <p class="float-right justify-content-between">
                    <a href="#" class="btn btn-success"><img src="icons/chevron-double-up.svg"></a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
