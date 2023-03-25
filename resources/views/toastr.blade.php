@extends('frontend.layouts.app')
@section('content')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">

    <div class="d-flex align-items-center justify-content-center" style="height:80vh">
        <div class="container">
            <div>
                <h3 class="text-center"
                    style="color: #3d933d;letter-spacing: 1px;word-spacing: 6px;font-weight:300;font-family:poppin;">
                    Welcome to
                    Soccer
                    WorldLink!</h3>

                <div class="d-flex align-items-center justify-content-center">
                    <div class="shadow mt-3 p-4  " style="width:70%;">
                        <h5 class="text-muted lh-lg" style="font-weight:300;font-family:poppin">You have successfully
                            created
                            your account. Please check your email to activate this account. If it is not in your inbox,
                            check
                            your junk and spam emails folder. Thank you.</h5>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src='{{ asset(' js/toastr.js') }}'></script>

    @if (Session::get('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
    @elseif (Session::get('error'))
        <script>
            toastr.error("{!! Session::get('error') !!}");
        </script>
    @endif
@endsection
