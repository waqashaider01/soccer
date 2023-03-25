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
                <form class="user-auth-form" method="POST" action="{{ route('register') }}">
                    <h4>Sign Up</h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control cate">
                                <option selected disabled>Select One</option>
                                <option value="1">Player</option>
                                <option value="2">Scout</option>
                                <option value="3">Intermediary</option>
                                <option value="4">Coach</option>
                                <option value="5">Academy</option>
                                <option value="6">Club</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Choose a Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <span class="form-check-label">
                                    I have read and agree to the Terms of Use and Privacy Policy
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button type="submit">Sign Up</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-start link">
                                Already a Member? &nbsp;<a href="/login">Login</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
