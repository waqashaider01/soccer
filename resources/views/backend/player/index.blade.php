@extends("backend.player.layouts.app")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">

@endpush

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="profile">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card info">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-4 mt-0">
                                                <div class="icon profile-views-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="text">
                                                    <h5 class="title">Profile Views</h5>
                                                    <h3 class="description">{{ $views->reads ?? '0' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- info-card end --}}
                            </div>
                            <div class="col-md-3">
                                <div class="card info">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-4 mt-0">
                                                <div class="icon followers-icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="text">
                                                    <h5 class="title">Followers</h5>
                                                    <h3 class="description">{{ $follower ?? '0' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- info-card end --}}
                            </div>
                            <div class="col-md-3">
                                <div class="card info">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-4 mt-0">
                                                <div class="icon following-icon">
                                                    <i class="fas fa-user-plus"></i>
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="text">
                                                    <h5 class="title">Following</h5>
                                                    <h3 class="description">{{ $follower ?? '0' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- info-card end --}}
                            </div>
                            <div class="col-md-3">
                                <div class="card info">
                                    <div class="card-body">
                                        <div class="row gx-3">
                                            <div class="col-4 mt-0">
                                                <div class="icon favorites-icon">
                                                    <i class="fas fa-heart"></i>
                                                </div>
                                            </div>

                                            <div class="col-7">
                                                <div class="text">
                                                    <h5 class="title">Favorites</h5>
                                                    <h3 class="description">{{ $favourtes ?? '0' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- info-card end --}}
                            </div>

                            <div class="col-md-3">
                                <div class="card info2">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-4 mt-0">
                                                <div class="icon">
                                                    <i class="fas fa-medal"></i>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="text">
                                                    <h5 class="title">Account Type</h5>

                                                    <h3 class="description">{{ $views->status ?? 'Free trial' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- info-card2 end --}}
                            </div>
                            <div class="col-md-3">
                                <div class="card info2">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-4 mt-0">
                                                <div class="icon">
                                                    <i class="fas fa-calendar-plus"></i>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="text">
                                                    <h5 class="title">Date Joined</h5>
                                                    <h3 class="description">
                                                        {{ $views->contract_start_date ?? ' ' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- info-card2 end --}}
                            </div>
                            <div class="col-md-3">
                                <div class="card info2">
                                    <div class="card-body">
                                        <div class="row g-0">
                                            <div class="col-4 mt-0">
                                                <div class="icon">
                                                    <i class="fas fa-calendar-times"></i>
                                                </div>
                                            </div>

                                            <div class="col-8">
                                                <div class="text">
                                                    <h5 class="title">Expiry Date</h5>
                                                    <h3 class="description">
                                                        {{ $views->contract_expiry_date ?? ' ' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>{{-- info-card2 end --}}
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row g-2 data-row">
            <div class="col-md-5 child">
                <div class="card map">
                    <p>Welcome to SoccerWorldLink</p>
                    <img src="{{ asset('images/dashboard/map.png') }}" alt="">
                    <p>...Expanding Your Global Reach</p>
                </div>
            </div>
            <div class="col-md-4 child">
                <div class="invite-friend">
                    <div class="description">
                        <p>Invite Your Friends</p>
                        <p> and </p>
                        <p>you will both get reward</p>
                        <p>points when they subscribe</p>
                    </div>
                    <a class="btn" href="{{ route('invite') }}">Invite a Friend</a>
                </div>
            </div>
            <div class="col-md-3 child">
                <div class="card flex-fill w-100 h-100">
                    <div class="card-header">
                        <h5 class="card-title text-uppercase text-center mb-0">Profile Completeness</h5>


                    </div>
                    <div class="card-body d-flex">
                        <div class="align-self-center w-100">
                            <div
                                style="position: relative; display: flex;justify-content: center;align-items: center;flex-direction: column;  ">
                                <div style="position: relative; display: flex; flex-direction:column; justify-content: center; align-items: center"
                                    class="text-danger">
                                    {{-- <div id="middle-circle"></div> --}}
                                    {{-- <div id="progress-spinner"></div> --}}
                                    <div id="progress"></div>
                                    {{-- progress-bar end --}}
                                    <table class="table table-bordered mt-3 profile-completeness-table">
                                        <tbody>
                                            <tr class="completed">
                                                <td class="check">Account Creation</td>
                                                <td class="text-end">10%</td>
                                                <input type="hidden" value="10" id="account">
                                            </tr>
                                            <tr class="{{ $profileimages > 0 ? 'completed' : '' }}">
                                                <td class="check">Profile Image </td>
                                                <td class="text-end percent">15%</td>
                                                <input class="c" type="hidden" value="15" id="p_image">

                                            </tr>
                                            <tr class="{{ $attributes > 0 ? 'completed' : '' }}">
                                                <td class="check">Attributes</td>
                                                <td class="text-end percent">25%</td>
                                                <input class="c" type="hidden" value="25" id="attribute">

                                            </tr>
                                            <tr class="{{ $city > 0 ? 'completed' : '' }}">
                                                <td class="check">City</td>
                                                <td class="text-end percent">10%</td>
                                                <input class="c" type="hidden" value="10" id="city">

                                            </tr>
                                            <tr class="{{ $country > 0 ? 'completed' : '' }}">
                                                <td class="check">Country</td>
                                                <td class="text-end percent">10%</td>
                                                <input class="c" type="hidden" value="10" id="country">

                                            </tr>
                                            <tr class="{{ $varification > 0 ? 'completed' : '' }}">
                                                <td class="check">Verification</td>
                                                <td class="text-end percent">30%</td>
                                                <input class="c" type="hidden" value="30" id="verification">

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- activities
        <div class="dashboard-activities card">
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
                            <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                                Atque,
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
                                <a href="">Louis Anetekhai</a> and <a href="">Muhammad Salman</a> followed
                                <a href="">Khattak</a>
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

    </div> --}}
            @endsection

            @push('scripts')
                @foreach ($verified as $data)
                    @if ($data->status > 0)
                        <script>
                            var per;
                            var data = document.querySelectorAll('.completed input')
                            let percentValue = document.getElementById('middle-circle')
                            console.log()
                            $(document).ready(function() {
                                console.log("this is script")
                                let bars = document.querySelectorAll(".completed input");
                                let sum = 0
                                bars.forEach(element => {
                                    let a = parseInt(element.value)
                                    sum += a

                                });
                                per = sum / 100
                                var bar = new ProgressBar.Circle(progress, {
                                    svgStyle: {
                                        width: '100px',
                                        height: '100px'
                                    },
                                    color: '#aaa',
                                    strokeWidth: 10,
                                    trailWidth: 10,
                                    easing: 'easeInOut',
                                    duration: 1400,
                                    text: {
                                        autoStyleContainer: false
                                    },
                                    from: {
                                        color: '#aaa',
                                        width: 5
                                    },
                                    to: {
                                        color: '#1DBF73',
                                        width: 10
                                    },
                                    step: function(state, circle) {
                                        circle.path.setAttribute('stroke', state.color);
                                        circle.path.setAttribute('stroke-width', state.width);

                                        var value = Math.round(circle.value() * 100);
                                        if (value === 0) {
                                            circle.setText('');
                                        } else {
                                            circle.setText(value + '%');
                                        }

                                    }
                                });

                                bar.animate(per);
                            });
                            console.log(per)
                        </script>
                    @endif
                @endforeach
            @endpush
