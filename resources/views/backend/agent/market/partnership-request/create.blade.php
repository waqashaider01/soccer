@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
<div class="container">
    <form method="POST" action="{{ route('partnership-request.market-post-store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="upload_logo"><i class="fas fa-cloud-upload-alt"></i> Upload Profile</label>
                    <input type="file" class="form-control" id="upload_logo" accept="image/*"
                        onchange="showLogoPreview(event);" name="upload_logo">
                </div>
                <div class="col-md-6 preview-upload-logo">
                    <img id="uploadedLogo" alt="Logo Image Preview" width="20%" class="mb-4">
                </div>
            </div>

        </div>

        <br>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date *</label>
                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                        value="{{ old('expiry_date') }}" placeholder="Enter expiry date"
                        max="{{ Carbon\Carbon::now()->addMonths(5)->format('Y-m-d') }}">
                </div>
                @error('expiry_date')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="for_whom" class="form-label">For Whom *</label>
                    <select class="form-select for_whom_multiple" name="for_whom[]" id="for_whom" multiple="multiple">
                        <option value="player">Players</option>
                        <option value="club">Club</option>
                        <option value="scout">Scouts</option>
                        <option value="coach">Coaches</option>
                        <option value="intermediary">Intermediaries</option>
                        <option value="academy">Academies</option>
                    </select>
                </div>
                @error('for_whom')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="description" class="form-label">Description *</label>
                    <textarea class="form-control" placeholder="Add description..." id="description" name="description"
                        value="{{ old('description') }}" rows="4"></textarea>
                </div>
                @error('description')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="originating_partner_country" class="form-label">Originating Partner Country *</label>
                    <select id="originating_partner_country" class="form-select" name="originating_partner_country">
                        <option value="" selected disabled>Select Originating Partner Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('originating_partner_country')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="prospective_partner" class="form-label">Prospective Partner *</label>
                    <select class="form-select" name="prospective_partner" id="prospective_partner">
                        <option value="" selected disabled>Select Player</option>
                        <option value="player">Players</option>
                        <option value="club">Club</option>
                        <option value="scout">Scouts</option>
                        <option value="coach">Coaches</option>
                        <option value="intermediary">Intermediaries</option>
                        <option value="academy">Academies</option>
                    </select>
                </div>
                @error('prospective_partner')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="prospective_partner_country" class="form-label">Prospective Partner Country *</label>
                    <select id="prospective_partner_country" class="form-select" name="prospective_partner_country">
                        <option value="" selected disabled>Select Prospective Partner Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('prospective_partner_country')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                {{-- checbox field --}}
                <div class="mb-3">
                    <label for="prospective_partner_country_wordwide" class="form-label">Prospective Partner Country
                        Wordwide *</label>
                    <input type="checkbox" class="form-check-input" id="prospective_partner_country_wordwide"
                        name="prospective_partner_country_wordwide" value="yes">
                </div>
                @error('prospective_partner_country_wordwide')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">

                <div class="mb-3">
                    <label for="profile_type" class="form-label">Profile Type *</label>
                    <select name="profile_type" id="profile_type" class="form-control">
                        <option value="" selected disabled>Select Profile Type</option>
                        <option value="public">Public</option>
                        <option value="followers-only">Followers Only</option>
                        <option value="hide">Hide</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Telephone *</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                        value="{{ old('telephone') }}" placeholder="Enter telephone no">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">General Email *</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter general email">
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website *</label>
                    <input type="text" class="form-control" id="website" name="website" value="{{ old('website') }}"
                        placeholder="Enter website link">
                </div>

                <div class="mb-3">
                    <label for="social_media_link" class="form-label">Social Media Link *</label>
                    <input type="text" class="form-control" id="social_media_link" name="social_media_link"
                        value="{{ old('social_media_link') }}" placeholder="Enter Social Media Link">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <label for="additional_information" class="form-label">Additional Information *</label>
            <textarea class="form-control" placeholder="Add additional information..." id="additional_information"
                name="additional_information" rows="4"></textarea>
        </div>
        @error('additional_information')
        <div class="text-danger mb-3">{{ $message }}</div>
        @enderror

        <br>

        <div class="mb-3 d-flex justify-content-between">
            <a href="{{ route( Auth::user()->type . '.profile') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<script>
    // Upload Logo
    function showLogoPreview(event) {
        if (event.target.files.length > 0) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedLogo').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    }

    $(document).ready(function() {
        $('.for_whom_multiple, .player_position_multiple').select2();
        $('.for_whom_multiple').select2({
            placeholder: "Select For Whom"
        });
        $('.player_position_multiple').select2({
            placeholder: "Select Player Position"
        });
    });
</script>

@endsection
