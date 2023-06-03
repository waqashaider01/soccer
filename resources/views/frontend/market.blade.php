@extends("frontend.layouts.app")
@push('styles')
<link rel="stylesheet" href="{{ asset('css/market.css') }}">
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
@endpush
@section('content')
<section class="market-section">
    <section class="market-hero ">
    </section>
    <section class="market">
        <div class="heading">
            <h1>Market</h1>
            <p>Promote your players, announce your events and discover new opportunities</p>
        </div>
        <div class="container">
            <div class="search-box">
                <form action="{{ route('market') }}" method="GET">

                    <div class="row">
                        <div class="col-md-4 col-lg-2">
                            <label for="type">Type</label><br>
                            <select name="type" id="type"  style="width:100% !important">
                                <option value="" disabled selected>All</option>
                                <option value="club-seeking-players">Club Seeking Players</option>
                                <option value="trials">Trials/Tryouts</option>
                                <option value="request-a-player">Request A Player</option>
                                <option value="recommend-a-player">Recommend A Player</option>
                                <option value="academy">Academy</option>
                                <option value="camps">Camps</option>
                                <option value="partnership-request">Partnership Request</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-2">
                            <label for="country" class="ps-4">Country</label><br>



                            <div class=" ">
                                <a style="width:100% !important;  cursor:default !important; background-color: white !important;
                                        color: black;" class="btn btn-secondary  dropdown-toggle" href="#"
                                    role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select One
                                </a>
                                <ul name="country" id="country" class="dropdown-menu" style=""
                                    aria-labelledby="dropdownMenuLink">
                                    @foreach ($countries as $country)
                                    <li><a class="dropdown-item" href="#">
                                            <img  
                                                src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                alt="{{ $country->name }}"> {{ $country->name }}
                                        </a></li>
                                    @endforeach
                                </ul>
                            </div>

                            {{-- <select name="country" id="country">
                                <option value="" disabled selected>Select One</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}">


                                    {{ $country->name }}
                                </option>


                                @endforeach
                            </select> --}}

                        </div>
                        <div class="col-md-4 col-lg-2" >
                            <label for="sort-by">Sort by</label><br>
                            <select name="sort-by" id="sort-by" style="width:100% !important">
                                <option value="volvo" disabled selected>Select One</option>
                                <option value="newest">Newest</option>
                                <option value="oldest">Oldest</option>
                            </select>
                        </div>


                        <div class="col-md-4 col-lg-2 mt-3 mt-md-0">
                            <div class="search-btn">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-2 mt-3 mt-md-0">
                            <div class="search-btn">
                                <a type="submit" class="btn btn-danger" href="{{ route('market') }}">Reset</a>
                            </div>
                        </div>

                    </div>


                </form>
            </div>
            <!--search-box end-->
            <div class="market-list">
                @foreach ($recommendPlayers as $agent)
                <div class="market-card mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Recommend a player</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->country_id)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ $agent->user->name }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'recommend-a-player')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                                {{-- {{ $applications }} --}}
                                {{-- @foreach ($applications as $application)
                                @if ($application->market_type == 'recommend-a-player')
                                {{ $application->id }}
                                @else
                                0
                                @endif
                                @endforeach --}}
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Academy Market -->
                @foreach ($academies as $agent)
                <div class="market-card market-academy mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Academy</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->country_id)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ $agent->user->name }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'academy')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Camps Market -->
                @foreach ($camps as $agent)
                <div class="market-card market-camps mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Camps</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->country_id)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'camps')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Clubs Market -->
                @foreach ($clubs as $agent)
                <div class="market-card market-clubs mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Club Seeking Player</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->country_id)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ $agent->user->name }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'club-seeking-player')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Partnership Requests Market -->
                @foreach ($partnershipRequests as $agent)
                <div class="market-card market-partnership-requests mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Partnership Requests</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->originating_partner_country)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ $agent->user->name }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'partnership-requests')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Request Players Market -->
                @foreach ($requestPlayers as $agent)
                <div class="market-card market-request-players mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Request Players</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->country_id)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ $agent->user->name }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'request-players')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--Trials Market -->
                @foreach ($trials as $agent)
                <div class="market-card market-trials mb-4">
                    <div class="ribbon">
                        <p>Featured</p>
                    </div>
                    <div class="row top">
                        <div class="col-12">
                            <h4>Trials</h4>
                        </div>
                    </div>
                    <div class="row middle">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <div class="description">
                                        {{ $agent->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Location</b>
                                        <p>
                                            @foreach ($countries as $country)
                                            @if ($country->id == $agent->country_id)
                                            <span class="flag-img">
                                                <img src="{{ asset('images/flags/'. $country->name . '.png') }}"
                                                    alt="{{ $country->name }}"> {{ $country->name }}
                                            </span>,
                                            @endif
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>Start Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->start_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->start_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="item">
                                        <b>End Date/Time</b>
                                        <p>
                                            {{ date('M. d, Y', strtotime($agent->end_date)) }}
                                            /
                                            {{ date('h:i A', strtotime($agent->end_time)) }} GMT
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="details">
                                <a href="{{ route('view-market-detail', [$agent->slug, $agent->id]) }}">View Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="row bottom">
                        <div class="col-md-2">
                            <b>Posted By: {{ $agent->user->name }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Category: {{ ucfirst($agent->user->type) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Date Posted: {{ date('M. d, Y', strtotime($agent->created_at)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Expiry Date: {{ date('M. d, Y', strtotime($agent->expiry_date)) }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Views: {{ $agent->reads }}</b>
                        </div>
                        <div class="col-md-2">
                            <b>Applications:
                                @php $count=0; foreach ($applications as $application) { if($application->market_type
                                == 'trials')
                                {
                                $count = $count+1;
                                }
                                }
                                echo $count;
                                @endphp
                            </b>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--agent-card-->
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled text-white mx-2">
                                    <a class="page-link previous text-white"><i class="fas fa-chevron-left text-white"></i><span class="text-white mx-2">Previous</span></a>
                                </li>
                                
                                <li class="page-item mx-2">
                                    <a class="page-link next" href="#"> <span class="mx-3">Next</span> <i class="fas fa-chevron-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                        <!--pagination end-->
                    </div>
                </div>  
            </div>
            <!--market-list end-->
        </div>
        <!--container end-->
    </section>
</section>
</section>
@endsection

@push('scripts')
@endpush