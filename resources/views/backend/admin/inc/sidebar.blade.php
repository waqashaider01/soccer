<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <div class="text-center">
            <span class="align-middle">SoccerWorldLink</span>
            </div>
        </a>

        <div class="row">
            <div class="col-12">
                <div class="profile-img d-flex flex-column align-items-center">
                    <img src="{{ asset('images/profile.jpg') }}" class="avatar me-1" alt="Charles Hall"/>
                    {{-- <img src="{{ asset('assets/messages'$views->profile_img)  " /> --}}
                    <h4 class="name w_color mt-3">{{ Auth::user()->name }} ({{ Auth::user()->type }})</h4>
                    {{-- <p><a href="{{ route('verify-account', ['id' => Auth::user()->id]) }}">Verify Your Account</a></p> --}}
                </div>
            </div>
        </div>

        <ul class="sidebar-nav mt-3">
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-house"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- <li class="sidebar-item {{ Request::is(Auth::user()->type . '/profile') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="far fa-id-badge"></i> <span class="align-middle">Profile</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/all-blogs') ? 'active' : '' }}">
                <a class="sidebar-link" href="/messages">
                    <i class="fa-solid fa-comment"></i>
                    <span class="align-middle">Messages</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/all-blogs') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('all-blogs', Auth::user()->type) }}">
                    <i class="fa-brands fa-blogger"></i>
                    <span class="align-middle">Blogs</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/privacy') ? 'active' : '' }}">
                <a class="sidebar-link" href='privacy'>
                    <i class="fa-solid fa-lock"></i>
                    <span class="align-middle">Edit Privacy</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/conditions') ? 'active' : '' }}">
                <a class="sidebar-link" href="conditions">
                    <i class="fa-solid fa-file-lines"></i>
                    <span class="align-middle">Edit Terms</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/aboutus') ? 'active' : '' }}">
                <a class="sidebar-link" href="aboutus">
                    <i class="fa-solid fa-user-pen"></i>
                    <span class="align-middle">Edit About</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/reports') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.reports') }}">
                    <i class="fa-solid fa-list-check"></i>
                    <span class="align-middle">Reports</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/reports') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.verifications') }}">
                    <i class="fa-solid fa-square-check"></i>
                    <span class="align-middle">Verifications</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/reports') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.verifications') }}">
                    <i class="fa-solid fa-user-check"></i>
                    <span class="align-middle">Verifications</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/reports') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.underage') }}">
                    <i class="fa-solid fa-circle-check"></i>
                    <span class="align-middle">Age Verification</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/showfaqs') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.showfaqs') }}">
                    <i class="fa-solid fa-circle-question"></i>
                    <span class="align-middle">FAQs</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/showpricing') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.showpricing') }}">
                    <i class="fa-solid fa-money-check-dollar"></i>
                    <span class="align-middle">Pricing</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/feature') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.feature') }}">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span class="align-middle">Features</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/settings') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{url('admin/adminsetting')}}">
                    <i class="fa-solid fa-gear"></i>
                    <span class="align-middle">Settings</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/admin/helpquestion') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('admin/helpquestion') }}">
                    <i class="fa-solid fa-handshake-angle"></i>
                    <span class="align-middle">Help question</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>
                    <span class="align-middle">Sign Out</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
