<footer >
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex">
                        <img src="{{asset('images/logo.png')}}" alt="site-logo" class="logo" />
                        <h2 class="site-title">SoccerWorldLink</h2>
                    </div>
                    <div class="row">
                        <div class="navigation mt-3">
                            <a href="{{ route('faqs') }}">FAQ</a>
                            <a href="{{ route('help') }}">Help</a>
                            <a href="{{ route('press') }}">Press</a>
                            <a href="{{ route('feedback') }}">Feedback</a>
                            <a href="{{ route('blog') }}">Blog</a>
                            <a href="{{ route('pricing') }}">Pricing</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="navigation bordered mt-3">
                            <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
                            <a href="{{ route('terms') }}">Terms and Conditions</a>
                            <a href="{{ route('about-us') }}">About Us</a>
                            <a href="{{ route('contact-us') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="follow-us">
                        <h4>FOLLOW US</h4>
                        <div class="icons">
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="news-letter mt-3">
                        <div class="title">
                            <h4>NEWSLETTER</h4>
                            <p>Get exclusive updates and much more. You may unsubscribe at anytime.</p>
                        </div>
                        <form action="{{ url('subscribe') }}" method="POST" class="mb-3 mb-md-0 soccer-nl">
                            @csrf
                            <div class="input-group">
                                <div class="news-field">
                                    <input class="form-control form-control-sm bg-light emailcurv" placeholder="Email"
                                        name="newsletterEmail" type="email">
                                </div>

                                <!-- input-group-append -->
                                <div class=" news-button clipbutton">
                                    <a href="{{ url('subscribe') }}" style="text-decoration:none"><button class="btn  btn-block" type="submit"><strong>SUBSCRIBE</strong></button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        Copyright 2021 SoccerWorldLink. All rights reserved.
    </div>
</footer>