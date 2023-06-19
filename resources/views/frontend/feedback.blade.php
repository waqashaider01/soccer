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
            <div class="text-center  mb-2" style="border-bottom:1px solid black; font-size:24px">
                <h1>FEED BACK</h1>
                <p>Please leave a comment/suggestion to help us serve you better.</p>
            </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto py-5">
                   {{-- form  --}}
            <div class="mb-3">
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
            </div>
            <div class="mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" placeholder="Message"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary" style="padding:5px 28px; color:white;border-radius:0">SUBMIT</button>
            </div>
            </div>
         </div>
    </div>
</div>
</div>
@endsection
