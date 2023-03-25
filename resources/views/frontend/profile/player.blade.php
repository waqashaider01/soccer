@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile/player.css') }}">
    <style>
        #main-tag {
            cursor: pointer;
        }

        #main-tag:hover {
            color: #07a4ff;
        }

        .players-profile-hero .img-cover img {
            width: 100%;
            height: 12% !important;
            object-fit: cover;
            position: absolute;
            top: 0;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 70%;
            z-index: -1;
        }

        #position {
            position: absolute;
            background-image: url(http://127.0.0.1:8000/images/player-position/main-position/goalkeeper.png), url(http://127.0.0.1:8000/images/player-position/alternative-position/goalkeeper.png);
            background-blend-mode: lighten;
            background-position: center;
            background-size: cover;
            background-position-x: 193px;
            width: 192px;
            height: 141px;
            margin-top: -21px;
            z-index: 2;
            filter: inherit;
        }



        #alternative-tag {
            cursor: pointer;
        }

        #alternative-tag:hover {
            color: #07a4ff;
        }
    </style>

    <style>
        #position {
            position: absolute;
            background-blend-mode: lighten;
            background-position: center;
            background-size: cover;
            background-position-x: 193px;
            width: 192px;
            height: 137px;
            z-index: 2;

            filter: inherit;
        }



        #main-position-pic,
        #alternative-position-pic,
        #image1,
        #image2,
        #image3,
        #image4,
        #image5 {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }

        .top {
            /* background-color: #f5f; */
            height: 60px;
            text-align: end;
        }

        .top label {
            font-size: 24px;
            background: #fff;
            height: 50px;
            width: 50px;
            line-height: 50px;
            border-radius: 50%;
            text-align: center;
            color: #185abc;
        }

        .top .upload-profile {
            background-color: #c8d8d7;
            padding: 0px 6px;
            display: inline-block;
        }

        .top #camera {
            display: none;
            visibility: hidden;
        }
    </style>

    <x-embed-styles />
@endpush

@section('content')
    @php
        // dd($player);
        $name = explode(' ', $player->user->name);
    @endphp

    <section class="players-profile-section">
        <section class="players-profile-hero">
            <div class="row">
                <div class="col-12">
                    <div class="top">
                        <form id="cover_img" action="{{ url('imageUpload/' . $player->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <span class="upload-profile">
                                <label for="camera"><i class="fas fa-camera"></i></label>
                                <input type="file" name="cover_img" onchange="$('#cover_img').submit()" id="camera">
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="img img-cover">
                {{-- <img src="{{ asset($player->cover_img) }}" alt="{{ $player->cover_image }}"> --}}
                {{-- @php
                    dd($player->user->name);
                @endphp --}}
                <img src="{{ asset($player->cover_img) }}" class="img-fluid rounded-start" alt="{{ $player->user->name }}">
            </div>
        </section>
        <div class="container">
            <div class="players-profile">
                <div class="profile">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dp">
                                <div class="img">
                                    {{-- @php
                                        dd($player->user->name);
                                    @endphp --}}
                                    <img src="{{ asset($player->profile_img) }}" alt="{{ $player->user->name }}">
                                </div>
                                <div class="row meta mx-4">
                                    <div class="col-md-4">
                                        <span>Views</span><br>
                                        <span>{{ $player->reads }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Followers</span><br>
                                        <span>{{ $count1 = \DB::table('followers')->where('following', '=', $player->id)->count() }}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span>Following</span><br>
                                        <span>{{ $count1 = \DB::table('followers')->where('follower', '=', $player->id)->count() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <ul class="data">
                                {{-- @php
                                    dd($name[0]);
                                    dd($name[1]);
                                @endphp --}}
                                <li class="firstname">{{ $name[0] }}</li>
                                <li class="lastname">{{ $name[1] }} <span><i
                                            class="fas fa-check-circle"></i>Verified</span>
                                </li>
                                <li><span class="player-title">Player</span></li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="heading">Date Of Birth: </span><br>
                                            <span class="text">{{ $player->dob }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="heading">Age: </span><br>
                                            <span class="text">{{ Carbon\Carbon::parse($player->dob)->age }}</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="heading">Profile Link: </span><br>
                                    <span class="text"><a href="{{ $player->profile_link }}">Click Here</a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <ul class="data">
                                <li>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="heading">Place Of Birth: </span><br>
                                            <span class="text">
                                                @if ($cities != null)
                                                    @foreach ($cities as $city)
                                                        @if ($player->birth_city == $city->id)
                                                            <h5>{{ $city->name }}</h5>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if ($countries != null)
                                                    @foreach ($countries as $country)
                                                        @if ($player->birth_country == $country->id)
                                                            <h5>{{ $country->name }}</h5>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                {{-- |||||||||||| ***************************** Error Below      *************************************************** --}}
                                                @if ($player != null)
                                                    <img src="{{ asset('images/flags/' . $player->country->name . '.png') }}"
                                                        alt="{{ $player->country->name }}" width="25%">
                                                @endif


                                            </span>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6 height">
                                                    <span class="heading">Height</span><br>
                                                    <span class="text">
                                                        {{ $player->height }}cm /
                                                        {{ floor($player->height / 12) }}ft
                                                        {{ round($player->height % 12) }}in
                                                    </span>
                                                </div>
                                                <div class="col-6">
                                                    <span class="heading">Weight</span><br>
                                                    <span class="text">
                                                        {{ $player->weight }} /
                                                        {{ round($player->weight / 0.45359237) }}kg
                                                    </span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <span class="heading">Citizenship</span><br>
                                            <span class="text">
                                                @foreach ($countries as $country)
                                                    @if ($player->citizenship_country == $country->id)
                                                        {{ $country->name }}
                                                        <img src="{{ asset('images/flags/' . $country->name . '.png') }}"
                                                            alt="{{ $country->name }}" width="25%">
                                                    @endif
                                                @endforeach
                                            </span>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="current-market-value">
                                                        <span class="heading">Market <br> Value</span><br>
                                                        <span
                                                            class="description">${{ $player->current_market_value }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            {{-- @dd($player) --}}
                            <div class="player-type text-center">
                                <span class="title "><strong>Main Position:</strong> <br>
                                    <p id="main-tag">
                                        {{ $player->main_position }}
                                    </p>
                                </span>
                                <div id="position"style="position:relative;">
                                    <i class="fa-solid fa-location-dot"
                                        style="color:#c3c3ed;font-size:15px;position: absolute;
                                    top: 34px;
                                    right: 45px;
                                "></i>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown">
                                @php
                                    $k = 0;
                                @endphp
                                @foreach ($followstatus as $item)
                                    {{-- <p>{{$item['id']}}</p> --}}

                                    @if (isset($item['id']))
                                        <a href="{{ route('unfollow', $id) }}" type="button"
                                            class="btn option">Unfollow</a>
                                        @php
                                            $k = 1;
                                        @endphp
                                    @endif
                                @endforeach

                                @if ($k == 0)
                                    <a href="{{ route('follow', $id) }}" type="button" class="btn option">follow</a>
                                @endif
                                <a href="/messages/{{ $id }}" class="option" style="color: black !important">Send
                                    Message</a>
                                <a href="{{ route('report', $player->id) }}" type="button" class="btn option">Report</a>
                                {{-- <select name="report" id="report" class="option">
                                <option value="volvo" selected disabled>Report</option>
                                <option value="volvo">Spam</option>
                                <option value="volvo">Abuse or Harassment</option>
                                <option value="saab">Violence or Physical Harm</option>
                                <option value="mercedes">Rude or Offensive</option>
                                <option value="saab">Inappropriate Content</option>
                                <option value="mercedes">Other</option>
                            </select> --}}
                                @isset(Auth::user()->type)
                                    @if (Auth::user()->type == 'admin')
                                        @if ($blockadmin == 0)
                                            <a href="{{ route('block', $player->id) }}" type="button"
                                                class="btn option">Block</a>
                                        @else
                                            <a href="{{ route('unblock', $player->id) }}" type="button"
                                                class="btn option">Unblock</a>
                                        @endif
                                    @endif
                                    @if (Auth::user()->type != 'admin')
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($msgstatus as $value)
                                            @if (isset($value['id']))
                                                <a href="{{ route('unblockMsg', $id) }}" type="button"
                                                    class="btn option">Unblock</a>
                                                @php
                                                    $i = 1;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($i == 0)
                                            <a href="{{ route('blockMsg', $id) }}" type="button"
                                                class="btn option">Block</a>
                                        @endif
                                    @endif
                                @endisset
                                <a href="{{ route('download-cv', $player->id) }}" type="button" class="btn option"
                                    style="z-index: 4000">Download
                                    CV</a>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top:-47px">
                        <div class="col-md-7"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <div>
                                        {{-- make cursor click --}}
                                        {{-- <span class="title"><strong>Main Position:</strong> <br>
                                            <p id="main-tag">
                                                {{ $player->main_position }}
                                            </p>
                                        </span><br> --}}



                                        {{-- <img
                                        src="{{ asset('images/player-position/main-position/' . $player->main_position . '.png') }}"
                                        class="player-position" id="main-position-pic">

                                    <img src="{{ asset('images/player-position/alternative-position/' . $player->alternative_position . '.png') }}"
                                        class="player-position" id="alternative-position-pic" style="display: none;">
                                    --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <span class="title"><strong>Alternative Position:</strong> <br>
                                            {{-- @if ($player->alternative_position != null) --}}
                                            <p id="alternative-tag">
                                                {{-- {{ $player->alternative_position }} --}}
                                            </p>
                                            {{-- @endif --}}
                                        </span><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">

                        </div>
                    </div>

                    <hr>
                    <div class="about px-3">
                        <div style="display: flex; justify-content: space-between; padding: 10px 0;">
                            <span class="heading"><a class="btn btn-outline-dark" href="#player-detail">
                                    Player Details
                                </a></span>

                            <span class="heading"><a class="btn btn-outline-dark" href="#attributes-rating">
                                    Attributes Rating
                                </a></span>

                            <span class="heading"><a class="btn btn-outline-dark" href="#transfer-history">
                                    Transfer History
                                </a></span>

                            <span class="heading"><a class="btn btn-outline-dark" href="#career-match-data">
                                    Career Match Data
                                </a></span>

                            <span class="heading"><a class="btn btn-outline-dark" href="#player-achievements">
                                    Player Achievements
                                </a></span>

                            <span class="heading"><a class="btn btn-outline-dark" href="#next-match-schedule">
                                    Next Match Schedule
                                </a></span>

                            <span class="heading"><a class="btn btn-outline-dark" href="#player-media">
                                    Player Media
                                </a></span>
                        </div>
                    </div>
                </div>
                <div class="player-detail" id="player-detail">
                    <div class="heading">
                        <h3 style="margin-bottom:0px">Player's Details</h3>
                    </div>
                    <div class="row px-3 mt-3">
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>EU Passport:</th>
                                        <td>{{ $player->eu_passport == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Preferred Foot:</th>
                                        <td>{{ $player->preferred_foot }}</td>
                                    </tr>
                                    <tr>
                                        <th>Speed:</th>
                                        <td>{{ $player->speed }}</td>
                                    </tr>
                                    <tr>
                                        <th>Career Level:</th>
                                        <td>{{ $player->career_level }}</td>
                                    </tr>
                                    <tr>
                                        <th>Current Club:</th>
                                        <td>{{ $player->current_club }}</td>
                                    </tr>
                                    <tr>
                                        <th>League Division:</th>
                                        <td>{{ $player->league_division }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Country:</th>
                                        <td>
                                            @foreach ($countries as $country)
                                                @if ($player->career_country == $country->id)
                                                    {{ $country->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>City:</th>
                                        <td>
                                            @foreach ($cities as $city)
                                                @if ($player->career_city == $city->id)
                                                    {{ $city->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Contract Start Date:</th>
                                        <td>{{ $player->contract_start_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contract Expiry Date:</th>
                                        <td>{{ $player->contract_expiry_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>National Team Player:</th>
                                        <td>{{ $player->national_team_player == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>International Caps:</th>
                                        <td>{{ $player->international_caps }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>{{-- player-detail end --}}
                <div class="attributes-rating" id="attributes-rating">
                    <div class="heading">
                        <h3>Attributes Rating</h3>
                        <ul class="nav nav-pills mb-3  justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-technical-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-technical" type="button" aria-selected="true">
                                    Technical
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-tactical-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-tactical" type="button" aria-selected="false">
                                    Tactical
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-physical-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-physical" type="button" aria-selected="false">
                                    Physical
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-technical">
                            {{-- <div class="ratings">
                            <span>Ratings</span>
                        </div> --}}
                            <div class="chart">
                                <div class="chartBox">
                                    <canvas id="technical"></canvas>
                                </div>
                                <b class="d-block m-3 p-3">Technical Average: 80%</b>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-tactical">
                            <div class="chart">
                                <div class="chartBox">
                                    <canvas id="tactical"></canvas>
                                </div>
                                <b class="d-block m-3 p-3">Tactical Average: 80%</b>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="pills-physical">
                            <div class="chart w-75 table-responsive">
                                <div class="chartBox">
                                    <canvas id="physical"></canvas>
                                </div>
                                <b class="d-block m-3 p-3">Physical Average: 80%</b>
                            </div>
                        </div>
                    </div>
                </div>{{-- attributes-rating end --}}
                <div class="transfer-history" id="transfer-history">
                    <div class="heading">
                        <h3 style="margin-bottom:0px">Transfer history</h3>
                    </div>
                    <div class="row px-3 mt-3">
                        <div class="col-12">
                            <table class="table table-striped table-bordered bg-white">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($PlayerTransferHistories as $PlayerTransferHistory)
                                        <tr>
                                            <td>{{ $PlayerTransferHistory->transfer_date }}</td>
                                            <td>{{ $PlayerTransferHistory->transfer_from_team }}</td>
                                            <td>{{ $PlayerTransferHistory->transfer_to_team }}</td>
                                            <td>{{ $PlayerTransferHistory->transfer_type }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>{{-- transfer-history end --}}
                <div class="career-match-data" id="career-match-data">
                    <div class="heading">
                        <h3>Career Match Data</h3>
                        <ul class="nav nav-pills mb-3  justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-league-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-league" type="button" aria-selected="true">
                                    League
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-domestic-cups-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-domestic-cups" type="button" aria-selected="false">
                                    Domestic Cups
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-international-cups-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-international-cups" type="button" aria-selected="false">
                                    International Cups
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-national-team-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-national-team" type="button" aria-selected="false">
                                    National
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-league">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Season</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Competition</th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/matches-played.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Matches Played">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/goals.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Goals">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/assists.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Assists">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-in.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute In">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-out.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute Out">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/yellow-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/second-yellow-card.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Second Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/red-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Red Cards">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PlayerDomesticCareerMatchDatas as $PlayerDomesticCareerMatchData)
                                                <tr>
                                                    <td>{{ $PlayerDomesticCareerMatchData->season }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->team }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->country }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->competition }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->matches_played }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->goals }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->assists }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->substitute_in }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->substitute_out }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->yellow_cards }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->second_yellow_cards }}</td>
                                                    <td>{{ $PlayerDomesticCareerMatchData->red_cards }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-domestic-cups">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Season</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Competition</th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/matches-played.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Matches Played">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/goals.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Goals">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/assists.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Assists">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-in.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute In">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-out.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute Out">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/yellow-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/second-yellow-card.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Second Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/red-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Red Cards">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PlayerInternationalCareerMatchDatas as $PlayerInternationalCareerMatchData)
                                                <tr>
                                                    <td>{{ $PlayerInternationalCareerMatchData->season }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->team }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->country }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->competition }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->matches_played }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->goals }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->assists }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->substitute_in }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->substitute_out }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->yellow_cards }}</td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->second_yellow_cards }}
                                                    </td>
                                                    <td>{{ $PlayerInternationalCareerMatchData->red_cards }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-international-cups">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Season</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Competition</th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/matches-played.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Matches Played">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/goals.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Goals">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/assists.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Assists">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-in.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute In">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-out.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute Out">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/yellow-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/second-yellow-card.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Second Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/red-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Red Cards">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PlayerNationalCareerMatchDatas as $PlayerNationalCareerMatchData)
                                                <tr>
                                                    <td>{{ $PlayerNationalCareerMatchData->season }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->team }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->country }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->competition }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->matches_played }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->goals }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->assists }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->substitute_in }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->substitute_out }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->yellow_cards }}</td>
                                                    <td>{{ $PlayerNationalCareerMatchData->second_yellow_cards }}
                                                    </td>
                                                    <td>{{ $PlayerNationalCareerMatchData->red_cards }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-national-team">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Season</th>
                                                <th scope="col">Team</th>
                                                <th scope="col">Country</th>
                                                <th scope="col">Competition</th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/matches-played.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Matches Played">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/goals.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Goals">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/assists.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Assists">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-in.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute In">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/substitute-out.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Substitute Out">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/yellow-card.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/second-yellow-card.png') }}"
                                                        alt="" data-toggle="tooltip" data-placement="top"
                                                        title="Second Yellow Cards">
                                                </th>
                                                <th scope="col">
                                                    <img src="{{ asset('images/icons/red-card.png') }}" alt=""
                                                        data-toggle="tooltip" data-placement="top" title="Red Cards">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PlayerLeagueCareerMatchDatas as $PlayerLeagueCareerMatchData)
                                                <tr>
                                                    <td>{{ $PlayerLeagueCareerMatchData->season }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->team }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->country }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->competition }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->matches_played }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->goals }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->assists }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->substitute_in }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->substitute_out }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->yellow_cards }}</td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->second_yellow_cards }}
                                                    </td>
                                                    <td>{{ $PlayerLeagueCareerMatchData->red_cards }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>{{-- career-match-data end --}}
                <div class="player-achievements" id="player-achievements">
                    <div class="heading">
                        <h3 style="margin-bottom:0px">Achievements</h3>
                    </div>
                    <div class="content">
                        <h4 class="total">Total <span>({{ count($PlayerAchievements) }})</span></h4>
                        @if (count($PlayerAchievements) > 0)
                            @foreach ($PlayerAchievements as $achievement)
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
                </div>{{-- player-achievements end --}}
                <div class="next-match-schedule" id="next-match-schedule">
                    <div class="heading">
                        <h3 style="margin-bottom:0px">Next Match Schedule</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Date/Day</th>
                                        <th scope="col">My Team</th>
                                        <th scope="col">Opposing Team</th>
                                        <th scope="col">Match Type</th>
                                        <th scope="col">Home/Away</th>
                                        <th scope="col">Venue</th>
                                        <th scope="col">Time(GMT/Local)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($PlayerNextMatchSchedules as $PlayerNextMatchSchedule)
                                        <tr>
                                            <td>{{ $PlayerNextMatchSchedule->date }}</td>
                                            <td>{{ $PlayerNextMatchSchedule->my_team }}</td>
                                            <td>{{ $PlayerNextMatchSchedule->opposing_team }}</td>
                                            <td>{{ $PlayerNextMatchSchedule->match_type }}</td>
                                            <td>{{ $PlayerNextMatchSchedule->home_match == 1 ? 'Home' : 'Away' }}</td>
                                            <td>{{ $PlayerNextMatchSchedule->venue }}</td>
                                            <td>{{ $PlayerNextMatchSchedule->time }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>{{-- player-detail end --}}
                <div class="player-media" id="player-media">
                    <div class="heading">
                        <h3 style="margin-bottom:0px">Player's Media</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="videos">
                                <span class="title">
                                    Videos:
                                </span>
                                <div class="px-5 py-3">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <!-- @if ($player->media_video1)
    <x-embed url="{{ $player->media_video1 }}" />
    @endif -->
                                        </div>
                                        <div class="col-md-2">
                                            @if ($player->media_video1)
                                                <x-embed url="{{ $player->media_video1 }}" />
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            @if ($player->media_video2)
                                                <x-embed url="{{ $player->media_video2 }}" />
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            @if ($player->media_video3)
                                                <x-embed url="{{ $player->media_video3 }}" />
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            @if ($player->media_video4)
                                                <x-embed url="{{ $player->media_video4 }}" />
                                            @endif
                                        </div>
                                        <div class="col-md-2">
                                            @if ($player->media_video5)
                                                <x-embed url="{{ $player->media_video5 }}" />
                                            @endif
                                        </div>
                                        <div class="col-md-1">
                                            <!-- @if ($player->media_video1)
    <x-embed url="{{ $player->media_video1 }}" />
    @endif -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="images">
                                <span class="title">Images</span>
                                <div class="px-5 py-3">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <!-- <img id="image1" src="{{ asset($player->media_img1) }}" class="img-thumbnail"> -->
                                        </div>
                                        <div class="col-md-2">
                                            <img id="image1" src="{{ asset($player->media_img1) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-md-2">
                                            <img id="image2" src="{{ asset($player->media_img2) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-md-2">
                                            <img id="image3" src="{{ asset($player->media_img3) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-md-2">
                                            <img id="image4" src="{{ asset($player->media_img4) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-md-2">
                                            <img id="image5" src="{{ asset($player->media_img5) }}"
                                                class="img-thumbnail">
                                        </div>
                                        <div class="col-md-1">
                                            <!-- <img id="image1" src="{{ asset($player->media_img1) }}" class="img-thumbnail"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>{{-- player-media end --}}
            </div>

            <div id="myModal-main-position-pic" class="modal">
                <img class="modal-content" id="main-position-image">
            </div>

            <div id="myModal-alternative-position-pic" class="modal">
                <img class="modal-content" id="alternative-position-image">
            </div>

            <div id="myModal-image1" class="modal">
                <img class="modal-content" id="img01">
            </div>

            <div id="myModal-image2" class="modal">
                <img class="modal-content" id="img02">
            </div>

            <div id="myModal-image3" class="modal">
                <img class="modal-content" id="img03">
            </div>

            <div id="myModal-image4" class="modal">
                <img class="modal-content" id="img04">
            </div>

            <div id="myModal-image5" class="modal">
                <img class="modal-content" id="img05">
            </div>

        </div>
    </section>

    <div class="container">
        <div class="row">
            <h2>The below data is come from fronted profile player </h2>
            @foreach ($onlycontacts as $onlycontact)
                @foreach ($UserPrivacy as $privacy)
                    @if ($privacy->email == 0)
                        <div class="col-sm-3">
                            <h2>Email :{{ $privacy->email }} Everyone</h2>
                        </div>
                    @elseif ($privacy->email == 1)
                        @if (Auth::id() == $user->id)
                            <div class="col-sm-3 ">
                                <h2>Email :{{ $privacy->email }} only me</h2>
                            </div>
                        @endif
                    @elseif ($privacy->email == 2)
                        @if (Auth::id() == $onlycontact)
                            <div class="col-sm-3 ">
                                <h2>Email: {{ $privacy->email }} (Only Contact)</h2>
                            </div>
                        @endif
                    @endif



                    {{-- telephone --}}
                    @if ($privacy->telephone == 0)
                        <div class="col-sm-3">
                            <h2>telephone :{{ $privacy->telephone }} Everyone</h2>
                        </div>
                    @elseif ($privacy->telephone == 1)
                        @if (Auth::id() == $user->id)
                            <div class="col-sm-3">
                                <h2>telephone :{{ $privacy->telephone }} only me</h2>
                            </div>
                        @endif
                    @elseif ($privacy->telephone == 2)
                        @if (Auth::id() == $onlycontact)
                            <div class="col-sm-3 ">
                                <h2>telephone :{{ $privacy->telephone }} only contact</h2>
                            </div>
                        @endif
                    @endif


                    {{-- website --}}
                    @if ($privacy->website == 0)
                        <div class="col-sm-3">
                            <h2>website :{{ $privacy->website }} Everyone</h2>
                        </div>
                    @elseif ($privacy->website == 1)
                        @if (Auth::id() == $user->id)
                            <div class="col-sm-3 ">
                                <h2>website :{{ $privacy->website }} only me</h2>
                            </div>
                        @endif
                    @elseif ($privacy->website == 2)
                        @if (Auth::id() == $onlycontact)
                            <div class="col-sm-3 ">
                                <h2>website :{{ $privacy->website }} only contact</h2>
                            </div>
                        @endif
                    @endif



                    {{-- social media links  --}}
                    @if ($privacy->social_media_links == 0)
                        <div class="col-sm-3">
                            <h2>social_media_links :{{ $privacy->social_media_links }} Everyone</h2>
                        </div>
                    @elseif ($privacy->social_media_links == 1)
                        @if (Auth::id() == $user->id)
                            <div class="col-sm-3 d-none">
                                <h2>social_media_links :{{ $privacy->social_media_links }} only me</h2>
                            </div>
                        @endif
                    @elseif ($privacy->social_media_links == 2)
                        @if (Auth::id() == $onlycontact)
                            <div class="col-sm-3 ">
                                <h2>social_media_links :{{ $privacy->social_media_links }} only contact</h2>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal-main-position-pic");
        var img = document.getElementById("main-position-pic");
        var modalImg = document.getElementById("main-position-image");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        var modal = document.getElementById("myModal-alternative-position-pic");
        var img = document.getElementById("alternative-position-pic");
        var modalImg = document.getElementById("alternative-position-image");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        var modal = document.getElementById("myModal-image1");
        var img = document.getElementById("image1");
        var modalImg = document.getElementById("img01");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        var modal = document.getElementById("myModal-image2");
        var img = document.getElementById("image2");
        var modalImg = document.getElementById("img02");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        var modal = document.getElementById("myModal-image3");
        var img = document.getElementById("image3");
        var modalImg = document.getElementById("img03");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        var modal = document.getElementById("myModal-image4");
        var img = document.getElementById("image4");
        var modalImg = document.getElementById("img04");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        var modal = document.getElementById("myModal-image5");
        var img = document.getElementById("image5");
        var modalImg = document.getElementById("img05");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function showMainPosition() {
            document.getElementById('main-position-pic').style.display = 'block';
            document.getElementById('alternative-position-pic').style.display = 'none';
        }

        function showAlternativePosition() {
            document.getElementById('main-position-pic').style.display = 'none';
            document.getElementById('alternative-position-pic').style.display = 'block';
        }
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js"
        integrity="sha256-RgW6ICRcHgz1vaGkL5egQAqmkWxGbwa2E3Boz/3CapM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/1.2.1/chartjs-plugin-annotation.min.js"
        integrity="sha512-ooJBPaW5ClG2gzDFT6KIKVeA8Pcie6InrV/gFP+RH6P2hrCJNVjaggZrxT/CeBakKwOlSUwHEwMCa5iny0uJtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const ctx = document.getElementById("technical").getContext("2d");
        const technicalChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "Ball Control",
                    "Corners",
                    "Crossing",
                    "Dribbling",
                    "Finishing",
                    "First Touch",
                    "Free Kick Taking",
                    "Heading",
                    "Long Shots",
                    "Long Throws",
                    "Marking",
                    "Passing",
                    "Penalty Taking",
                    "Tackling",
                    "Technique",
                ],
                datasets: [{
                    label: "Technical",
                    data: [
                        <?php print $PlayerAttributes->ball_control ? $PlayerAttributes->ball_control : '0'; ?>,
                        <?php print $PlayerAttributes->corners ? $PlayerAttributes->corners : 0; ?>,
                        <?php print $PlayerAttributes->crossing ? $PlayerAttributes->crossing : 0; ?>,
                        <?php print $PlayerAttributes->dribbling ? $PlayerAttributes->dribbling : 0; ?>,
                        <?php print $PlayerAttributes->finishing ? $PlayerAttributes->finishing : 0; ?>,
                        <?php print $PlayerAttributes->first_touch ? $PlayerAttributes->first_touch : 0; ?>,
                        <?php print $PlayerAttributes->free_kick_taking ? $PlayerAttributes->free_kick_taking : 0; ?>,
                        <?php print $PlayerAttributes->heading ? $PlayerAttributes->heading : 0; ?>,
                        <?php print $PlayerAttributes->long_shots ? $PlayerAttributes->long_shots : 0; ?>,
                        <?php print $PlayerAttributes->long_throws ? $PlayerAttributes->long_throws : 0; ?>,
                        <?php print $PlayerAttributes->marking ? $PlayerAttributes->marking : 0; ?>,
                        <?php print $PlayerAttributes->passing ? $PlayerAttributes->passing : 0; ?>,
                        <?php print $PlayerAttributes->penalty_taking ? $PlayerAttributes->penalty_taking : 0; ?>,
                        <?php print $PlayerAttributes->tackling ? $PlayerAttributes->tackling : 0; ?>,
                        <?php print $PlayerAttributes->technique ? $PlayerAttributes->technique : 0; ?>,
                    ],
                    // backgroundColor: "#54b2fa",
                    backgroundColor: "#8693AB",
                    borderWidth: 1,
                    borderColor: "blue",
                    borderRadius: 14,
                    // font-size:,
                }, ],
            },
            options: {
                topLeft: 5,
                topRight: 5,
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        ticks: {
                            // Include a dollar sign in the ticks
                            // callback: function(value, index, values) {
                            //     if(value%20==0) return value;
                            //     }
                            stepSize: 20,
                            font: {
                                size: 20,
                                weight: 600
                            },

                        },
                        grid: {
                            display: false,
                        },

                    },
                    x: {
                        grid: {
                            display: false,
                            backgroundColor: 'rgba(251, 85, 85, 0.4)'
                        },
                    },
                },
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 20
                            },
                        }
                    },
                    autocolors: false,
                    annotation: {
                        annotations: {
                            box1: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 0,
                                yMax: 10,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box2: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 10,
                                yMax: 20,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box3: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 20,
                                yMax: 30,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box4: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 30,
                                yMax: 40,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box5: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 40,
                                yMax: 50,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box6: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 50,
                                yMax: 60,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box7: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 60,
                                yMax: 70,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box8: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 70,
                                yMax: 80,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box9: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 80,
                                yMax: 90,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box10: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 90,
                                yMax: 100,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                        }
                    },
                    datalabels: {
                        formatter: (value, context) => {
                            return (value / 100) * 100 + "%";
                        },
                        color: "#000",
                        font: {
                            size: 10,
                            weight: 600
                        }
                    },
                },
            },
            plugins: [ChartDataLabels, "chartjs-plugin-annotation"],
        });

        const ctx2 = document.getElementById("tactical").getContext("2d");

        const tacticalChart = new Chart(ctx2, {
            type: "bar",
            data: {
                labels: [
                    "Aggression",
                    "Anticipation",
                    "Bravery",
                    "Composure",
                    "Concentration",
                    "Creativity",
                    "Decisions",
                    "Determination",
                    "Flair",
                    "Influence",
                    "Off the Ball",
                    "Positioning",
                    "Team Work",
                    "Work Rate",
                ],
                datasets: [{
                    label: "Technical",
                    data: [
                        <?php print $PlayerAttributes->aggression ? $PlayerAttributes->aggression : '0'; ?>,
                        <?php print $PlayerAttributes->anticipation ? $PlayerAttributes->anticipation : 0; ?>,
                        <?php print $PlayerAttributes->bravery ? $PlayerAttributes->bravery : 0; ?>,
                        <?php print $PlayerAttributes->composure ? $PlayerAttributes->composure : 0; ?>,
                        <?php print $PlayerAttributes->concentration ? $PlayerAttributes->concentration : 0; ?>,
                        <?php print $PlayerAttributes->creativity ? $PlayerAttributes->creativity : 0; ?>,
                        <?php print $PlayerAttributes->decisions ? $PlayerAttributes->decisions : 0; ?>,
                        <?php print $PlayerAttributes->determination ? $PlayerAttributes->determination : 0; ?>,
                        <?php print $PlayerAttributes->flair ? $PlayerAttributes->flair : 0; ?>,
                        <?php print $PlayerAttributes->influence ? $PlayerAttributes->influence : 0; ?>,
                        <?php print $PlayerAttributes->off_the_ball ? $PlayerAttributes->off_the_ball : 0; ?>,
                        <?php print $PlayerAttributes->positioning ? $PlayerAttributes->positioning : 0; ?>,
                        <?php print $PlayerAttributes->team_work ? $PlayerAttributes->team_work : 0; ?>,
                        <?php print $PlayerAttributes->work_date ? $PlayerAttributes->work_rate : 0; ?>,
                    ],
                    // backgroundColor: "#54b2fa",
                    backgroundColor: "#8693AB",
                    borderWidth: 1,
                    borderColor: "blue",
                    borderRadius: 14,

                }, ],
            },
            options: {
                topLeft: 5,
                topRight: 5,
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        ticks: {
                            // Include a dollar sign in the ticks
                            // callback: function(value, index, values) {
                            //     if(value%20==0) return value;
                            //     }
                            stepSize: 20,
                            font: {
                                size: 20,
                                weight: 600
                            },

                        },
                        grid: {
                            display: false,
                        },

                    },
                    x: {
                        grid: {
                            display: false,
                            backgroundColor: 'rgba(251, 85, 85, 0.4)'
                        },
                    },
                },
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 20
                            },
                        }
                    },
                    autocolors: false,
                    annotation: {
                        annotations: {
                            box1: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 0,
                                yMax: 10,
                                //     backgroundColor: '#eee',
                                //     borderColor: "#aaa"
                            },
                            box2: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 10,
                                yMax: 20,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box3: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 20,
                                yMax: 30,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box4: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 30,
                                yMax: 40,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box5: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 40,
                                yMax: 50,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box6: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 50,
                                yMax: 60,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box7: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 60,
                                yMax: 70,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box8: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 70,
                                yMax: 80,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box9: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 80,
                                yMax: 90,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box10: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 90,
                                yMax: 100,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                        }
                    },
                    datalabels: {
                        formatter: (value, context) => {
                            return (value / 100) * 100 + "%";
                        },
                        color: "#000",
                        font: {
                            size: 10,
                            weight: 600
                        }
                    },
                },
            },
            plugins: [ChartDataLabels, "chartjs-plugin-annotation"],
        });

        //physical
        const ctx3 = document.getElementById("physical").getContext("2d");

        const physicalChart = new Chart(ctx3, {
            type: "bar",
            data: {
                labels: [
                    "Acceleration",
                    "Agility",
                    "Balance",
                    "Jumping",
                    "Natural Fitness",
                    "Reflexes",
                    "Speed",
                    "Stamina",
                    "Strength",
                    "Goalkeeping",
                ],
                datasets: [{
                    label: "Technical",
                    data: [
                        <?php print $PlayerAttributes->acceleration ? $PlayerAttributes->acceleration : 0; ?>,
                        <?php print $PlayerAttributes->agility ? $PlayerAttributes->agility : 0; ?>,
                        <?php print $PlayerAttributes->balance ? $PlayerAttributes->balance : 0; ?>,
                        <?php print $PlayerAttributes->jumping ? $PlayerAttributes->jumping : 0; ?>,
                        <?php print $PlayerAttributes->natural_fitness ? $PlayerAttributes->natural_fitness : 0; ?>,
                        <?php print $PlayerAttributes->reflexes ? $PlayerAttributes->reflexes : 0; ?>,
                        <?php print $PlayerAttributes->speed ? $PlayerAttributes->speed : 0; ?>,
                        <?php print $PlayerAttributes->stamina ? $PlayerAttributes->stamina : 0; ?>,
                        <?php print $PlayerAttributes->strength ? $PlayerAttributes->strength : 0; ?>,
                        <?php print $PlayerAttributes->goalkeeping ? $PlayerAttributes->goalkeeping : 0; ?>,

                    ],
                    // backgroundColor: "#54b2fa",
                    backgroundColor: "#8693AB",
                    // backgroundColor: "#e7e9eb",
                    borderWidth: 1,
                    borderColor: "blue",
                    borderRadius: 14,
                }, ],
            },
            options: {
                topLeft: 5,
                topRight: 5,
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        ticks: {
                            // Include a dollar sign in the ticks
                            // callback: function(value, index, values) {
                            //     if(value%20==0) return value;
                            //     }
                            stepSize: 20,
                            font: {
                                size: 20,
                                weight: 600
                            },

                        },
                        grid: {
                            display: false,
                        },

                    },
                    x: {
                        grid: {
                            display: false,
                            backgroundColor: 'rgba(251, 85, 85, 0.4)'
                        },
                    },
                },
                plugins: {
                    legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            font: {
                                size: 20
                            },
                        }
                    },
                    autocolors: false,
                    annotation: {
                        annotations: {
                            box1: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 0,
                                yMax: 10,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box2: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 10,
                                yMax: 20,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box3: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 20,
                                yMax: 30,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box4: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 30,
                                yMax: 40,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box5: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 40,
                                yMax: 50,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box6: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 50,
                                yMax: 60,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box7: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 60,
                                yMax: 70,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box8: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 70,
                                yMax: 80,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                            box9: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 80,
                                yMax: 90,
                                backgroundColor: '#eee',
                                borderColor: "#aaa"
                            },
                            box10: {
                                // Indicates the type of annotation
                                drawTime: "beforeDatasetsDraw",
                                type: 'box',
                                xMin: -0.5,
                                xMax: 16.5,
                                yMin: 90,
                                yMax: 100,
                                backgroundColor: '#fff',
                                borderColor: "#aaa",
                            },
                        }
                    },
                    datalabels: {
                        formatter: (value, context) => {
                            return (value / 100) * 100 + "%";
                        },
                        color: "#000",
                        font: {
                            size: 16,
                            weight: 600
                        }
                    },
                },
            },
            plugins: [ChartDataLabels, "chartjs-plugin-annotation"],
        });
    </script>

@endsection
