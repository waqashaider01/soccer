@extends('backend.player.layouts.app')
@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<link rel="stylesheet" href="{{ asset('css/dashboard/profile.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js" integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" integrity="sha512-3q8fi8M0VS+X/3n64Ndpp6Bit7oXSiyCnzmlx6IDBLGlY5euFySyJ46RUlqIVs0DPCGOypqP8IRk/EyPvU28mQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<x-embed-styles />

@endpush
@section('content')
<div class="profile">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-edit_profile-tab" data-bs-toggle="tab" data-bs-target="#nav-edit_profile" type="button" aria-selected="false">
                <i class="fas fa-user-edit"></i> edit profile
            </button>

            <button class="nav-link" id="nav-career_match_data-tab" data-bs-toggle="tab" data-bs-target="#nav-career_match_data" type="button" aria-selected="true">
                <i class="fas fa-chart-area"></i> career match data
            </button>

            <button class="nav-link" id="nav-transfer_history-tab" data-bs-toggle="tab" data-bs-target="#nav-transfer_history" type="button" aria-selected="false">
                <i class="fas fa-exchange-alt"></i> transfer history
            </button>

            <button class="nav-link" id="nav-attributes-tab" data-bs-toggle="tab" data-bs-target="#nav-attributes" type="button" aria-selected="false">
                <i class="fas fa-chart-pie"></i> attributes
            </button>

            <button class="nav-link" id="nav-next_match_schedule-tab" data-bs-toggle="tab" data-bs-target="#nav-next_match_schedule" type="button" aria-select ed="true">
                <i class="fas fa-project-diagram"></i> next match schedule
            </button>

            <button class="nav-link" id="nav-achievements-tab" data-bs-toggle="tab" data-bs-target="#nav-achievements" type="button" aria-select ed="true">
                <i class="fas fa-project-diagram"></i> player achievements
            </button>

            <button class="nav-link" id="nav-cv-tab" data-bs-toggle="tab" data-bs-target="#nav-cv" type="button" aria-select ed="true">
                <i class="fas fa-project-diagram"></i> player cv
            </button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-edit_profile" role="tabpanel">
            @if (session('error'))
             <div class="alert alert-danger mb-0 py-1 text-center">{{ session('error') }}</div>
            @endif
            @if (session('success'))
             <div class="alert alert-success mb-0 py-1 text-center">{{ session('success') }}</div>
            @endif
            <ul class="nav nav-pills mb-3" id="piwlls-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-personal_info-tab" data-bs-toggle="pill" data-bs-target="#pills-personal_info" type="button" aria-selected="true">
                        personal information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-basic_info-tab" data-bs-toggle="pill" data-bs-target="#pills-basic_info" type="button" aria-selected="false">
                        basic information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-career_info-tab" data-bs-toggle="pill" data-bs-target="#pills-career_info" type="button" aria-selected="false">
                        career information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile_img-tab" data-bs-toggle="pill" data-bs-target="#pills-profile_img" type="button" aria-selected="false">
                        profile image
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-cover_img-tab" data-bs-toggle="pill" data-bs-target="#pills-cover_img" type="button" aria-selected="false">
                        cover image
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-video_links-tab" data-bs-toggle="pill" data-bs-target="#pills-video_links" type="button" aria-selected="false">
                        video links
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-img_upload-tab" data-bs-toggle="pill" data-bs-target="#pills-img_upload" type="button" aria-selected="false">
                        image upload
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-personal_info" role="tabpanel">
                    @include('backend.player.profile.edit-profile.personal-info')
                </div>{{-- personal-info end --}}

                <div class="tab-pane fade" id="pills-basic_info" role="tabpanel">
                    @include('backend.player.profile.edit-profile.basic-info')
                </div>{{-- basic-info end --}}

                <div class="tab-pane fade" id="pills-career_info" role="tabpanel">
                    @include('backend.player.profile.edit-profile.career-info')
                </div>{{-- career-info end --}}

                <div class="tab-pane fade" id="pills-profile_img" role="tabpanel">
                    @include('backend.player.profile.edit-profile.profile-img')
                </div>{{-- profile-img end --}}

                <div class="tab-pane fade" id="pills-cover_img" role="tabpanel">
                    @include('backend.player.profile.edit-profile.cover-img')
                </div>{{-- cover-img end --}}


                <div class="tab-pane fade" id="pills-video_links" role="tabpanel">
                    @include('backend.player.profile.edit-profile.video-links')
                </div>{{-- video-links end --}}


                <div class="tab-pane fade" id="pills-img_upload" role="tabpanel">
                    @include('backend.player.profile.edit-profile.img-upload')
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-career_match_data" role="tabpanel">
            @include('backend.player.profile.career-match-data.index')
        </div>


        <div class="tab-pane fade" id="nav-transfer_history" role="tabpanel">
            @include('backend.player.profile.transfer-history.index')
        </div>


        <div class="tab-pane fade" id="nav-attributes" role="tabpanel">
            @include('backend.player.profile.attributes.index')
            </div>
            
        </div>


        <div class="tab-pane fade" id="nav-next_match_schedule" role="tabpanel">
            @include('backend.player.profile.next-match-schedule.index')
        </div>

        <div class="tab-pane fade" id="nav-achievements" role="tabpanel">
            @include('backend.player.profile.achievements.index')
        </div>

        <div class="tab-pane fade" id="nav-cv" role="tabpanel">
            @include('backend.player.profile.cv.index')
        </div>
    </div>
    @endsection
    @push('scripts')
    @endpush