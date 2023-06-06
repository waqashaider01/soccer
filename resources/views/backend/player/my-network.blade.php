@extends('backend.player.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/my-network.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 

@endpush
@section('content')
    <div class="my-network">

        {{-- @if (session('error'))
            <div class="alert alert-danger mb-0 py-1 text-center">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success mb-0 py-1 text-center">{{ session('success') }}</div>
        @endif --}}
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-following-tab" data-bs-toggle="tab" data-bs-target="#nav-invite"
                    type="button" aria-selected="false">
                    <i class="fas fa-user-friends "></i> Invite A Friend
                </button>
                <button class="nav-link " id="nav-followers-tab" data-bs-toggle="tab" data-bs-target="#nav-favourite"
                    type="button" aria-selected="true">
                    <i class="fas fa-user-plus"></i> Favourites
                </button>
                <button class="nav-link position-relative" id="nav-following-tab" data-bs-toggle="tab" data-bs-target="#nav-following"
                    type="button" aria-selected="false">
                    <i class="fas fa-user-friends"></i> Following
                     <span style="position:absolute;top:-5px;left:100px">02</span>
                </button>

                <button class="nav-link position-relative" id="nav-followers-tab" data-bs-toggle="tab" data-bs-target="#nav-followers"
                    type="button" aria-selected="true">
                    <i class="fas fa-user-plus"></i> Followers
                    <span style="position:absolute;top:-5px;left:100px">09</span>
                </button>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            {{-- Invite tab --}}
            <div class="tab-pane fade show active" id="nav-invite" role="tabpanel">
                <table class="table">
                    <thead class="bg-dark text-light">
                        <th>ID</th>
                        <th>Invite By</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                        @foreach ($invitaion as $invite)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>{{ $invite }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{-- Favourites tab --}}
            <div class="tab-pane fade" id="nav-favourite" role="tabpanel">
                <table class="table">
                    <thead class="bg-dark text-light">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($user_favourites as $favourite)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $favourite->name }}</td>
                                <td>{{ $favourite->email }}</td>
                                <td>
                                    <a href="{{ route('unfavourite', $favourite->id) }}" class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Following Tab --}}
            <div class="tab-pane fade" id="nav-following" role="tabpanel">
                <table class="table">
                    <thead class="bg-dark text-light">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($user_following as $following)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td>{{ $following->name }}</td>
                                <td>{{ $following->email }}</td>
                                <td>
                                    <a href="{{ route('unfollow', $following->id) }}" class="btn btn-danger">unfollow</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Follower tab --}}
            <div class="tab-pane fade " id="nav-followers" role="tabpanel">
                <table class="table">
                    <thead class="bg-dark text-light">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($user_follower as $follower)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $follower->name }}</td>
                                <td>{{ $follower->email }}</td>
                                <td>
                                    <a href="{{ route('removefollower', $follower->id) }}"
                                        class="btn btn-danger">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @endsection
