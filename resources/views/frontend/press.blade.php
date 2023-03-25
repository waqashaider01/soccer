@extends('frontend.layouts.app')
@push('styles')
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-10 py-5 mx-auto">
            <div class="text-center mb-2" style="border-bottom:1px solid red">
                <h1>PRESS</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 mx-auto py-5 text-center">
                    <p class="mb-5" style="font-size:25px">We would like to assist in the best possible way with interviews, news stories and<br>
                        reviews. For Media Enquiry, please <a href="{{ route('contact-us') }}"><span
                                style="color: red">Contacts us</span></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
