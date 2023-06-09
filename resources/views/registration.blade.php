<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body class="text-center">



<form class="form-signin" action="{{ route('registration') }}" method="POST">
    @csrf

    @if (Session::has('alert'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            {{ session('alert') }}
        </div>
    @endif

    <h1 class="h3 mb-3 font-weight-normal">Create new account</h1>

    <label for="inputName" class="sr-only">Name</label>
    <input name="name" type="text" id="inputName" class="form-control" placeholder="Your name" required autofocus>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>

    <label for="inputPassword" class="sr-only">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <p class="mt-2"><a href="{{ route('login') }}">Sign In</a></p>
</form>
</body>
</html>
