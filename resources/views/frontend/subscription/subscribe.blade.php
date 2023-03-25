@extends('frontend.layouts.app')
@push('styles')
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
@endpush
@section('content')
   <div class="container"style="    display: flex;
    justify-content: center;">
    <div class="shadow-lg d-flex justify-content-center align-items-center  "style="width:40%;border-radius:20px;margin-top:60px;margin-bottom:60px">
        <div class="row">
            <div class="check text-center"style="padding:20px">
                <i class="fa-regular fa-circle-check text-center mb-3" style="color:green;font-size:100px"></i>
                <h1>Thanks for the Subscribing</h1>
            </div>
        </div>
    </div>
   </div>
    @endsection