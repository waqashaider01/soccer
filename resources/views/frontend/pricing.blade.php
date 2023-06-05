@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
@endpush
@section('content')
    <section class="pricing-section">
        <section class="pricing-hero">
        </section>
        <div class="heading">
            <h1>Pricing</h1>
            <p>Enjoy great features with simple and affordable pricing</p>
            <span>Start your free trial today</span>
        </div>
    </section>
    <div class="container-md pricing mt-3 ">
        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
            <li class="nav-item nav-item1   mt-3 mt-sm-0" role="presentation" id="p1">
                <button class="nav-link active" id="pills-players-tab" data-bs-toggle="pill" data-bs-target="#pills-players"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Players
                </button>
            </li>
            <li class="nav-item nav-item2  mt-3 mt-sm-0" role="presentation" id="p2">
                <button class="nav-link " id="pills-players-tab" data-bs-toggle="pill" data-bs-target="#pills-players"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Scouts
                </button>
            </li>
            <li class="nav-item nav-item3  mt-3 mt-sm-0" role="presentation" id="p3">
                <button class="nav-link" id="pills-players-tab" data-bs-toggle="pill" data-bs-target="#pills-players"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Intermediaries
                </button>
            </li>
            <li class="nav-item nav-item4 mt-3 mt-sm-0" role="presentation" id="p4">
                <button class="nav-link " id="pills-players-tab" data-bs-toggle="pill" data-bs-target="#pills-players"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Coaches
                </button>
            </li>
            <li class="nav-item nav-item5 mt-3 mt-sm-0" role="presentation" id="p5">
                <button class="nav-link " id="pills-players-tab" data-bs-toggle="pill" data-bs-target="#pills-players"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Academies and Clubs
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-players" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row justify-content-center" style=>
                    <div class="col-md-6" id="fu" style="dis">
                        <div class="free-trial-card " id="fcard">
                            <h4>FREE TRIAL VERSION</h4>
                            <h4>(30 Days Free Trial)</h4>
                            <p>Try Several Features</p>
                            <h1>FREE</h1>
                            @if (Auth::check())
                              <a href="{{ route('subscription.create') }}" class="signup-btn"><button>Select</button></a>
                            @else
                                <a href="{{ url('/register')}}" class="signup-btn"><button>Sign Up</button></a>
                           @endif
                        </div>
                    </div>
                    <div class="col-md-6" id="p_card">
                        <div class="premium-card">
                            {{-- <button>click</button> --}}
                            <div class="ribbon">
                                <img src="{{ asset('images/pricing/big-savings.png') }}" alt="big savings">
                            </div>
                            @if (count($pricing) > 0)
                                <h4>PREMIUM PLAN</h4>
                                <h1>US 25$/Month</h1>
                                <p><b>or</b></p>

                                <p><b>$10/month when billed annually</b></p>
                                <div class="row no-gutters">
                                    @foreach ($pricing as $pricing)
                                        <div class="col-md-6 col-lg-3 mt-3 my-lg-3">
                                            <div class="plan">
                                                <div class="content" style="margin-bottom:13px;">
                                                    <p>{{ $pricing->duration }} month Subscription</p>
                                                    <h4>{{ $pricing->price }}$</h4>
                                                    <b>One Payment of
                                                        ${{ $pricing->price * $pricing->duration }}</b>
                                                </div>
                                                <div class="signup-container">
                                                    @if (Auth::check())
                                                        <a href="{{ url('subscription/create/'.$pricing->price.'/'.$pricing->duration) }}"
                                                            class="signup-btn"><button>Select</button></a>
                                                    @else
                                                        <a href="{{ url('/register') }}"
                                                            class="signup-btn"><button>Sign
                                                                Up</button></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h2>No Pricings set!</h2>
                            @endif

                        </div>
                    </div>{{-- premium-card end --}}
                </div>
            </div>
            <div class="row d-flex justify-content-between mt-3 mt-md-4">
                <div class="col-md-5"  id="fh1"> 
                    <h5 class="features-heading ps-5 ps-sm-0 text-left text-sm-center">Features</h5>
                    <div class="pricingTable">
                        <ul class="pricing-content">
                            <li>&nbsp;Comprehensive Online Profile</li>
                            <li>&nbsp;Access to Players listings</li>
                            <li>&nbsp;Access to Agents listings</li>
                            <li>&nbsp;Access to Market listings</li>
                            @foreach ($feature as $features)
                                <li>&nbsp;{{ $features->market_post_pre_month }} market post application/month</li>
                                <li>&nbsp;{{ $features->messages_pre_month }} free messages/month</li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-md-5" id="fh2">
                    <h5 class="features-heading ps-5 ps-sm-0 text-left text-sm-center" id="fhh">Features</h5>
                    <div class="pricingTable">
                        <ul class="pricing-content">
                            <li>&nbsp;Comprehensive Online Profile</li>
                            <li>&nbsp;Access to Players listings</li>
                            <li>&nbsp;Access to Agents listings</li>
                            <li>&nbsp;Access to Market listings</li>
                            <li>&nbsp;Unlimited market applications</li>
                            <li>&nbsp;Unlimited messages</li>
                            <li>&nbsp;Unlimited market posts</li>
                            <li>&nbsp;Favorites List </li>
                            <!-- <i class="fa fa-heart" style="font-size:20px;color:red"></i> -->
                            <li>&nbsp;See who viewed your profile</li>
                            <li>&nbsp;Reward points</li>
                            <li>&nbsp;Targeted email promotion</li>
                            <li>&nbsp;Prioritized customer support</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="payments">
                        <img class="paypal-logo" src="{{ asset('images/payments/paypal.png') }}" alt="">
                        <img class="visa-logo" src="{{ asset('images/payments/visa.png') }}" alt="">
                        <img class="mastercard-logo" src="{{ asset('images/payments/mastercard.png') }}" alt="">
                        <img class="jcb-logo" src="{{ asset('images/payments/jcb.png') }}" alt="">
                        <img class="discover-logo" src="{{ asset('images/payments/discover.png') }}" alt="">
                        <p class="pt-2 pt-sm-0">We accept PayPal and all major credit cards.</p>
                        <p><i class="fas fa-lock"></i><a href="">SSL Encrypted Payment</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-scouts" role="tabpanel" aria-labelledby="pills-profile-tab">Scouts</div>
        <div class="tab-pane fade" id="pills-intermediaries" role="tabpanel" aria-labelledby="pills-contact-tab">
            Intermediaries</div>
        <div class="tab-pane fade" id="pills-coaches" role="tabpanel" aria-labelledby="pills-profile-tab">Coaches</div>
        <div class="tab-pane fade" id="pills-academiesAndClubs" role="tabpanel" aria-labelledby="pills-contact-tab">
            Academies</div>
    </div>
    </div>
    <script>
        console.log("script");
        let btn = document.getElementById('p5');
        console.log(btn);
        let card = document.getElementById('p_card');
        console.log(card);
        let fcard = document.getElementById('fcard')
        let fu = document.getElementById('fu')
        let fh1 = document.getElementById('fh1');
        let fh2 = document.getElementById('fh2');
        let fhh = document.getElementById('fhh');
        let btn2 = document.getElementById('p4');
        let btn3 = document.getElementById('p3');
        let btn4 = document.getElementById('p2');
        let btn5 = document.getElementById('p1');
        //  card.style.display='none';

        btn.onclick = () => {
            console.log("card");
            card.style.display = 'none';
            fu.classList.remove('col-md-6');
            fu.classList.add('col-md-5');
            console.log(fcard);
            fh1.classList.add('col-md-6');
            fh1.classList.remove('col-md-6');
            fh2.classList.add('col-md-6');
            fh2.classList.remove('col-md-6');
            fhh.style.display = 'none';
            console.log('this is fhh');
            console.log(fhh);
            fh1.classList.add('text-center');
            fh2.classList.add('text-center');
            fcard.classList.add('text-center');
            fcard.style.textAlign = "center";

        }
        btn2.onclick = () => {
            console.log("card2");
            card.style.display = 'block';
            fu.classList.remove('col-md-12');
            fu.classList.add('col-md-6');
            fh1.classList.add('col-md-6');
            fh1.classList.remove('col-md-12');
            fh2.classList.add('col-md-6');
            fh2.classList.remove('col-md-12');
            fhh.style.display = 'block';
            fh1.classList.remove('text-center');
            fh2.classList.remove('text-center');


        }

        btn3.onclick = () => {
            console.log("card2");
            card.style.display = 'block';
            fu.classList.remove('col-md-12');
            fu.classList.add('col-md-6');
            fh1.classList.add('col-md-6');

            fh1.classList.remove('col-md-12');
            fh2.classList.add('col-md-6');
            fh2.classList.remove('col-md-12');
            fhh.style.display = 'block';
            fh1.classList.remove('text-center');
            fh2.classList.remove('text-center');
        }
        btn4.onclick = () => {
            console.log("card2");
            card.style.display = 'block';
            fu.classList.remove('col-md-12');
            fu.classList.add('col-md-6');
            fh1.classList.add('col-md-6');
            fh1.classList.remove('col-md-12');
            fh2.classList.add('col-md-6');
            fh2.classList.remove('col-md-12');
            fhh.style.display = 'block';
            fh1.classList.remove('text-center');
            fh2.classList.remove('text-center');
        }
        btn5.onclick = () => {
            console.log("card5");
            card.style.display = 'block';
            fu.classList.remove('col-md-12');
            fu.classList.add('col-md-6');
            fh1.classList.add('col-md-6');
            fh1.classList.remove('col-md-12');
            fh2.classList.add('col-md-6');
            fh2.classList.remove('col-md-12');
            fhh.style.display = 'block';
            fh1.classList.remove('text-center');
            fh2.classList.remove('text-center');
        }
        // btn.addEventListener('click',disp())
        // // btn.addEventListner('click',disp);
        // btn2.addEventListener('click',disp2())

        // function disp(){
        //     console.log("click");
        //       card.style.display='none';


        // }
        // function disp2(){
        //     console.log("click disp2");
        //       card.style.display='block';


        // }
        // console.log(disp);
    </script>
    <!--container end-->
@endsection
