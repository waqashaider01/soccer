<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=PT+Sans&family=Roboto&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/authentication/auth.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        #eyeIcon {
            position: absolute;
            top: 5px;
            right: 20px;
            cursor: pointer;
        }
    </style>

</head>

<body class="antialiased">
    <section class="user-auth">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="left-side">
                    <div class="content">
                        {{-- <img src="{{ asset('images/logo.png') }}" alt="user auth background">
                        <div class="text">
                            <h1>Soccer World Link</h1>
                            <p>Redefining recruitment and talent aquisition in the world of soccer</p>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <form class="user-auth-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h4>Login</h4>
                    <div class="row mb-3 mt-4">
                        <div class="col-12">
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Type your email or username" name="email" value="{{ old('email') }}"
                                required autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12" style="position: relative">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Type your password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span id="eyeIcon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">
                            <button type="submit">Sign In</button>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Keep me logged in
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="recover-password">
                                    <!--<a href="{{ route('password.request') }}">Recover Password</a>-->
                                    <a href="#">Recover Password</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-start link">
                                Don't have an account yet? &nbsp;<a href="/register">Register Here</a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6 class="text-center">OR</h6>
                    <h2 class="text-center">Connect With</h2>
                    <div class="row mb-3">
                        <div class="col-md-6 ">
                            <!--<a href="{{ route('login.google') }}" class="btn btn-danger btn-block">Login with-->
                            <!--    Google</a>-->
                            <a href="#" class="btn btn-danger btn-block">Login with
                                Google</a>
                        </div><br>
                        <div class="col-md-6 ">

                            <!--<a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">Login with-->
                            <!--    Facebook</a>-->
                            <a href="#" class="btn btn-primary btn-block">Login with
                                Facebook</a>
                        </div><br>
                    </div>
                    <div class="row  mb-3 ">
                        <div class="col-md-6">
                            <!--<a href="{{ route('login.github') }}" class="btn btn-dark btn-block">Login with-->
                            <!--    Github</a><br>-->
                            <a href="#" class="btn btn-dark btn-block">Login with
                                Github</a><br>
                        </div>
                        <div class="col-md-6 ">
                            <!--<a href="{{ route('login.linkedin') }}" class="btn btn-dark btn-block">Login with-->
                            <!--    Linkedin</a>-->
                            <a href="#" class="btn btn-dark btn-block">Login with
                                Linkedin</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='{{ asset(' js/toastr.js') }}'></script>
    <script>
        let password = document.getElementById('password');
        let eye = document.getElementById('eyeIcon');
        eye.onclick = () => {

            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>
    @if (Session::get('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
    @elseif (Session::get('error'))
        <script>
            toastr.error("{!! Session::get('error') !!}");
        </script>
    @endif

</body>

</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
