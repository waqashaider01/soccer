@extends('backend.agent.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/activity.css') }}">
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
                                                    @if (isset($views))
                                                        <h3 class="description">{{ $views->reads ?? '0' }}</h3>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                </div>
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
                                                    <h3 class="description">{{ $follower ?? '0'}}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                    <h3 class="description">{{ $favourites ?? '0' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                     <h3 class="description">{{ $views->status ?? 'unactive' }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                  @if(isset($views->contract_start_date))
                                                        <h3 class="description">{{ $views->contract_start_date }}</h3>
                                                  @else
                                                    <h3 class="description">not join</h3>
                                                  @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                    @if(isset($views->contract_expiry_date))
                                                     <h3 class="description">{{ $views->contract_expiry_date }}</h3>
                                                     @else
                                                       <h3 class="description">not joined</h3>
                                                     
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="row g-0 data-row">
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
                                style=" position: relative;  display: flex;  justify-content: center;
                                                                                                                                                                                                                                                                                                                                                                align-items: center;
                                                                                                                                                                                                                                                                                                                                                                flex-direction: column;
                                                                                                                                                                                                                                                                                                                                                                ">
                                <div
                                    style="
                                                                                                                                                                                                                                                                                                                                                                    position: relative;
                                                                                                                                                                                                                                                                                                                                                                    display: flex;
                                                                                                                                                                                                                                                                                                                                                                    justify-content: center;
                                                                                                                                                                                                                                                                                                                                                                    align-items: center;
                                                                                                                                                                                                                                                                                                                                                                    ">
                                    <div id="middle-circle"></div>
                                    <div id="progress-spinner"></div>
                                </div>

                                <div style="display:none;">
                                    <button type="button" id="incbtn">+</button>
                                    <button type="button" id="decbtn">-</button>
                                </div>
                            </div>

                            {{-- progress-bar end --}}
                            <table class="table table-bordered mt-3 profile-completeness-table">
                                <tbody>
                                    <tr class="completed">
                                        <td class="check">Account Creation</td>
                                        <td class="text-end">10%</td>
                                    </tr>
                                    <tr class="{{ $verifiedstyle > 0 ? 'completed' : '' }}">
                                        <td class="check">Profile Image</td>
                                        <td class="text-end">15%</td>
                                    </tr>
                                    <tr class="{{ $verifiedstyle > 0 ? 'completed' : '' }}">
                                        <td class="check">Attributes</td>
                                        <td class="text-end">25%</td>
                                    </tr>
                                    <tr class="{{ $verifiedstyle > 0 ? 'completed' : '' }}">
                                        <td class="check">City</td>
                                        <td class="text-end">10%</td>
                                    </tr>
                                    <tr class="{{ $verifiedstyle > 0 ? 'completed' : '' }}">
                                        <td class="check">Country</td>
                                        <td class="text-end">10%</td>
                                    </tr>
                                    <tr class="{{ $verifiedstyle > 0 ? 'completed' : '' }}">
                                        <td class="check">Verification</td>
                                        <td class="text-end">30%</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--{{-- activities --}}-->
        <div class="dashboard-activities card">

        <h3 class="font-weight-bolder font-font-weight-bold">Recent Activities</h3>
        <hr>
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
    </div>
    @endsection
    
    @push('scripts')
    <script>
        var progress = 30;

        document
            .getElementById("incbtn")
            .addEventListener("click", incrementProgress);
        document
            .getElementById("decbtn")
            .addEventListener("click", decrementProgress);

        function incrementProgress() {
            if (progress != 100) {
                progress = progress + 10;
                console.log(progress);
                setProgress();
            }
        }

        function decrementProgress() {
            if (progress != 0) {
                progress = progress - 10;
                console.log(progress);
                setProgress();
            }
        }

        function setProgress() {
            document.getElementById("progress-spinner").style.background =
                "conic-gradient(#bf3637 " +
                progress +
                "%,rgb(242, 242, 242) " +
                progress +
                "%)";

            document.getElementById("middle-circle").innerHTML =
                progress.toString() + "%";
        }

        window.onload = function() {
            setProgress();
        };
    </script>
@endpush