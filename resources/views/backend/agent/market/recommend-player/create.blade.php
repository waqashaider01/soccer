@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
<div class="container">
    <form method="POST" action="{{ route('recommend-player.market-post-store') }}" enctype="multipart/form-data">
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
                        value="{{ old('expiry_date') }}" placeholder="Enter expiry date">
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
                    <label for="player_age" class="form-label">Player Age *</label>
                    <select id="player_age" class="form-select" name="player_age">
                        <option value="" selected disabled>Select age</option>
                        <option value="0">0</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="player_gender" class="form-label">Player Gender *</label>
                    <br>
                    <input class="form-check-input" type="radio" name="player_gender" value="male"
                        id="player_gender"> Male
                    <br>
                    <input class="form-check-input" type="radio" name="player_gender" value="female"
                        id="player_gender"> Female
                </div>
                @error('player_gender')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="country_id" class="form-label">Country *</label>
                    <select id="country_id" class="form-select" name="country_id">
                        <option value="" selected disabled>Select Country</option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('country')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="eu_passport_required" class="form-label">EU Passport Required *</label>
                    <br>
                    <input class="form-check-input" type="radio" name="eu_passport_required" value="yes" id="eu_passport_required"> Yes
                    <br>
                    <input class="form-check-input" type="radio" name="eu_passport_required" value="no" id="eu_passport_required"> No
                </div>
                @error('eu_passport_required')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="player_main_position" class="form-label">Player Main Position *</label>
                    <select id="player_main_position" class="form-select player_main_position_multiple" name="player_main_position[]" multiple="multiple">
                        <option value="striker">Striker</option>
                        <option value="second-striker">Second Striker</option>
                        <option value="right-forward">Right Forward</option>
                        <option value="left-forward">Left Forward</option>
                        <option value="attacking-midfielder">Attacking Midfielder</option>
                        <option value="central-midfielder">Central Midfielder</option>
                        <option value="right-midfielder">Right Midfielder </option>
                        <option value="left-midfielder">Left Midfielder </option>
                        <option value="defensive-midfielder">Defensive Midfielder</option>
                        <option value="right-fullback">Right Fullback</option>
                        <option value="left-fullback">Left Fullback</option>
                        <option value="central-defender">Central Defender</option>
                        <option value="right-wing-back">Right Wing Back</option>
                        <option value="left-wing-back">Left Wing Back</option>
                        <option value="goalkeeper">Goalkeeper</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="player_alternative_position" class="form-label">Player Alternative Position *</label>
                    <select id="player_alternative_position" class="form-select player_alternative_position_multiple" name="player_alternative_position[]" multiple="multiple">
                        <option value="striker">Striker</option>
                        <option value="second-striker">Second Striker</option>
                        <option value="right-forward">Right Forward</option>
                        <option value="left-forward">Left Forward</option>
                        <option value="attacking-midfielder">Attacking Midfielder</option>
                        <option value="central-midfielder">Central Midfielder</option>
                        <option value="right-midfielder">Right Midfielder </option>
                        <option value="left-midfielder">Left Midfielder </option>
                        <option value="defensive-midfielder">Defensive Midfielder</option>
                        <option value="right-fullback">Right Fullback</option>
                        <option value="left-fullback">Left Fullback</option>
                        <option value="central-defender">Central Defender</option>
                        <option value="right-wing-back">Right Wing Back</option>
                        <option value="left-wing-back">Left Wing Back</option>
                        <option value="goalkeeper">Goalkeeper</option>
                    </select>
                </div>


            </div>

            <div class="col-md-6">

                <div class="mb-3">
                    <label for="transfer_fee" class="form-label">Transfer Fee *</label>
                    <input type="text" class="form-control" id="transfer_fee" name="transfer_fee" value="{{ old('transfer_fee') }}"
                        placeholder="Enter transfer fee">
                </div>
                @error('transfer_fee')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="monthly_salary" class="form-label">Monthly Salary *</label>
                    <input type="number" class="form-control" id="monthly_salary" name="monthly_salary"
                        value="{{ old('monthly_salary') }}" placeholder="Enter monthly salary">
                </div>
                @error('monthly_salary')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="training_compensation_fee" class="form-label">Training Compensation Fee *</label>
                    <select name="training_compensation_fee" id="training_compensation_fee" class="form-select">
                        <option value="" selected disabled>Select</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                @error('training_compensation_fee')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="trial_conditions" class="form-label">Trial Conditions *</label>
                    <textarea class="form-control" placeholder="Add trial conditions information..." id="trial_conditions"
                        name="trial_conditions" rows="4"></textarea>
                </div>
                @error('trial_conditions')
                <div class="text-danger mb-3">{{ $message }}</div>
                @enderror

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
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}"
                        placeholder="Enter telephone no">
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
            <textarea class="form-control" placeholder="Add additional information..." id="additional_information" name="additional_information" rows="4"></textarea>
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
        $('.for_whom_multiple, .player_main_position_multiple, .player_alternative_position_multiple').select2();
        $('.for_whom_multiple').select2({
            placeholder: "Select For Whom"
        });
        $('.player_main_position_multiple, .player_alternative_position_multiple').select2({
            placeholder: "Select Player Position"
        });
    });
</script>

@endsection
