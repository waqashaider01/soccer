@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/agents.css') }}">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
@endpush
@section('content')
    <section class="agents-section">
        <section class="agents-hero">
        </section>
        <section class="agents">
            <div class="heading">
                <h1>Agents</h1>
                <p>Manage your players and discover new talents worldwide</p>
            </div>
            <div class="container">
                <div class="search-box">
                    <form action="{{ route('agents') }}" method="GET">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="type">Category</label><br>
                                        <select name="type" id="type">
                                            <option value="" disabled selected>Select One</option>
                                            <option value="scout">Scout</option>
                                            <option value="coach">Coach</option>
                                            <option value="club">Club</option>
                                            <option value="intermediary">Intermediary</option>
                                            <option value="academy">Academy</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="nationality">Nationality</label><br>
                                                <select name="nationality" id="nationality">
                                                    <option value="" disabled selected>Select One</option>
                                                    @if ($countries != null)
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="country">Countries of operation</label><br>
                                                <select name="country" id="country">
                                                    <option value="" disabled selected>Select One</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 offset-1">
                                                <label for="name">Name</label><br>
                                                <input type="text" id="name" name="name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="search-btn">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="search-btn">
                                    <a type="submit" class="btn btn-danger" href="{{ route('agents') }}">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--search-box end-->
                <div class="agents-list">
                    @if (count($agents) > 0)
                        @foreach ($agents as $agent)
                            @php
                                $name = explode(' ', $agent->name);
                            @endphp
                            <div class="agents-card">
                                <div class="ribbon">
                                    <p>Featured</p>
                                </div>
                                <div class="row top">
                                    <div class="col-md-2">
                                        <div class="img">
                                            <i class="fas fa-heart"></i>
                                            <img src="{{ asset(strtolower($agent->profile_img)) }}"
                                                class="img-fluid rounded-start" alt="{{ $agent->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-7 ">
                                        <div class="row ">
                                            <div class="col-md-4">
                                                <h3 class="firstname">{{ $name[0] }}</h3>
                                                <h2 class="lastname">{{ $name[1] }} <span><i
                                                            class="fas fa-check-circle"></i>Verified</span></h2>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="content">
                                                    <b>Category</b>
                                                    <p>{{ ucfirst($agent->type) }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="content">
                                                    <b>Countries of Operation</b>
                                                    <p><img src="{{ asset('images/flags/' . $agent->country . '.png') }}"
                                                            alt="...">
                                                        {{ $agent->country }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile-btn">
                                            <a href="{{ route('agent.view-profile', [$agent->type, $agent->id]) }}">View
                                                Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bottom">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="content">
                                                    <b><i class="fas fa-user-plus"></i> Following: </b>
                                                    <span>{{ $count1 = \DB::table('followers')->where('follower', '=', $agent->id)->count() }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="content">
                                                    <b><i class="fas fa-users"></i> Followers: </b>
                                                    <span>{{ $count1 = \DB::table('followers')->where('following', '=', $agent->id)->count() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="content views">
                                            <b><i class="fas fa-eye"></i> Views: </b>
                                            <span>{{ $agent->reads }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>{{-- agents-card end --}}
                        @endforeach
                    @else
                        <div class="agents-card" style="bottom: 10px;">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 style="margin-top: 20px; margin-bottom: 15px;">No Agents Found</h3>
                                </div>
                            </div>
                        </div>
                    @endif

                    {!! $agents->links('pagination') !!}

                </div>
                <!--agents-list end-->
            </div>
            <!--container end-->
        </section>
    </section>
@endsection
