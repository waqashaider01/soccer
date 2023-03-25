@extends("backend.agent.layouts.app")
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard/profile.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css"
    integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
    integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
    integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"
    integrity="sha512-f0VlzJbcEB6KiW8ZVtL+5HWPDyW1+nJEjguZ5IVnSQkvZbwBt2RfCBY0CBO1PsMAqxxrG4Di6TfsCPP3ZRwKpA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css"
    integrity="sha512-3q8fi8M0VS+X/3n64Ndpp6Bit7oXSiyCnzmlx6IDBLGlY5euFySyJ46RUlqIVs0DPCGOypqP8IRk/EyPvU28mQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<x-embed-styles />
@endpush
@section('content')
<div class="profile">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-edit_profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-edit_profile" type="button" aria-selected="false">
                <i class="fas fa-user-edit"></i> edit profile
            </button>

            <button class="nav-link" id="nav-achievements-tab" data-bs-toggle="tab"
                data-bs-target="#nav-achievements" type="button" aria-select ed="true">
                <i class="fas fa-project-diagram"></i> coach achievements
            </button>

            <button class="nav-link" id="nav-players-portfolio-tab" data-bs-toggle="tab"
                data-bs-target="#nav-players-portfolio" type="button" aria-select ed="true">
                <i class="fas fa-project-diagram"></i> players portfolio
            </button>

            <button class="nav-link" id="nav-transfer-history-tab" data-bs-toggle="tab"
                data-bs-target="#nav-transfer-history" type="button" aria-select ed="true">
                <i class="fas fa-project-diagram"></i> transfer history
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-edit_profile" role="tabpanel">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-personal_info-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-personal_info" type="button" aria-selected="true">
                        personal information
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-basic_info-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-basic_info" type="button" aria-selected="false">
                        basic information
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact_info-tab" data-bs-toggle="pill" data-bs-target="#pills-contact_info"
                        type="button" aria-selected="false">
                        contact information
                    </button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile_img-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile_img" type="button" aria-selected="false">
                        profile image
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-cover_img-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-cover_img" type="button" aria-selected="false">
                        cover image
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-personal_info" role="tabpanel">
                    @include('backend.agent.coach.edit-profile.personal-info')
                </div>{{-- personal-info end --}}

                <div class="tab-pane fade" id="pills-basic_info" role="tabpanel">
                    @include('backend.agent.coach.edit-profile.basic-info')
                </div>{{-- basic-info end --}}

                <div class="tab-pane fade" id="pills-contact_info" role="tabpanel">
                    @include('backend.agent.coach.edit-profile.contact-info')
                </div>{{-- basic-info end --}}

                <div class="tab-pane fade" id="pills-profile_img" role="tabpanel">
                    @include('backend.agent.coach.edit-profile.profile-img')
                </div>{{-- profile-img end --}}

                <div class="tab-pane fade" id="pills-cover_img" role="tabpanel">
                    @include('backend.agent.coach.edit-profile.cover-img')
                </div>{{-- cover-img end --}}
            </div>
        </div>{{-- edit_profile end --}}

        <div class="tab-pane fade" id="nav-achievements" role="tabpanel">
            @include('backend.agent.achievements.index')
        </div>{{-- achievements end --}}

        <div class="tab-pane fade" id="nav-players-portfolio" role="tabpanel">
            @include('backend.agent.players-portfolio.index')
        </div>{{-- players-portfolio end --}}

        <div class="tab-pane fade" id="nav-transfer-history" role="tabpanel">
            @include('backend.agent.transfer-history.index')
        </div>{{-- transfer-history end --}}

    </div>
    @endsection
    @push('scripts')
    @endpush
