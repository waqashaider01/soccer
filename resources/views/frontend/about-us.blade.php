@extends('frontend.layouts.app')
@push('styles')
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
@endpush
@section('content')
<style>
    .text{
        text-align:center!important
    }
</style>
<div class="container-fluid py-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="row ">
                <div class="text-center " style="font-size: 22px !important;">
                    {!!$preee1!!}
                </div>
                {{-- <p class="pt-4 text-center fs-4"style="font-size: 22px"> <strong> "Our goal, therefore, is to provide that opportunity by
                        serving as a global link between Players, Scouts,
                        Intermediaries, Coaches, Academies and Clubs."</strong></p> --}}
                <div class="col py-5 "style="font-size: 15px">
                    {!!$preee2!!}
                    {{-- <p class="About__para pt-5"style="font-size: 22px">Soccer World Link is a platform that enables players, agents,
                        coaches, academies, and clubs and other soccer professionals to connect and manage their
                        recruitment process more efficiently.</p>
                    <p class="About__para"style="font-size: 22px">We are committed to providing a pathway to success in the game at youth, men
                        and women levels.
                        Many talented players have gone unnoticed due to a lack of opportunity to connect to the right
                        people who
                        might have
                        helped further their careers.
                    </p>
                    <p class="About__para"style="font-size: 22px">
                        Our goal, therefore, is to provide that opportunity by serving as a global link between Players,
                        Scouts,
                        Intermediaries, Coaches, Academies and Clubs.
                    </p> --}}
                </div>
                <div class="col py-5 "style="font-size: 15px">
                    {!!$preee3!!}
                    {{-- <p class="text-center mb-0"style="text-align:center!important"> <strong class="fs-4">Our Mission</strong></p>

                    <p class="About__para"style="font-size: 22px">To provide a simple, transparent, and effective service focused on connecting
                        soccer players, agents, and
                        other
                        professionals worldwide.</p>
                    <p class="text-center text mb-0"style="text-align:center!important"> <strong class="fs-4">Our Vision</strong></p>
                    <p class="About__para">To provide a simple, transparent, and effective service focused on connecting
                        soccer players, agents, and
                        other
                        professionals worldwide.</p>
                    <p class="text-center mb-0"style="text-align:center"><strong class="fs-4">Our values</strong></p>
                    <section class="About__list_items">
                        <p class="About__para">To provide a simple, transparent, and effective service focused on connecting
                        soccer players, agents, and
                        other
                        professionals worldwide.</p>
                    </section> --}}
                </div>
            </div>

        </div>
        <div>
            <img src="\images\ground.PNG" class=" img-fluid" alt=""style="width:100%">
        </div>
    </div>
</div>

@endsection