<div class="top-nav">
    <div class="container">
        <a href=""><i class="fab fa-facebook-f"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-linkedin-in"></i></a>
    </div>
</div>







<nav class="navbar navbar-expand-lg sticky-nav bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{ asset('images/logo.png') }}" alt="site-logo" />
            SoccerWorldLink
        </a>


 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-white border-1 border-white" style="font-size:25px"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('players') ? 'active' : '' }}" href="/players">players</a>
                </li>
                <li class="nav-item">
                    <a href="/agents" class="nav-link {{ Request::is('agents') ? 'active' : '' }}">Agents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('market') ? 'active' : '' }}" href="/market">Market</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('pricing') ? 'active' : '' }}" href="/pricing">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
                </li>
                 <!-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('favorite') ? 'active' : '' }}" href="/favorite">Favorites</a>
                </li> -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">LogIn</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="/register">Sign Up</a>
                        </li>
                    @endif
                @else
                 <li class="nav-item">
                    <a class="nav-link {{ Request::is('favorite') ? 'active' : '' }}" href="/favorite">Favorites</a>
                
</li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                            <i class="align-middle" data-feather="settings"></i>
                        </a>

                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/profile.jpg') }}" alt="" class="profile-img">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="{{ route( Auth::user()->type . '.dashboard') }}">
                                <i class="align-middle me-1"
                                    data-feather="user"></i> Profile</a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ asset('images/profile.jpg') }}" alt="" class="profile-img">
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">
                                {{ Auth::user()->name }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
                @endguest
                {{-- <li class="nav-item">
                    <img src="{{ asset('images/profile.jpg') }}" alt="" class="profile-img">
                </li> --}}

                @include('language')
            </ul>
        </div>
    </div>
</nav>

<script>
    var sticky = document.querySelector('.sticky-nav');

    if (sticky.style.position !== 'sticky-nav') {
        var stickyTop = sticky.offsetTop;

        document.addEventListener('scroll', function() {
            window.scrollY >= stickyTop ?
                sticky.classList.add('fixed-nav') :
                sticky.classList.remove('fixed-nav');
        });
    }
</script>
