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
        <h1>Contact Us</h1>
    </div>
</section>
<div class="container-fluid py-3">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <h2 class="pt-3"><b>Get in touch</b></h2>
            <div class="row">
                <div class="col-lg-6 col-md-6 pt-3 pb-5">
                    <form action="{{ route('contact-us-post') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                {{ old('email') }}>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" id="message" name="message"
                                placeholder="Enter message"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary"
                                style="padding:5px 28px; color:white;border-radius:0">SUBMIT</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 pt-3 pb-5 ">
                    <p style="color: gray"> You are welcome to send any question or feedback you may have.Feel free to
                        contact us through
                        this form or send us an email</p>
                    <h3 class="py-2">CONTACT DETAILS</h3>
                    <i class="fa-solid fa-envelope" style="color: #3490dc"></i>
                    <a href="" class="ps-2" style="color: red">support@soccerworldlink.com</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection