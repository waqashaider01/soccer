@extends("backend.agent.layouts.app")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
    <div class="activities">
        <div class="card">
            <div class="card-header">
                <h5 class="text-primary text-center">Activities</h5>
            </div>
            <div class="card-body">
                <div class="row activity">
                    <div class="col-md-10">
                        <div class="about">
                            <div class="img">
                                <img src="{{ asset('images/profile.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title">Muhammad Salman</h3>
                                <p class="description">
                                    Added Career History at U23
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="time">
                            5 days ago
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row activity">
                    <div class="col-md-10">
                        <div class="about">
                            <div class="img">
                                <img src="{{ asset('images/profile2.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title">Muhammad Salman</h3>
                                <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque,
                                    voluptatum?
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="time">
                            2 weeks ago
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row activity">
                    <div class="col-md-10">
                        <div class="about">
                            <div class="img">
                                <img src="{{ asset('images/profile3.jpg') }}" alt="">
                            </div>
                            <div class="content">
                                <h3 class="title">Muhammad Salman</h3>
                                <p class="description">
                                    <a href="">Louis Anetekhai</a> and <a href="">Muhammad Salman</a> followed <a
                                        href="">Khattak</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <p class="time">
                            1 day ago
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
