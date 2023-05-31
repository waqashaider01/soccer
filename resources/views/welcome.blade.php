@extends("frontend.layouts.app")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    
    <style>
        .modal-dialog {
            max-width: 800px;
            margin: 30px auto;
        }

        .modal-body {
            position:relative;
            padding:0px;
        }
        .close {
            position:absolute;
            right:-30px;
            top:0;
            z-index:999;
            font-size:2rem;
            font-weight: normal;
            color:#fff;
            opacity:1;
        }
        .modal-header .btn-close {
                font-size: large;
    border: 1px solid white;
    background-color: white;
        }
        .js-cookie-consent{
  position: absolute;
  top: 0px;
  padding: 10px;
  text-align: center;
  width: 100%;
  z-index: 9999;
  background-color: #fffbdb;
  border-color: #fffacc;
  border: solid 1px;
}
    </style>

@endpush
@section('content')
@include('cookie-consent::index')
    <div id="fullpage">
        <section class="container-fluid hero section">
            <div class="background">
                <img src="{{ asset('images/home-hero.jpg') }}" alt="Home Background">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content">
                        <h1>Welcome to the World's</h1>
                        <p>top soccer network for:</p>
                        <ul>
                            <li><i class="fas fa-check"></i> Players</li>
                            <li><i class="fas fa-check"></i> Scouts</li>
                            <li><i class="fas fa-check"></i> Intermediaries</li>
                            <li><i class="fas fa-check"></i> Coaches</li>
                            <li><i class="fas fa-check"></i> Academies</li>
                            <li><i class="fas fa-check"></i> Clubs</li>
                        </ul>
                        <p>
                            Wherever you are, <br>
                            Take advantage of global <br>
                            Soccer connectivity at it's best
                        </p>
                        <div class="mt-5">
                             <a href="{{ route('register') }}" class="btn get-started-btn">Get Started</a>
                            <button type="button" class="btn watch-video-btn video-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                                <i class="fas fa-play-circle"></i> Watch Video
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/imac.png') }}" alt="imac" class="imac">
                    </div>
                </div>
            </div>
        </section>
        <section class="container-fluid categories section">
            <div class="container">
                <div class="main-heading">
                    <h2>Categories</h2>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="category">
                            <img src="{{ asset('images/categories/players.jpg') }}" alt="players">
                            <div class="body">
                                <div class="content">
                                    <h4>Players</h4>
                                    <ul>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Showcase your talent and realize your dream</div>
                                        </li>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Send direct messages to agents, clubs and apply to
                                                Market posts</div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="signup-container">
                                     <a href="{{ route('register') }}" class="signup-btn"><button>Sign Up</button></a>
                                    <p>30 days free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- category-end --}}
                    <div class="col-md-6 col-lg-4 mt-4 mt-md-0">
                        <div class="category">
                            <img src="{{ asset('images/categories/scouts.jpg') }}" alt="players">
                            <div class="body">
                                <div class="content">
                                    <h4>Scouts</h4>
                                    <ul>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Access to quality players for your recruitment needs
                                            </div>
                                        </li>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Be a part of our global scouting network</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="signup-container">
                                     <a href="{{ route('register') }}" class="signup-btn"><button>Sign Up</button></a>
                                    <p>30 days free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>{{-- category-end --}}
                    <div class="col-md-6 col-lg-4  mt-4 mt-lg-0">
                        <div class="category">
                            <img src="{{ asset('images/categories/intermediaries.jpg') }}" alt="players">
                            <div class="body">
                                <div class="content">
                                    <h4>Intermediaries</h4>
                                    <ul>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Select from a host of talented players to represent
                                            </div>
                                        </li>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Connect with clubs and other Agents around the world
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="signup-container">
                                     <a href="{{ route('register') }}" class="signup-btn"><button>Sign Up</button></a>
                                    <p>30 days free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>{{-- category-end --}}


                    <div class="col-md-6 col-lg-4 mt-4">
                        <div class="category">
                            <img src="{{ asset('images/categories/coach.png') }}" alt="coaches">
                            <div class="body">
                                <div class="content">
                                    <h4>Coaches</h4>
                                    <ul>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Select players for your team</div>
                                        </li>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Connect with clubs and other coaches around the
                                                world</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="signup-container">
                                     <a href="{{ route('register') }}" class="signup-btn"><button>Sign Up</button></a>
                                    <p>30 days free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>{{-- category-end --}}
                    <div class="col-md-6 col-lg-4 mt-4">
                        <div class="category">
                            <img src="{{ asset('images/categories/academies.jpg') }}" alt="academies">
                            <div class="body">
                                <div class="content">
                                    <h4>Academies</h4>
                                    <ul>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Free membership and posting of ads</div>
                                        </li>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Promote your players by making them visible</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="signup-container">
                                     <a href="{{ route('register') }}" class="signup-btn"><button>Sign Up</button></a>
                                    <p>30 days free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- category-end --}}
                    <div class="col-md-6 col-lg-4 mt-4">
                        <div class="category">
                            <img src="{{ asset('images/categories/clubs.jpg') }}" alt="players">
                            <div class="body">
                                <div class="content">
                                    <h4>Clubs</h4>
                                    <ul>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Free membership and direct contact with Players,
                                                Scouts and Agents.</div>
                                        </li>
                                        <li>
                                            <div class="check"><i class="fas fa-check"></i></div>
                                            <div class="text">Look through a pool of talented players to add to
                                                your team</div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="signup-container">
                
                                     <a href="{{ route('register') }}" class="signup-btn"><button>Sign Up</button></a>
                                
                                    <p>30 days free trial</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- category-end --}}
                </div>
            </div>
        </section>
        {{-- Categories-section end --}}
        <section class="container-fluid how-it-works  section">
            <div class="main-heading">
                <h2>How It Works</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="sec">
                            <div class="img">
                                <img src="{{ asset('images/how-it-works/cv.jpg') }}" alt="">
                            </div>
                            <div class="body">
                                <h5>Create your free comprehensive profile</h5>
                                <p>Showcase yourself with data, photos, videos and more.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4 mt-lg-0">
                        <div class="sec">
                            <div class="img1" style="width">
                                <img src="{{ asset('images/how-it-works/network.png') }}" alt="" class="p1" style="width:322px;">
                            </div>
                            <div class="body">
                                <h5>Build your network</h5>
                                <p>Connect with other professionals like Players, Scouts, Intermediaries, Coaches, Academies
                                    and Clubs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mt-4 mt-md-0">
                        <div class="sec">
                            <div class="img">
                                <img src="{{ asset('images/how-it-works/opp.jpg') }}" alt="">
                            </div>
                            <div class="body">
                                <h5>Discover opportunities</h5>
                                <p>
                                    Take advantage of your opportunities and sign a contract or partnership deal.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- how-it-works end --}}
        <div class=" ">
        <div class="main-heading">
            <h2>Why SoccerWorldLink?</h2>
        </div>
        <section class="simplicity section">
            <div class="container">
                <div class="row">
                    <!-- offset-1 -->
                    <div class="col-md-6 ">
                        <div class="content">
                            <h1>Simplicity</h1>
                            <p>
                                With its intuitive design, our website is easy to navigate
                                and provides simple ways to showcase yourself and help achieve your goals.
                            </p>
                            <button type="button" class="btn watch-video-btn video-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                                <i class="fas fa-play-circle"></i> Watch the Video
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <img src="{{ asset('images/categories/clubs.jpg') }}" alt="players">
                    </div>
                </div>
            </div>
        </section>{{-- why-swl end --}}
        <section class="convinience section my-5">
            <div class="container">
                <div class="row flex-column-reverse  flex-md-row">
                    <div class="col-md-6  mt-3 mt-md-0">
                        <img src="{{ asset('images/categories/clubs.jpg') }}" alt="players">
                    </div>
                    <div class="col-md-6 ">
                        <div class="content">
                            <h1>Convenience</h1>
                            <p>
                                One convenient central location for all your recruiting needs.
                                Data, images, video highlights, interviews, contact information,
                                favorites list, professional messaging system and much more are
                                conveniently available in one place.
                            </p>
                            <button type="button" class="btn watch-video-btn video-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                                <i class="fas fa-play-circle"></i> Watch Video
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>{{-- convinience end --}}
        <section class="savings section my-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="content">
                            <h1>Big Savings</h1>
                            <b>Save Time and Money </b>
                            <p>
                                Quickly find great talents and agents from all over the world and communicate with them
                                directly. <br>
                                Do your recruiting from anywhere and anytime, even with a limited budget, time and
                                resources.
                            </p>
                            <button type="button" class="btn watch-video-btn video-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                                <i class="fas fa-play-circle"></i> Watch Video
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <img src="{{ asset('images/categories/clubs.jpg') }}" alt="players">
                    </div>
                </div>
            </div>
        </section>{{-- savings end --}}

        <section class="join-us section mt-1" >
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Some call it soccer, others call it football.
                            Whatever you call it, it remains the world's beautiful game.
                            <a href="{{url('register')}}">Join Us</a> today and enjoy soccer networking
                            at it's best.
                        </p>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </section>

        </div>
        {{-- <section class="join-us section mt-5">
        <div class="box box1">
            <img src="{{asset('images/categories/players.jpg')}}" alt="">
            <h2>
                Some call it soccer, others call it football.
                Whatever you call it, it reamains the world's beautiful game.
                <a href="">Join Us</a> today and enjoy soccer networking 
                at it's best.  
            </h2>
        </div>
        <div class="box box2">
            <img src="{{asset('images/categories/clubs.jpg')}}" alt="">
        </div>
        
    </section> --}}

    </div>

<!---modal on first time----->
<div class="modal" id="main-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 83%;">
    <div class="modal-content"style="height:20vh ;background:transparent;">
      <div class="modal-header" style="background:transparent:border:none;">
      
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
      </div>
       
      <div class="modal-body d-flex" style="background-color:#0075e8;color:white;padding-left:20px;padding-right:20px;border-radius:20px;" >
        
        <p class="me-auto p-2" style="font-size:22px">Welcome! First time here? Get a 20% discount on your First Subscription.<br>This is a limited time offer.  </p>
            <button type="button" class="" style="background:white;border:transparent;padding-left:20px;padding-right:20px;padding:10px;font-size:15px;border-radius:5px"> Get The Coupon Now</button>
    </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background:transparent">
                <div class="modal-body"style="background:transparent">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style=" font-size:52px;">&times;</span>
                    </button>
                    
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
                var $videoSrc;  
                $('.video-btn').click(function() {
                    $videoSrc = $(this).data( "src" );
                 });
                
                console.log($videoSrc);
    
                $('#exampleModal').on('shown.bs.modal', function (e) {
                    $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" ); 
                });
    
                $('#exampleModal').on('hide.bs.modal', function (e) {
                    $("#video").attr('src',$videoSrc); 
                });

                $('.close').click(function(){
                    $('#exampleModal').modal('hide');
                });
            });

    </script>

    <script>
        $(document).ready(function() {
            $(window).on('load', function(){        
               $('#main-modal').modal('show');
                  }); 
        });

        
    </script>

@endsection
