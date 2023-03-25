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
        #eyeIcon1 {
            position: absolute;
            top: 40px;
            right: 20px;
            cursor: pointer;

        }

        #eyeIcon2 {
            position: absolute;
            top: 40px;
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
                <form class="user-auth-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h4>Sign Up</h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="category" class="form-label">Select Type</label>
                            <select class="form-control cate @error('email') is-invalid @enderror" name="category"
                                id="category" value="{{ old('category') }}" required autocomplete="category">
                                <option selected disabled>Select One</option>
                                <option value="player">Player</option>
                                <option value="scout">Scout</option>
                                <option value="intermediary">Intermediary</option>
                                <option value="coach">Coach</option>
                                <option value="academy">Academy</option>
                                <option value="club">Club</option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="firstName" name="firstName" value="{{ old('firstName') }}" required
                                autocomplete="firstName">
                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                id="lastName" name="lastName" value="{{ old('lastName') }}" required
                                autocomplete="lastName">
                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 guardian_details">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            @error('date_of_birth')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" id="gender-male" value="male">
                                <label class="form-check-label" for="gender-male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                                    name="gender" id="gender-female" value="female">
                                <label class="form-check-label" for="gender-female">
                                    Female
                                </label>
                            </div>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required
                                autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-6 guradian_email_address">
                            <label for="gurdian_email" class="form-label">Guardian Email Address</label>
                            <input type="gurdian_emai"
                                class="form-control @error('gurdian_email') is-invalid @enderror" id="gurdian_emai"
                                name="gurdian_email" value="{{ old('gurdian_email') }}"
                                autocomplete="gurdian_email">
                            @error('gurdian_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Choose a Password</label>
                            <input type="password" class="form-control @error('email') is-invalid @enderror"
                                id="password" name="password" required autocomplete="new-password">
                            <span id="eyeIcon1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                name="password_confirmation" required autocomplete="new-password">
                            <span id="eyeIcon2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agreed"
                                    name="agreed">
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
                    <h6 class="text-center">OR</h6>
                    <h2 class="text-center">Connect With</h2>
                    <div class="row mb-3">
                        <div class="col-md-6 ">
                            <a href="{{ route('login.google') }}" class="btn btn-danger btn-block">Login with
                                Google</a>
                        </div><br>
                        <div class="col-md-6 ">

                            <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block">Login with
                                Facebook</a>
                        </div><br>
                    </div>
                    <div class="row  mb-3 ">
                        <div class="col-md-6">
                            <a href="{{ route('login.github') }}" class="btn btn-dark btn-block">Login with
                                Github</a><br>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ route('login.linkedin') }}" class="btn btn-dark btn-block">Login with
                                Linkedin</a>

                        </div>
                    </div>
                </form>

                {{-- <form class="user-auth-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="_token" value="Z5HnvH8zV5jfo8v5Fhvdm7c9593sDSXxNfFeat4s">

                    <h4>Sign Up</h4>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="category" class="form-label">Select Type</label>
                            <select class="form-control cate " name="category" id="category" value=""
                                required="" autocomplete="category">
                                <option selected="" disabled="">Select One</option>
                                <option value="player">Player</option>
                                <option value="scout">Scout</option>
                                <option value="intermediary">Intermediary</option>
                                <option value="coach">Coach</option>
                                <option value="academy">Academy</option>
                                <option value="club">Club</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control " id="firstName" name="firstName" value=""
                                required="" autocomplete="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control " id="lastName" name="lastName" value=""
                                required="" autocomplete="lastName">
                        </div>
                    </div>

                    <div class="row mb-3 guardian_details">
                        <div class="col-md-6">
                            <label for="date_of_birth" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control " id="date_of_birth" name="date_of_birth"
                                value="">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="gender" id="gender-male"
                                    value="male">
                                <label class="form-check-label" for="gender-male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="gender" id="gender-female"
                                    value="female">
                                <label class="form-check-label" for="gender-female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control " id="email" name="email"
                                value="" required="" autocomplete="email">
                        </div>
                        <div class="col-6 guradian_email_address">
                            <label for="gurdian_email" class="form-label">Guardian Email Address</label>
                            <input type="gurdian_emai" class="form-control " id="gurdian_emai" name="gurdian_email"
                                value="" autocomplete="gurdian_email">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6" style="position:relative">
                            <label for="password" class="form-label">Choose a Password</label>
                            <input type="password" class="form-control" id="password" name="password">

                            <span id="eyeIcon1"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></span>
                        </div>
                        <div class="col-md-6" style="position:relative">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                name="password_confirmation">
                            <span id="eyeIcon2"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg></span>


                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="agreed"
                                    name="agreed">
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
                    <h6 class="text-center">OR</h6>
                    <h2 class="text-center">Connect With</h2>
                    <div class="row mb-3">
                        <div class="col-md-6 ">
                            <a href="https://soccer.techrepublica.com/login/google"
                                class="btn btn-danger btn-block">Login with
                                Google</a>
                        </div><br>
                        <div class="col-md-6 ">

                            <a href="https://soccer.techrepublica.com/login/facebook"
                                class="btn btn-primary btn-block">Login with
                                Facebook</a>
                        </div><br>
                    </div>
                    <div class="row  mb-3 ">
                        <div class="col-md-6">
                            <a href="https://soccer.techrepublica.com/login/github"
                                class="btn btn-dark btn-block">Login with
                                Github</a><br>
                        </div>
                        <div class="col-md-6 ">
                            <a href="https://soccer.techrepublica.com/login/linkedin"
                                class="btn btn-dark btn-block">Login with
                                Linkedin</a>

                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='{{ asset(' js/toastr.js') }}'></script>
    <script>
        let password1 = document.getElementById('password');
        let eye1 = document.getElementById('eyeIcon1');
        eye1.onclick = () => {

            if (password1.type === "password") {
                password1.type = "text";
            } else {
                password1.type = "password";
            }
        }

        let password2 = document.getElementById('confirmPassword');
        let eye2 = document.getElementById('eyeIcon2');
        eye2.onclick = () => {

            if (password2.type === "password") {
                password2.type = "text";
            } else {
                password2.type = "password";
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
