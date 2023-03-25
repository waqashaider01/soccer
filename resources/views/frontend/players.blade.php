@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/players.css') }}">
    <style>
        body {
            font-family: "Oswald", sans-serif;
        }

        .page-link {
            border-radius: 10px !important;
            border: 0px;
            font-weight: 700;
        }

        .page-item {
            border-radius: 9px
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
                <h1>Players</h1>
                <p>Showcase your talent to the world and maximize your opportunities</p>
            </div>
            <div class="container">
                <div class="search-box">
                    <form action="{{ route('players') }}" method="GET">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="position">Main Position</label><br>
                                        <select name="position" id="position">
                                            <option value="" disabled selected>Select One</option>
                                            <option value="striker">Striker</option>
                                            <option value="second-striker">Second Striker</option>
                                            <option value="right-forward">Right Forward</option>
                                            <option value="left-forward">Left Forward</option>
                                            <option value="attacking-midfielder">Attacking Midfielder</option>
                                            <option value="central-midfielder">Central Midfielder</option>
                                            <option value="right-midfielder">Right Midfielder</option>
                                            <option value="left-midfielder">Left Midfielder</option>
                                            <option value="defensive-midfielder">Defensive Midfielder</option>
                                            <option value="right-fullback">Right Fullback</option>
                                            <option value="left-fullback">Left Fullback</option>
                                            <option value="central-defender">Central Defender</option>
                                            <option value="right-wing-back">Right Wing Back</option>
                                            <option value="left-wing-back">Left Wing Back</option>
                                            <option value="goalkeeper">Goalkeeper</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="country">Country</label><br>
                                                {{-- <img src="/images/flags/{{$country->img}}" alt=""> --}}
                                                <select name="country" id="country">
                                                    <option value="" disabled selected>Select One</option>
                                                    @foreach ($countries as $country)
                                                        {{-- <img src="/images/flags/{{$country->img}}" alt=""> --}}
                                                        {{-- <div>test</div> --}}
                                                        <option value="{{ $country->id }}">
                                                            <iframe src="/images/flags/{{ $country->img }}" alt="">
                                                                {{ $country->name }}
                                                            </iframe>
                                                            {{-- <i src="/images/flags/{{$country->img}}"></i> --}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="status">Status</label><br>
                                                <select name="status" id="status">
                                                    <option value="" disabled selected>Select One</option>
                                                    <option value="in-contract">In Contract</option>
                                                    <option value="on-loan">On Loan</option>
                                                    <option value="free-agent">Free Agent</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
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
                                    <a type="submit" class="btn btn-danger" href="{{ route('players') }}">Reset</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--search-box end-->



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
                                            <div id="favbutton" class="favbutton">
                                                @if (auth()->user())
                                                    <i class="fa fa-heart fav @if (in_array(
                                                            $player->id,
                                                            auth()->user()->favorites_array())) already-fav @endif"
                                                        onclick="fav({{ $player->id }})" id="fav{{ $player->id }}"></i>
                                                @endif
                                            </div>
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



                    @if ($Players->hasPages())
                        {{ $Players->links('pagination') }}
                    @endif


                </div>
                <!--container end-->
        </section>
    </section>
    <script>
        function fav(fav_id) {
            let ele = document.getElementById('fav' + fav_id);
            //alert(fav_id);
            var data = {
                'fav_id': fav_id,
                '_token': '{{ csrf_token() }}',
            }
            $.ajax({
                type: "POST",
                url: "/favData",
                data: data,
                // dataType: "json",
                cache: false,
                success: function(result) {
                    console.log("response");
                    $('#fav' + fav_id).html(result);
                    //   ele.classList.add('already-fav');
                }
            });
        }
    </script>





@endsection
