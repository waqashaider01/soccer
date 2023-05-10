<style>
    .dropdown-menu {
        background-color: transparent;
        position: absolute;
        inset: 0px auto auto 0px;
        margin: 0px;
        transform: translate(0px, 23px);
        top: 40px !important;
    }

    .dropdown-item {
        background-color: transparent;
        padding: 0px;


    }

    .dropdown-toggle:after {
        border: 0;

    }
</style>


<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">SoccerWorldLink</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ Request::is('agent/' . Auth::user()->type . '/dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route(Auth::user()->type . '.dashboard') }}">
                    <i class="fas fa-chart-line"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->type != 'admin')
                <li class="sidebar-item {{ Request::is('agent/activity') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('agent.activity') }}">
                        <i class="far fa-calendar-check"></i> <span class="align-middle">Activity</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('agent/' . Auth::user()->type . '/profile') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route(Auth::user()->type . '.profile') }}">
                        <i class="far fa-id-badge"></i> <span class="align-middle">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('agent/notifications') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('agent.notifications') }}">
                        <i class="far fa-bell"></i>
                        <span class="align-middle">Notifications</span>
                    </a>
                </li>
            @endif


            <!--<li class="sidebar-item {{ Request::is(Auth::user()->type . '/all-blogs') ? 'active' : '' }}">-->
            <!--    <a class="sidebar-link" href="{{ route('all-blogs', Auth::user()->type) }}">-->
            <!--        <i class="fas fa-blogger"></i>-->
            <!--        <span class="align-middle">Blogs</span>-->
            <!--    </a>-->
            <!--</li>-->

            <!--<li class="sidebar-item {{ Request::is(Auth::user()->type . '/all-blogs') ? 'active' : '' }}">-->
            <!--    <a class="sidebar-link" href="/messages">-->
            <!--        <i class="fas fa-blogger"></i>-->
            <!--        <span class="align-middle">Messages</span>-->
            <!--    </a>-->
            <!--</li>-->

            @if (Auth::user()->type != 'admin')

                <li class="sidebar-item {{ Request::is('agent/messages') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route(Auth::user()->type.'.messages') }}">
                        <i class="fas fa-envelope-open-text"></i>
                        <span class="align-middle">Messages</span>
                    </a>
                </li>

                <!--<li class="sidebar-item {{ Request::is('agent/my-connections') ? 'active' : '' }}">-->
                <!--    <a class="sidebar-link" href="{{ route('agent.my-connections') }}">-->
                <!--        <i class="fas fa-user-friends"></i>-->
                <!--        <span class="align-middle">My Connections</span>-->
                <!--    </a>-->
                <!--</li>-->

                <li class="sidebar-item {{ Request::is('agent/subscriptions') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route(auth()->user()->type . '.subscriptions') }}">
                        <i class="fas fa-user-friends"></i>
                        <span class="align-middle">Subscriptions</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('agent/settings') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{route('agent.setting')}}">
                        <i class="fas fa-cog"></i>
                        <span class="align-middle">Settings</span>
                    </a>
                </li>

                <hr style="color: white">

                <li class="sidebar-item">
                    <div class="dropdown">
                        <span class=" dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <a class="sidebar-link">
                                <i class="fas fa-podcast"></i>
                                <span class="align-middle">Market Posts</span>
                            </a>
                        </span>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item " href="#"></a>
                                @if (Auth::user()->type != 'player')
                                    <a class="sidebar-link" href="{{ route('campus.market-post-campus') }}">
                                        <i class="fas fa-plus-circle"></i>
                                        <span class="align-middle">Camps</span>
                                    </a>
                                @endif
                            </li>

                            <li>

                                @if (Auth::user()->type != 'player')
                                    <a class="sidebar-link"
                                        href="{{ route('recommend-player.market-post-recommend-player') }}">
                                        <i class="fas fa-plus-circle"></i>
                                        <span class="align-middle">Recommend A Player</span>
                                    </a>
                                @endif
                            </li>
                            @if (Auth::user()->type == 'scout' || Auth::user()->type == 'coach' || Auth::user()->type == 'intermediary')
                                <a class="sidebar-link"
                                    href="{{ route('request-player.market-post-request-player') }}">
                                    <i class="fas fa-plus-circle"></i>
                                    <span class="align-middle">Request A Player</span>
                                </a>
                            @endif
                </li>
                @if (Auth::user()->type != 'player')
                    <a class="sidebar-link dropdown-item" href="{{ route('trial.market-post-trial') }}">
                        <i class="fas fa-plus-circle"></i>
                        <span class="align-middle">Trials Tryouts</span>
                    </a>
                @endif
                </li>



        </ul>
    </div>
    </li>
    @endif
    <hr style="color: white">

    <li class="sidebar-item ">
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
