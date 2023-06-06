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
                    @php
                        $user = Auth::user()->type;
                        switch ($user) {
                            case 'player':
                                $views = DB::table('player_infos')
                                    ->where('player_id', Auth::id())
                                    ->first();
                                break;
                            case 'scout':
                                $views = DB::table('scout_infos')
                                    ->where('scout_id', Auth::id())
                                    ->get();
                                break;
                            case 'club':
                                $views = DB::table('club_infos')
                                    ->where('club_id', Auth::id())
                                    ->get();
                                break;
                            case 'coach':
                                $views = DB::table('coach_infos')
                                    ->where('coach_id', Auth::id())
                                    ->get();
                                break;
                            case 'intermediary':
                                $views = DB::table('intermediary_infos')
                                    ->where('intermediary_id', Auth::id())
                                    ->get();
                                break;
                            case 'academy':
                                $views = DB::table('academy_infos')
                                    ->where('academy_id', Auth::id())
                                    ->get();
                                break;
                            default:
                                $views = null;
                        }
                        // $views = DB::table('player_infos') ->where('player_id',Auth::id())->get();
                        // $views = DB::table('scout_infos') ->where('scout_id',Auth::id())->get();
                        // dd($views);
                    @endphp
                    {{-- @dd($views->profile_img); --}}
                    
                        <img src="{{asset('./images/profile.jpg')}}" class="avatar me-1" alt="Charles Hall">
                    {{-- @if(isset($views))
                    
                        <img src="{{ asset('') }}{{ $views->profile_img ?? '' }}" />
                    @endif --}}
                    <h4 class="name w_color mt-3">{{ Auth::user()->name }} ({{ Auth::user()->type }})</h4>
                    <p><a href="{{ url('players/' . Auth::user()->id . '/profile') }}"
                        class="verify-account w_color">View Public Profile</a></p>
                    <p><a href="{{ route('verify-account', ['id' => Auth::user()->id]) }}"
                            class="verify-account w_color">Verify Your Account</a></p>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-house"></i><span class="align-middle">Dashboard</span>
                </a>
            </li>
            {{-- <li class="sidebar-item {{ Request::is(Auth::user()->type . '/activity') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('activity') }}">
                    <i class="fas fa-chart-line"></i>
                    <span class="align-middle">Activity</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/profile') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('player.profile') }}">
                    <i class="far fa-id-badge"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            {{-- <li class="sidebar-item {{ Request::is(Auth::user()->type . '/all-blogs') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('all-blogs', Auth::user()->type) }}">
                    <i class="fa-brands fa-blogger"></i>
                    <span class="align-middle">Blogs</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/messages') ? 'active' : '' }}">
                <a class="sidebar-link" href="/messages">
                    <i class="fa-solid fa-comment"></i>
                    <span class="align-middle">Messages</span>
                </a>
            </li>


            {{-- <li class="sidebar-item {{ Request::is(Auth::user()->type . '/reports') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.reports') }}">
                    <i class="fa-solid fa-list-check"></i>
                    <span class="align-middle">Reports</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ Request::is(Auth::user()->type . 'n/etwork') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/networks') }}">
                    <i class="fa-solid fa-globe"></i>
                    <span class="align-middle">My Network</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/settings') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('market') }}">
                    <i class="fa-solid fa-shop"></i>
                    <span class="align-middle">Market</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is(Auth::user()->type . '/settings') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('playersetting') }}">
                    <i class="fas fa-cog"></i>
                    <span class="align-middle">Settings</span>
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
