@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/players.css') }}">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }
    </style>
@endpush
@section('content')

    {{-- <script src="js/msdropdown/jquery.dd.min.js" type="text/javascript"></script> --}}

    <section class="players-section">
        <section class="players-hero">
        </section>
        <section class="players">
            <div class="heading">
                <h1>Favorite Players</h1>
                <p>Showcase your talent to the world and maximize your opportunities</p>
            </div>
            <div class="container">



                <div class="players-list">
                    @if (count($Players) > 0)
                        @foreach ($Players as $player)
                            @php
                                $name = explode(' ', $player->user->name);
                            @endphp
                            <div class="players-card">
                                <div class="ribbon">
                                    <p>Featured</p>
                                </div>
                                <div class="row top">
                                    <div class="col-md-2">
                                        <div class="img">
                                            <img src="{{ asset($player->cover_img) }}" class="img-fluid rounded-start"
                                                alt="{{ $player->user->name }}">
                                            {{-- <input type="hidden" value="{{ $player->id }}" name="fav_id" id="fav_id"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3 class="firstname">{{ $name[0] }}</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <h2 class="lastname">{{ $name[1] }}
                                                    <span><i class="fas fa-check-circle"></i>Verified</span>
                                                </h2>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="content">
                                                    <b>Age</b>
                                                    <p>{{ $player->age }} Years</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="content">
                                                    <b>Main Position</b>
                                                    <p>{{ ucfirst($player->main_position) }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="content">
                                                    <b>Country</b>
                                                    <p><img src="{{ asset('images/flags/' . $player->country->name . '.png') }}"
                                                            alt="{{ $player->country->name }}">
                                                        {{ $player->country->name }}
                                                    </p>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile-btn">
                                            <a href="/players/{{ $player->id }}/profile">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row bottom">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="content">
                                                    <b><i class="fas fa-ruler-vertical"></i> Height: </b>
                                                    <span>{{ $player->height }}cm</span>
                                                    <span> / {{ $player->feet }}ft {{ $player->inches }}in</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="content">
                                                    <b><i class="fas fa-weight"></i> Weight: </b>
                                                    <span>{{ $player->weight }}kg</span>
                                                    <span> / {{ $player->pounds }}lbs</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="content">
                                                    <b><i class="fas fa-info-circle"></i> Status: </b>
                                                    <span>{{ str_replace('-', ' ', ucwords(strtolower($player->status))) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="content views">
                                            <b><i class="fas fa-eye"></i> Views: </b>
                                            <span>{{ $player->reads }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>{{-- players-card end --}}
                        @endforeach
                    @else
                        <div class="players-card" style="bottom: 10px;">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 style="margin-top: 20px; margin-bottom: 15px;">No Players Found</h3>
                                </div>
                            </div>
                        </div>
                    @endif

                    {!! $Players->links('pagination') !!}

                </div>
                <!--container end-->
        </section>
    </section>
@endsection
