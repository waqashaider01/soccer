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
    <section>

        <div class="row w-100 mb-5">
            <div class="container d-flex flex-column flex-md-row">
                <div class="col-md-8  mt-5 pr-md-5">
                    <h2> {{ $blog->title }}</h2>
                    <i class="fa-solid fa-share-nodes"></i>
                    <span class="ms-2" style="font-size:17px">
                        <span class="share-number"></span><span class="border border-5 rounded rounded-3"
                        >{{ $shareCount->share }}</span></span> SHARES
                    </span>

                    <i class="fa-regular fa-clock ms-5"></i><span class="ms-2"
                        style="font-size:17px">{{ $blog->created_at->diffForHumans() }}</span>
                    <div class="row mt-4">
                        <div class="col-9"style="font-size:17px">
                            <p class="text-uppercase">{{ $blog->user->name }}</p>
                            <p class="text-uppercase line_hight">{{ $blog->created_at->format('F d, Y') }}</p>
                        </div>
                        <div class="col-3"style="font-size:15px">
                            <span class="share-number"></span>
                            <span> SHARES</span>
                            <a href="{{ route('SharePost', ['id' => $blog->id, 'slug' => 'facebook']) }}"
                                class="share-count">
                                <i class="fa-brands fa-facebook ms-2 border_left"></i>
                            </a>
                            <a href="{{ route('SharePost', ['id' => $blog->id, 'slug' => 'twitter']) }}"
                                class="share-count">
                                <i class="fa-brands fa-twitter ms-2 border_left"></i>
                            </a>
                            <a href="{{ route('SharePost', ['id' => $blog->id, 'slug' => 'pinterest']) }}"
                                class="share-count">
                                <i class="fa-brands fa-pinterest text-danger ms-2 border_left"></i>
                            </a>


                            {{-- <i class="fa-brands fa-twitter ms-2 border_left"></i> --}}
                        </div>
                    </div>
                    <div class="blog_img_container">
                        <img src="{{ asset('images/blog/' . $blog->image) }}" alt="">
                    </div>
                    <div class="row mt-3">
                        <div class="col-1 d-flex flex-column align-items-center" style="font-size:17px">
                            <p class=" line_hight" class="share-number">

                            </p>
                            <p class="line_hight">SHARES</p>
                            <a href="{{ route('SharePost', ['id' => $blog->id, 'slug' => 'facebook']) }}">
                                <i class="fa-brands fa-facebook mt-2"></i>
                            </a>
                            <a href="{{ route('SharePost', ['id' => $blog->id, 'slug' => 'pinterest']) }}">
                                <i class="fa-brands fa-pinterest text-danger mt-2"></i>
                            </a>

                            <a href="{{ route('SharePost', ['id' => $blog->id, 'slug' => 'twitter']) }}">
                                <i class="fa-brands fa-twitter mt-2 "></i>
                            </a>

                        </div>
                        <div class="col-11" style="font-size:17px">
                            <p> {!! $blog->description !!}</p>

                        </div>
                        <div class="d-flex">
                            <div>
                                <a class="btn btn-primary me-2" style="background-color: #3b5998;" href="#!"
                                    role="button"><i class="fab fa-facebook me-2"></i>Facebook</a>
                            </div>
                            <div>
                                <a class="btn btn-primary me-2" style="background-color: #55acee;" href="#!"
                                    role="button"><i class="fab fa-twitter me-2"></i>Twitter</a>
                            </div>
                            <div>
                                <a class="btn btn-danger me-2" style="background-color: #c61118;" href="#!"
                                    role="button"><i class="fab fa-pinterest me-2"></i>Pinterest</a>
                            </div>
                            <div>
                                <a class="btn btn-primary " style="background-color: #0082ca;" href="#!"
                                    role="button"><i class="fab fa-linkedin-in me-2"></i>linkedin</a>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-md-4">
                    <h2 class="text-uppercase fw-bold pt-5 color-blue">Newsletter</h1>
                        <p class="color-blue">keep up with over latest news and events.Subscibe to our newsletter.</p>
                        <form action="/action_page.php">
                            <!-- <label for="email">Enter your email:</label> -->
                            <input class="custom_input" type="email" id="email" name="email"
                                placeholder="waqashayder01@gmail.com">
                            <input class="c_btn" type="submit">
                        </form>
                        <h4 class="mt-4 border_bottom">Related Post</h4>
                        <div class="row mt-3 border_bottom">
                            <div class="col-3">
                                <div class="blog_img_container">
                                    <a href="">
                                        <img src="{{ asset('images/blog/blog1.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 blog_link">
                                <h5><a class="" href=""> How to Make a WordPress Website: Step-by-Step Guide
                                        for
                                        beginers and Improve
                                        your
                                        programing skills.</a></h5>
                            </div>
                        </div>
                        <div class="row mt-3 border_bottom">
                            <div class="col-3">
                                <div class="blog_img_container">
                                    <a href="">
                                        <img src="{{ asset('images/blog/blog2.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 blog_link">
                                <h5><a class="" href=""> How to Make a WordPress Website: Step-by-Step Guide
                                        for
                                        beginers and Improve
                                        your
                                        programing skills.</a></h5>
                            </div>
                        </div>
                        <div class="row mt-3 border_bottom">
                            <div class="col-3">
                                <div class="blog_img_container">
                                    <a href="">
                                        <img src="{{ asset('images/blog/blog3.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 blog_link">
                                <h5><a class="" href=""> How to Make a WordPress Website: Step-by-Step Guide
                                        for
                                        beginers and Improve
                                        your
                                        programing skills.</a></h5>
                            </div>
                        </div>
                        <div class="row mt-3 border_bottom">
                            <div class="col-3">
                                <div class="blog_img_container">
                                    <a href="">
                                        <img src="{{ asset('images/blog/blog1.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 blog_link">
                                <h5><a class="" href=""> How to Make a WordPress Website: Step-by-Step Guide
                                        for
                                        beginers and Improve
                                        your
                                        programing skills.</a></h5>
                            </div>
                        </div>
                        <div class="row mt-3 border_bottom">
                            <div class="col-3">
                                <div class="blog_img_container">
                                    <a href="">
                                        <img src="{{ asset('images/blog/blog2.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 blog_link">
                                <h5><a class="" href=""> How to Make a WordPress Website: Step-by-Step Guide
                                        for
                                        beginers and Improve your programing skills.</a></h5>
                            </div>
                        </div>
                        <div class="row mt-3 border_bottom">
                            <div class="col-3">
                                <div class="blog_img_container">
                                    <a href="">
                                        <img src="{{ asset('images/blog/blog3.jpg') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-8 blog_link">
                                <h5><a class="" href=""> How to Make a WordPress Website: Step-by-Step Guide
                                        for
                                        beginers and Improve your programing skills.</a></h5>
                            </div>
                        </div>


                </div>
            </div>
        </div>


    </section>
@endsection
