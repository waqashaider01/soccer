<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&family=PT+Sans&family=Roboto&display=swap" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/authentication/auth.css')}}">
    </head>
    <body class="antialiased">
        <section class="user-auth">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="left-side">
                        <div class="content">
                            {{-- <img src="{{asset('images/logo.png')}}"  alt="user auth background">
                            <div class="text">
                                <h1>Soccer World Link</h1>
                                <p>Redefining recruitment and talent aquisition in the world of soccer</p>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <form class="user-auth-form">
                        <h4>Login</h4>
                        <div class="row mb-3 mt-4">
                            <div class="col-12">
                                <input type="email" class="form-control" id="email" placeholder="Type your email or username">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <input type="password" class="form-control" id="password" placeholder="Type your password">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <button type="submit">Sign Up</button>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <span class="form-check-label">
                                      Keep me logged in
                                    </span>
                                </div>
                                <div class="recover-password">
                                    <a href="">Recover Password</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-start link">
                                    Don't have an account yet? &nbsp;<a href="/register">Register Here</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>

