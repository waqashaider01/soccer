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
            <h1>TERMS AND CONDITIONS</h1>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <section class="common__information">
                    {!! $term !!}
                </section>
                Last updated:{!! $date !!}
            </div>
        </div>
    </div>
@endsection
