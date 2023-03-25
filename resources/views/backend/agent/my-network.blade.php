@extends('backend.agent.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/my-network.css') }}">
@endpush
@section('content')
    <div class="my-network">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link" id="nav-following-tab" data-bs-toggle="tab" data-bs-target="#nav-following"
                    type="button" aria-selected="false">
                    <i class="fas fa-user-friends"></i> Following
                </button>

                <button class="nav-link active" id="nav-followers-tab" data-bs-toggle="tab" data-bs-target="#nav-followers"
                    type="button" aria-selected="true">
                    <i class="fas fa-user-plus"></i> Followers
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade" id="nav-following" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card following-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="img">
                                            <img src="{{ asset('images/profile.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="about">
                                            <h5 class="name"><a href="">Louis Anetekhai</a></h5>
                                            <p class="title">Player</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="request-section">
                                            <button class="unfollow-btn">Unfollow</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card following-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="img">
                                            <img src="{{ asset('images/profile.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="about">
                                            <h5 class="name"><a href="">Louis Anetekhai</a></h5>
                                            <p class="title">Player</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="request-section">
                                            <button class="unfollow-btn">Unfollow</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card following-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="img">
                                            <img src="{{ asset('images/profile.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="about">
                                            <h5 class="name"><a href="">Louis Anetekhai</a></h5>
                                            <p class="title">Player</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="request-section">
                                            <button class="unfollow-btn">Unfollow</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- edit_profile end --}}

            <div class="tab-pane fade show active" id="nav-followers" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card following-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="img">
                                            <img src="{{ asset('images/profile.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="about">
                                            <h5 class="name"><a href="">Louis Anetekhai</a></h5>
                                            <p class="title">Player</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="request-section">
                                            <button class="accept-btn">Accept</button>
                                            <button class="remove-btn">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card following-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="img">
                                            <img src="{{ asset('images/profile.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="about">
                                            <h5 class="name"><a href="">Louis Anetekhai</a></h5>
                                            <p class="title">Player</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="request-section">
                                            <button class="accept-btn">Accept</button>
                                            <button class="remove-btn">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card following-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="img">
                                            <img src="{{ asset('images/profile.jpg') }}" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="about">
                                            <h5 class="name"><a href="">Louis Anetekhai</a></h5>
                                            <p class="title">Player</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="request-section">
                                            <button class="accept-btn">Accept</button>
                                            <button class="remove-btn">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- career_match_data end --}}

        </div>
    @endsection
