@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile/agent.css') }}">
    <style>
        .players-portfolio .players-card {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    @php
        $name = explode(' ', $agent->user->name);
    @endphp
    <section class="agents-profile-section">
        <section class="agents-profile-hero">
            <div class="img img-cover">
                {{-- <img src="{{ asset($agent->cover_img) }}" alt="{{ $agent->cover_image }}"> --}}
                {{-- <img src="{{ asset(strtolower($agent->cover_img)) }}" alt="{{ $agent->cover_image }}"> --}}
            </div>
        </section>
        <div class="container">
            <div class="agents-profile">
                <div class="profile">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dp">
                                <div class="img">
                                    <img src="{{ asset(strtolower($agent->profile_img)) }}" alt="{{ $agent->user->name }}">
                                </div>
                                <div class="row meta">
                                    <div class="col-md-4">
                                        <span>Views</span><br>
                                        <span>{{ $agent->reads ?? '' }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Follwers</span><br>
                                        <span>{{ $count1 = \DB::table('followers')->where('following', '=', $id)->count() }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Following</span><br>
                                        <span>{{ $count1 = \DB::table('followers')->where('follower', '=', $id)->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <ul class="data">
                                <li class="firstname">{{ $name[0] }}</li>
                                <li class="lastname">{{ $name[1] }} <span><i
                                            class="fas fa-check-circle"></i>Verified</span>
                                </li>
                                <li>Nationality: {{ $agent->nationality }} <img
                                        src="{{ asset('images/flags/' . $agent->nationality . '.png') }}"
                                        class="country-flag"></li>
                                <li>Profile Link: <a href="#">Click Here</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <div class="agent-type">
                                <h4>Intermediary</h4>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="dropdown">
                                @php
                                    $k = 0;
                                @endphp
                                @if (is_array($followstatus) || is_object($followstatus))
                                    @foreach ($followstatus as $item)
                                        {{-- <p>{{$item['id']}}</p> --}}
                                        @if (isset($item['id']))
                                            <a href="{{ route('unfollow', $id) }}" type="button" class="btn option">Unfollow</a>
                                            @php
                                                $k = 1;
                                            @endphp
                                        @endif
                                    @endforeach
                                @else
                                    <p>Error: follow status is not an array or an object.</p>
                                @endif


                                @if ($k == 0)
                                    <a href="{{ route('follow', $id) }}" type="button" class="btn option">follow</a>
                                @endif
                                {{-- @if ($count = \DB::table('followers')->where('follower', '=', $agent->id && 'following', '=', $id))
                            <a href="{{ route('follow', $id) }}" type="button" class="btn option">Unfollow</a>
                            @else

                            <a href="{{ route('follow', $id) }}" type="button" class="btn option">Follow</a>
                            @endif --}}


                                <a href="{{ route('report', $id) }}" type="button" class="btn option">Report</a>
                                <a href="/messages/{{ $id }}" class="option" style="color: black !important">Send
                                    Message</a>
                                {{-- <select name="report" id="report" class="option">
                                <option value="" selected disabled>Report</option>
                                <option value="spam">Spam</option>
                                <option value="abuse">Abuse or Harassment</option>
                                <option value="voilence">Violence or Physical Harm</option>
                                <option value="offensive">Rude or Offensive</option>
                                <option value="inappropriate">Inappropriate Content</option>
                                <option value="other">Other</option>
                            </select> --}}
                                @isset(Auth::user()->type)
                                    @if (Auth::user()->type == 'admin')
                                        <a href="{{ route('block', $id) }}" type="button" class="btn option">Block</a>
                                    @endif
                                @endisset
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="about">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="title">
                                    About Me
                                </div>
                            </div>
                            <div class="col-md-11">
                                <div class="description">
                                    {{ $agent->about_me }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="countries-of-operation">
                    <div class="gray-heading">
                        <h3>Countries of Operation</h3>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_object($agent) && property_exists($agent, 'countries_of_operation') && is_array(json_decode($agent->countries_of_operation)))
                                    @foreach (json_decode($agent->countries_of_operation) as $operation)
                                        <span>{{ $operation }} <img src="{{ asset('images/flags/' . $operation . '.png') }}" alt="{{ $operation }}">,</span>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>{{-- countries-of-operation end --}}
                <div class="players-portfolio">
                    <div class="gray-heading">
                        <h3>players portfolio</h3>
                    </div>
                    @if (count($playersPortfolio) > 0)
                        <div class="players-card">
                            <div class="row top">
                                @foreach ($playersPortfolio as $portfolio)
                                    <div class="card col-3 py-2">
                                        <img class="card-img-top w-50 align-self-center" src="{{ asset($portfolio->profile_img) }}"
                                            alt="{{ $portfolio->player->name }}">
                                        <div class="card-body">

                                            <p class="card-title" style="color:#185F7C;font-weight:800">{{ $portfolio->player->name }}</p>

                                          <h6 class="card-title font-weight-bolder">Right midle feilder Dumy data</h6>



                                            
                                            <a href="{{ route('player-profile-detail', $portfolio->player_id) }}"
                                                class="btn btn-danger">View Profile</a>
                                        </div>
                                    </div>
                                @endforeach

<div class="row my-2">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
        <button type="button" class="btn btn-danger btn-lg">Show More</button>
    </div>
    <div class="col-md-4"></div>


</div>
                                
                            </div>
                        </div>{{-- players-card end --}}
                    @else
                        <div class="players-card">
                            <div class="row top">
                                <div class="col-md-12">
                                    <h3 class="firstname">No Players Found</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>{{-- palyers-portfolio end --}}
                <div class="transfer-history">
                    <div class="gray-heading">
                        <h3>Transfer history</h3>
                    </div>
                    <div class="content">
                        @if (count($transferHistory) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Player Name</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transferHistory as $history)
                                        <tr>
                                            <th scope="row">{{ $history->id }}</th>
                                            <td>{{ $history->player->name }}</td>
                                            <td>{{ $history->club_from }}</td>
                                            <td>{{ $history->club_to }}</td>
                                            <td>{{ ucfirst($history->transfer_type) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="players-card text-center">
                                <div class="row top">
                                    <div class="col-md-12">
                                        <h3 class="firstname">No Transfer History Found</h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <h4 class="title">
                        Achievements
                    </h4>
                    <div class="achievements">
                        <h4 class="total">Total <span>({{ count($achievements) }})</span></h4>
                        @if (count($achievements) > 0)
                            @foreach ($achievements as $achievement)
                                <div class="row">
                                    <div class="col-md-3"><span class="rank">{{ $achievement->achievements }} <img
                                                src="{{ asset('images/award.jpeg') }}" alt="..." class="flag">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="text">{{ $achievement->details }}</div>
                                    </div>
                                    @foreach ($countries as $country)
                                        @if ($achievement->country_id == $country->id)
                                            <div class="col-md-3">{{ $country->name }}
                                                <img src="{{ asset('images/flags/' . $country->name . '.png') }}"
                                                    alt="{{ $country->name }}" class="flag">
                                            </div>
                                        @endif
                                    @endforeach

                                    <div class="col-md-3">
                                        {{ $achievement->month }}, {{ $achievement->year }}
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text">No achievements yet</div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>{{-- transfer-history end --}}

                <div class="gray-heading">
                    <h3>Contact Information</h3>
                </div>
                <div class="contact-info">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><b>Nationality : </b>{{ $agent->nationality }}</li>
                                    <li><b>Email : </b>{{ $agent->user->email }}</li>
                                    <li><b>Socail Media Link2 : </b>{{ $agent->social_media_link_2 }}</li>
                                    <li><b>City : </b>
                                        @foreach ($cities as $city)
                                            @if ($agent->birth_city == $city->id)
                                                {{ $city->name }}
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><b>Country : </b>{{ $agent->country->name }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><b>Telephone : </b>{{ $agent->telephone }}</li>
                                    <li><b>Socail Media Link1 : </b>{{ $agent->social_media_link_1 }}</li>
                                    <li><b>Website : </b>{{ $agent->website }}</li>
                                    <li><b>State/Province : </b>{{ $agent->state }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>{{-- contact-information end --}}
            </div>
        </div>
    </section>
@endsection
