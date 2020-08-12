<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fondamento:ital@0;1&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link href="../css/app.css" rel="stylesheet">

</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                E-commerce
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link mr-5"> Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mr-5"> Fashion</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link mr-5"> Cosmetics</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mr-5"> About us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link mr-5"> Help</a>
                    </li>
                </ul>

                
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ml-5">
                        <a id="login" class="nav-link" href="./auth/login.html"><i class="fas fa-lock"></i> Login</a>
                    </li>
                    <li class="nav-item ml-5">
                        <a id="register" class="nav-link" href="./auth/register.html"> <i class="fas fa-pen"></i> Register</a>
                    </li>  
                </ul>
            </div>
        </div>
    </nav>

    <main class="pt-5 mt-5">
        <div class="container col-12 mt-">
        
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-3">
                        <div class="card mb-3 shadow-sm">
                            <a href="/frontend/{{ $post->id }}">
                                <img class="bd-placeholder-img card-img-top" src="/storage/{{ $post->image }}">
                            </a>
                            <div class="card-body">
                                <p class="card-text">{{ $post->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/frontend/{{ $post->id }}"  class="btn btn-md btn-outline-info"><img src="icons/eye.svg"> View</a>
                                        <button  class="btn btn-md btn-primary"><img src="icons/cart-fill.svg"> Request </button>
                                    </div>
                                    <small class="badge badge-default"><i class="far fa-clock"></i> {{ $post->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr class="featurette-divider">
            <form action="/feed" class="col-6" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" name="email" placeholder="Enter email" class="form-control">
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control" name="feed" placeholder="Give us your feedback">
                    </textarea>
                </div>
                
                <hr>
                <div class="form-group">
                    <button class="btn btn-primary"><i class="fas fa-rss"></i> Send Feedback</button>
                </div>
                
            </form>
                
                
         
        </div>    
        <footer class="container">
            <button class="btn col-2 btn-default float-right"><a href="#"><i class="fas fa-chevron-up"></i></a></button>
            <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </main>
    <script src="../plugins/jquery/jquery.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../js/admin.min.js"></script>
</body>
</html>
