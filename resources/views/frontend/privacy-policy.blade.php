@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
@endpush
@section('content')
    <section class="blog-hero">
        <div class="heading">
            <h1>Privacy Policy</h1>
        </div>

    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <section class="common__information">



                
                    
                
                    <p class="cus">
                        {{-- {!!$privacy!!} --}}
                    </p>
                    {{-- {!! nl2br($privacy) !!} --}}
                    {{-- <div class="card-body"> --}}
                    {!! htmlspecialchars_decode($preee) !!}
                    {{-- </div> --}}

                    Last updated:{!! htmlspecialchars_decode($date) !!}.
                    </p>


                </section>

            </div>
        </div>
    </div>
@endsection
