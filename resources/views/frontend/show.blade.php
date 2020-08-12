<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fondamento:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
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
    <div class="container col-md-11 bg-white mt-4">
        <div class="row">
            <div class="col-12 col-sm-6 mt-4">
                <div class="col-12">
                    <img src="/storage/{{ $post->image }}" class="product-image" alt="House Image">
                </div>
                <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="/storage/{{ $post->image }}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image_i}}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image_ii }}" alt="House Image"></div>
                    <div class="product-image-thumb" ><img src="/storage/{{ $post->image_iii }}" alt="House Image"></div>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="container mb-2 mt-4">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                <div class="d-flex align-items-center">
                                    
                                    <div>
                                        <div class="font-weight-bold">
                                            <a href="/profile/{{ $post->landlord->id }}">
                                                <span class="text-dark">{{ $post->landlord->username }}</span>
                                            </a>
                                            <a href="/profile/{{ $post->landlord->id }}" class=" btn btn-primary pl-3">Follow</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card col-md-12">
                    <div class="card-body">
                        <form action="/frontend" method="post">
                            @csrf
                            <h4 style="text-align: center;">House Details</h4><hr>
                            <input type="hidden" name="p_id" class="form-control" value="{{ $post->id }}">
                            <strong>Title</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->title}}
                            </p>
                            <strong>House Price/Month</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->price}}
                            </p>
                            <strong>Number of Bedrooms</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->bedrooms}}
                            </p>
                            <strong>Number of Bathrooms</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->bathrooms}}
                            </p>
                            <strong>Owner</strong>
                            <hr>
                            <p class="text-muted">
                                {{$post->landlord->name}}
                            </p>
                            <strong>Contact</strong>
                            <hr>
                            <p class="text-muted">
                                
                            </p>
                            <hr>
                            
                            <button class="btn btn-success float-right" type="submit"> Request House</button>
                        </form>
                    </div>
                </div>
                <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>

            </div>
        </div>
        <div class="row mt-4">
            <nav class="w-100">
                <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">House Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{ $post->description}}</div>
                <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> </div>
                <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> </div>
            </div>
        </div>
    </div>

    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin.min.js"></script> 
</body>
</html>
