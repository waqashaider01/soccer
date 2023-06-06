@extends('frontend.layouts.app')
@push('styles')

    <link rel="stylesheet" href="{{ asset('css/profile/agent.css') }}">
    <style>
        .players-portfolio .players-card {
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    @php
        $name = explode(' ', $agent->user->name);
    @endphp
    <section class="agents-profile-section">
        <section class="agents-profile-hero">
            <div class="img img-cover">
                {{-- <img src="{{ asset($agent->cover_img) }}" alt="{{ $agent->cover_image }}"> --}}
                {{-- <img src="{{ asset(strtolower($agent->cover_img)) }}" alt="{{ $agent->cover_image }}"> --}}
            </div>
        </section>
        <div class="container-fluid px-3 px-md-5">
            <div class="agents-profile">
                <div class="profile">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dp">
                                <div class="img">
                                    <img src="{{ asset(strtolower($agent->profile_img)) }}" alt="{{ $agent->user->name }}">
                                     <i class="fa-regular fa-bookmark float-end" style="font-size:30px; position:absolute;bottom:5px; right:10px"></i>
                               
                                <div class="d-flex justify-content-between meta my-4">
                                    <div class=" ">
                                        <span>Views</span><br>
                                       <span>{{ $agent->reads ?? '' }}</span>
                                    </div>
                                    <div class=" ">
                                       <span>Follwers</span><br>
                                        <span>{{ $count1 = \DB::table('followers')->where('following', '=', $id)->count() }}</span>
                                    </div>
                                   <div class=" ">
                                        <span>Following</span><br>
                                        <span>{{ $count1 = \DB::table('followers')->where('follower', '=', $id)->count() }}</span>
                                   </div>
                                </div>
                                    </div>
                               
                            </div>
                        </div>
                        <div class="col-md-7">
                          <div class="row">
                              <div class="col-md-4">
                                <ul class="data">
                                <li lass="firstname">{{ $name[0] }}</li>
                                <li class="lastname">{{ $name[1] }} <span><i
                                            class="fas fa-check-circle"></i>Verified</span>
                               </li>
                                <li>Nationality: <br> {{ $agent->nationality }}  <img
                                        src="{{ asset('images/flags/' . $agent->nationality . '.png') }}"
                                       class="country-flag"></li>
                             
                                </ul>
    
                            </div>
                                <di class="col-md-8">
                           <div class="agent-type">
                                <h4 class="text-center">Intermediary</h4>
                            </div>

                            <div class="row">
                                <div class="col-md-6 p-0 m-0">
       <p><strong>Clubs Name</strong></p>
       <p><strong class="d-flex">Pluz 11 FC,Madrid,Pakistan <img
                                       src="{{ asset('./images/flags/Pakistan.png') }}"
                                       class="country-flag pakistan-flags"></strong></p>


                                </div>

                                  <div class="col-md-6">
                             Profile Link: <br> <a href="#" class="text-danger">https://http://127.0.0.1:8000/agent</a> 
                                 </div>

                            </div>

                          </div>
                        </di>

                    <div class="col-md-12 p-0 m-0">
                         <div class="about">
                            <div class="d-flex flex-column">
                              
                                    <div class="">
                                <strong>    About Me</strong>
                            
                            </div>
                            
                                <div class="descriptio">
                                  <p style="font-weight:550">  sdfhsdjgsdhghasdfjas asdfbasjf sdfajfas dfashdfa sdfbasdfasdfhasf asdfasdfas fasdfasfd asdfadf afdasfa fasdfiasdf as,dfiadasdf FkifS Fsfusdf as dfa AAMIR S0HAil.



                                  {{ $agent->about_me }}
                                  </p>

                            
                                </div>
                        
                        </div>
                        </div>
    
                    </div>
                        </div>
                    

                        <div class="col-md-2">
                            <div class="dropdown">
                                @php
                                    $k = 0;
                                @endphp
                                @if (is_array($followstatus) || is_object($followstatus))
                                    @foreach ($followstatus as $item)
                                        {{-- <p>{{$item['id']}}</p> --}}
                                        @if (isset($item['id']))
                                            <a href="{{ route('unfollow', $id) }}" type="button" class="btn option">Unfollow</a>
                                            @php
                                                $k = 1;
                                            @endphp
                                        @endif
                                    @endforeach
                                @else
                                    <p>Error: follow status is not an array or an object.</p>
                                @endif


                                @if ($k == 0)
                                    <a href="{{ route('follow', $id) }}" type="button" class="btn option">follow</a>
                                @endif
                                {{-- @if ($count = \DB::table('followers')->where('follower', '=', $agent->id && 'following', '=', $id))
                            <a href="{{ route('follow', $id) }}" type="button" class="btn option">Unfollow</a>
                            @else

                            <a href="{{ route('follow', $id) }}" type="button" class="btn option">Follow</a>
                            @endif --}}


                                <a href="{{ route('report', $id) }}" type="button" class="btn option">Report</a>
                                <a href="/messages/{{ $id }}" class="option" style="color: black !important">Send
                                    Message</a>
                                {{-- <select name="report" id="report" class="option">
                                <option value="" selected disabled>Report</option>
                                <option value="spam">Spam</option>
                                <option value="abuse">Abuse or Harassment</option>
                                <option value="voilence">Violence or Physical Harm</option>
                                <option value="offensive">Rude or Offensive</option>
                                <option value="inappropriate">Inappropriate Content</option>
                                <option value="other">Other</option>
                            </select> --}}
                                @isset(Auth::user()->type)
                                    @if (Auth::user()->type == 'admin')
                                        <a href="{{ route('block', $id) }}" type="button" class="btn option">Block</a>
                                    @endif
                                @endisset
                            </div>
                        </div>
                    </div>
                    <hr>
                                <div class="about px-3">
                        <div class="d-lg-flex justify-content-between" style=" padding: 10px 0;">
                            

                            <span class="heading"><a class="btn   mt-2 mt-lg-0" href="#contryoperation" style="border-left:2px solid #E6E6E6">
                                Countries of Oprtaion
                                </a></span>

                            <span class="heading"><a class="btn  mt-2 mt-lg-0" href="#player-protfolio" style="border-left:2px solid #E6E6E6">
                                    players portfolio
                                </a></span>

                            <span class="heading"><a class="btn   mt-2 mt-lg-0" href="#transfer-history" style="border-left:2px solid #E6E6E6">
                                Transfer History
                                </a></span>
 
                            <span class="heading"><a class="btn   mt-2 mt-lg-0" href="#agentAchievements" style="border-left:2px solid #E6E6E6">
                                    Achievements
                                </a></span>

                            <span class="heading"><a class="btn mt-2 mt-lg-0" href="#CONTACTINFORMATION" style="border-left:2px solid #E6E6E6">
                                  Contact Information
                                </a></span>

                          
                        </div>
                    </div>
                   
                </div>
                <div class="countries-of-operation" id="contryoperation">
                    <div class="gray-heading">
                        <h3 class="">Countries of Operation</h3>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12">
                                @if (is_object($agent) && property_exists($agent, 'countries_of_operation') && is_array(json_decode($agent->countries_of_operation)))
                                    @foreach (json_decode($agent->countries_of_operation) as $operation)
                                        <span>{{ $operation }} <img src="{{ asset('images/flags/' . $operation . '.png') }}" alt="{{ $operation }}">,</span>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>{{-- countries-of-operation end --}}
                <div class="players-portfolio" id="player-protfolio">
                    <div class="gray-heading">
                        <h3>players portfolio</h3>
                    </div>
                    @if (count($playersPortfolio) > 0)
                        <div class="players-card">
                            <div class="row top">
                                @foreach ($playersPortfolio as $portfolio)
                                    <div class="card col-md-4 col-lg-3 py-3">
                                        <img class="card-img-top w-25 align-self-center" src="{{ asset($portfolio->profile_img) }}"
                                            alt="{{ $portfolio->player->name }}">
                                        <div class="card-body">

                                            <p class="card-title" style="color:#185F7C;font-weight:800">{{ $portfolio->player->name }}</p>

                                          <h6 class="card-title font-weight-bolder">Right midle feilder Dumy data</h6>



                                            
                                            <a href="{{ route('player-profile-detail', $portfolio->player_id) }}"
                                                class="btn btn-danger">View Profile</a>
                                        </div>
                                    </div>
                                @endforeach

<div class="row my-2">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
        <button type="button" class="btn btn-danger btn-lg">Show More</button>
    </div>
    <div class="col-md-4"></div>


</div>
                                
                            </div>
                        </div>{{-- players-card end --}}
                    @else
                        <div class="players-card">
                            <div class="row top">
                                <div class="col-md-12">
                                    <h3 class="firstname">No Players Found</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>{{-- palyers-portfolio end --}}
                <div class="transfer-history" id="transfer-history">
                    <div class="gray-heading">
                        <h3>Transfer history</h3>
                    </div>
                    <div class="content table-responsive">
                        @if (count($transferHistory) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Player Name</th>
                                        <th scope="col">From</th>
                                        <th scope="col">To</th>
                                        <th scope="col">Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transferHistory as $history)
                                        <tr>
                                            <th scope="row">{{ $history->id }}</th>
                                            <td>{{ $history->player->name }}</td>
                                            <td>{{ $history->club_from }}</td>
                                            <td>{{ $history->club_to }}</td>
                                            <td>{{ ucfirst($history->transfer_type) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="players-card text-center">
                                <div class="row top">
                                    <div class="col-md-12">
                                        <h3 class="firstname">No Transfer History Found</h3>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <h4 class="title">
                        Achievements
                    </h4>
                    <div class="achievements" id="agentAchievements">
                        <h4 class="total">Total <span>({{ count($achievements) }})</span></h4>
                        @if (count($achievements) > 0)
                            @foreach ($achievements as $achievement)
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
                </div>{{-- transfer-history end --}}

                <div class="gray-heading">
                    <h3>Contact Information</h3>
                </div>
                <div class="contact-info" id="CONTACTINFORMATION">
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li><b>Nationality : </b>{{ $agent->nationality }}</li>
                                    <li><b>Email : </b>{{ $agent->user->email }}</li>
                                    <li><b>Socail Media Link2 : </b>{{ $agent->social_media_link_2 }}</li>
                                    <li><b>City : </b>
                                        @foreach ($cities as $city)
                                            @if ($agent->birth_city == $city->id)
                                                {{ $city->name }}
                                            @endif
                                        @endforeach
                                    </li>
                                    <li><b>Country : </b>{{ $agent->country->name }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><b>Telephone : </b>{{ $agent->telephone }}</li>
                                    <li><b>Socail Media Link1 : </b>{{ $agent->social_media_link_1 }}</li>
                                    <li><b>Website : </b>{{ $agent->website }}</li>
                                    <li><b>State/Province : </b>{{ $agent->state }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>{{-- contact-information end --}}
            </div>
        </div>
    </section>
@endsection
