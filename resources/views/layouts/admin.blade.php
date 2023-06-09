<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Top navbar example for Bootstrap</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Back to Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Add Products</a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    @if (Session::has('alert'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                x
            </button>
            {{ session('alert') }}
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>

