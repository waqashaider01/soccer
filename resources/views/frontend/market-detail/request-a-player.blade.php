@extends('frontend.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/market-detail.css') }}">
@endpush
@section('content')
    <section class="market-detail-section">
        <section class="market-detail-hero">
        </section>
        <div class="container">
            <div class="market-detail">
                <div class="club-seeking-player">
                    <div class="heading" style="background-color: #efe3af">
                        <h3>Request Player</h3>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/posted-by.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Posted By</h4>
                                            <p>{{ $agent->user->name ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/category.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Category</h4>
                                            @if(isset($agent) && !empty($agent->slug))
                                                <p>{{ ucfirst(str_replace('-', ' ', $agent->slug )) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/for-whom.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">For Whom</h4>
                                            @if(isset($agent) && !empty($agent->for_whom))
                                               <p>{{ implode(', ', json_decode($agent->for_whom )) }}</p>
                                             @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/expiry-date.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Expiry Date</h4>
                                            @if(isset($agent) && !empty($agent->expiry_date))
                                                <p>{{ date('F j, Y', strtotime($agent->expiry_date)) }}</p>
                                            @else
                                                <p>00/00/0000</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/views.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Views</h4>
                                            <p>10</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/applications.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Applications</h4>
                                            <p>05</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>{{-- club-seeking-player end --}}

                <div class="details">
                    <div class="heading">
                        <h3>Details</h3>
                    </div>
                    <div class="content">
                        <img src="{{ asset('images/market-detail/city.png') }}" alt="city">
                        <div class="description">
                            {{ $agent->description ?? 'null' }}
                        </div>
                    </div>
                </div>{{-- details end --}}


                <div class="club-details">
                    <div class="heading">
                        <h3>Request Player Details</h3>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/league-division.png') }}"
                                                alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">League Division</h4>
                                            <p>{{ $agent->league_division ?? '0' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/country.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Country</h4>
                                           @if(isset($countries) && is_array($countries))
                                                @foreach ($countries as $country)
                                                    @if (isset($agent) && $country->id == $agent->country_id)
                                                        @php
                                                            $flagPath = 'images/flags/' . $country->name . '.png';
                                                        @endphp
                                                        @if(file_exists(public_path($flagPath)))
                                                            <img src="{{ asset($flagPath) }}" class="country-flag" alt="{{ $country->name }}">
                                                        @else
                                                            <span class="text-danger">Flag not found</span>
                                                        @endif
                                                        {{ $country->name }}
                                                    @endif
                                                @endforeach
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>{{-- club-details end --}}

                <div class="player-details">
                    <div class="heading">
                        <h3>Player's Details</h3>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/main-position.png') }}"
                                                alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Main Position</h4>
                                            <p style="margin-top: -8px">
                                                 @if(isset($agent) && !empty($agent->player_position))
                                                    {{ implode(', ', json_decode(str_replace('-', ' ', $agent->player_position))) }}
                                                 @else
                                                     null
                                                 @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/gender.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Gender</h4>
                                            <p>{{ ucfirst($agent->player_gender ?? 'N/A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/age.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Minimum Age</h4>
                                            <p>{{ $agent->player_min_age ?? '0'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/age.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Maximum Age</h4>
                                            <p>{{ $agent->player_max_age ?? '0' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/EU-passport-required.png') }}"
                                                alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">EU Passport Required?</h4>
                                            <p>{{ $agent->eu_passport_required ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>{{-- player-details end --}}

                <div class="terms">
                    <div class="heading">
                        <h3>Terms</h3>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/charges.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Transfer Fees</h4>
                                            <p>$ {{ $agent->transfer_fee  ?? '0'}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/charges.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Monthly Salary </h4>
                                            <p>$ {{ $agent->monthly_salary ?? '0' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/charges.png') }}" alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Training Compensation Fee</h4>
                                            <p>{{ ucfirst($agent->training_compensation_fee ??  '0') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <div class="market-detail-card">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ asset('images/market-detail/trial-conditions.png') }}"
                                                alt="city">
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="title">Trial Conditions</h4>
                                            <p>{{ $agent->trial_conditions ?? 'N/A'  }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{-- terms end --}}

                @if (isset($agent) && !empty($agent->profile_type) && !($agent->profile_type == 'hidden'))
                    <div class="contact-info">
                        <div class="heading">
                            <h3>Contact Information</h3>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="market-detail-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('images/market-detail/club-location.png') }}"
                                                    alt="city">
                                            </div>
                                            <div class="col-md-9">
                                                <h4 class="title">Location</h4>
                                                @if(isset($agent) && isset($countries) && is_array($countries))
                                                    @foreach ($countries as $country)
                                                        @if ($country->id == $agent->country_id)
                                                            @php
                                                                $flagPath = 'images/flags/' . $country->name . '.png';
                                                            @endphp
                                                            @if(file_exists(public_path($flagPath)))
                                                                <img src="{{ asset($flagPath) }}" class="country-flag" alt="{{ $country->name }}">
                                                            @else
                                                                <span class="text-danger">Flag not found</span>
                                                            @endif
                                                            {{ $country->name }}
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="market-detail-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('images/market-detail/telephone.png') }}"
                                                    alt="city">
                                            </div>
                                            <div class="col-md-9">
                                                <h4 class="title">Telephone</h4>
                                                <p>{{ $agent->telephone ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="market-detail-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('images/market-detail/email.png') }}" alt="city">
                                            </div>
                                            <div class="col-md-9">
                                                <h4 class="title">Email</h4>
                                                <p>{{ $agent->email ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="market-detail-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('images/market-detail/website.png') }}"
                                                    alt="city">
                                            </div>
                                            <div class="col-md-9">
                                                <h4 class="title">Website</h4>
                                                 @if(isset($agent) && !empty($agent->website))
                                                      <p><a href="{{ $agent->website }}">{{ $agent->website }}</a>
                                                  @else
                                                      <p>N/A</p>
                                                   @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="market-detail-card">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('images/market-detail/social-media-links.png') }}"
                                                    alt="city">
                                            </div>
                                            <div class="col-md-9">
                                                <h4 class="title">Social Media Links</h4>
                                                 @if(isset($agent) && !empty($agent->social_media_link))
                                                 <p><a href="{{ $agent->social_media_link }}">{{ $agent->social_media_link }}</a> </p>
                                                 @else
                                                   <p>N/A</p>
                                                  @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- contact-info end --}}
                @endif

                <div class="additional-info">
                    <div class="heading">
                        <h3>Additional Info</h3>
                    </div>
                    <div class="description">
                        <p>{{ $agent->additional_information ?? 'N/A' }}</p>
                    </div>
                </div>{{-- additional-info end --}}

                @if ($alreadyApplied)
                    <br>
                    <button class="btn btn-success btn-lg" disabled>
                        You Have Already Applied
                    </button>
                @elseif (Auth::check() && Auth::user()->type == 'player')
                    <button class="apply-btn" data-bs-toggle="modal" data-bs-target="#applyModal">
                        Apply
                    </button>
                @else
                    <br>
                    <h4>Please Login First as Player <a href="{{ route('login') }}" class="btn btn-success">Login
                            Here</a></h4>
                @endif
                <!-- Modal -->
                <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Apply For: Request A Player</h5>
                                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><i
                                        class="fas fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                                <form id="apply-form" method="POST" action="{{ route('player.market-apply') }}">
                                    @csrf

                                    <input type="hidden" name="agent_id" value="{{ $agent->user->id ?? '0' }}">

                                    <div class="row mb-3">
                                        <div class="col-md-3 text-end">
                                            <div class="text">
                                                <label for="name" class="form-label">Name<span
                                                        class="require">*</span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{ $agent->user->name ?? '0' }}"
                                                id="name" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="display: none;">
                                        <div class="col-md-3">
                                            <div class="text">
                                                <label for="market_id" class="form-label">Market ID</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{ $agent->id ?? '0' }}"
                                                id="market_id" name="market_id" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="text">
                                                <label for="market_type" class="form-label">Market Type</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{ $agent->slug ?? 'N/A' }}"
                                                id="market_type" name="market_type" readonly>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="text">
                                                <label for="additional_info" class="form-label">Additional Info</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="additional_info" name="additional_info" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3 form-check">
                                        <div class="col-12">
                                            <input type="checkbox" class="form-check-input" id="agree">
                                            <label class="form-check-label" for="agree">
                                                I have read and agreed to the <a href="">Terms of Use</a> and <a
                                                    href="">Privacy
                                                    Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="apply-btn">
                                        Apply
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="disclaimer">
                    <b>Disclaimer :</b>
                    <p> Advertisements from third party and links to
                        other website are not endorsements or recommendations
                        by SoccerWorldLink. Soccerworldlink is not responsible
                        for the content of the advertisement ,any promises
                        made, or the reliablity of any third party offering.</p>
                </div>{{-- disclaimer end --}}


            </div>
        </div>
    </section>
@endsection
