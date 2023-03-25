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
            <h1>FREQUENTLY ASKED QUESTIONS</h1>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto py-5">

                @if (count($faqs) > 0)
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faqDrop_{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="faqDrop_{{ $faq->id }}">
                                    {{ $faq->Question }}
                                </button>
                            </h2>
                            <div id="faqDrop_{{ $faq->id }}" class="accordion-collapse collapse"
                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body"
                                    style="background-color: #f5f5f5 !important; font-size:16px !important;">
                                    {{ $faq->Answer }} </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No FAQs here!</h2>
                    </div>
                @endif
      @endsection
    
