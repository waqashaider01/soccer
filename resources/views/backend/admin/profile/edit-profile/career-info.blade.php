<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/player/career-info/save">
            @csrf

            @if ($playerInfo != null)
                <div class="mb-3">
                    <label for="status" class="form-label">Status *</label>
                    <select id="status" class="form-select" name="status">

                        <option value="in-contract" @if ($playerInfo->status == 'in-contract') selected @endif>In a Contract
                        </option>
                        <option value="on-loan" @if ($playerInfo->status == 'on-loan') selected @endif>On Loan</option>
                        <option value="free-agent" @if ($playerInfo->status == 'free-agent') selected @endif>Free Agent</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="careerLevel" class="form-label">Career Level *</label>
                    <select id="careerLevel" class="form-select" name="careerLevel">
                        <option value="youth-player" @if ($playerInfo->career_level == 'youth-player') selected @endif>Youth Player
                        </option>
                        <option value="amateur" @if ($playerInfo->career_level == 'amateur') selected @endif>Amateur</option>
                        <option value="professional" @if ($playerInfo->career_level == 'professional') selected @endif>Professional
                        </option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="currentClub" class="form-label">Current Club *</label>
                    <input type="text" class="form-control" id="currentClub" name="currentClub"
                        value="{{ $playerInfo->current_club }}">
                </div>
                <div class="mb-3">
                    <label for="leagueDivision" class="form-label">League Division *</label>
                    <select id="leagueDivision" class="form-select" name="leagueDivision">
                        <option value="1" @if ($playerInfo->league_division == '1') selected @endif>1st Division</option>
                        <option value="2" @if ($playerInfo->league_division == '2') selected @endif>2nd Division</option>
                        <option value="3" @if ($playerInfo->league_division == '3') selected @endif>3rd Division</option>
                        <option value="4" @if ($playerInfo->league_division == '4') selected @endif>4th Division</option>
                        <option value="5" @if ($playerInfo->league_division == '5') selected @endif>5th Division</option>
                    </select>
                </div>
            @endif
            <div class="mb-3">
                <label for="careerCountry" class="form-label">Country *</label>
                <select id="careerCountry" class="form-select" name="careerCountry">
                    <option value="" selected disabled>Select Country</option>
                    @if ($countries != null)
                        @foreach ($countries as $country)
                            @if ($playerInfo->career_country == $country->id)
                                <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                            @else
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="careerCity" class="form-label">City *</label>
                <select id="careerCity" class="form-select" name="careerCity">
                    <option value="" selected disabled>Select City</option>
                    @if ($cities != null)
                        @foreach ($cities as $city)
                            @if ($playerInfo->birth_city == $city->id)
                                <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                            @else
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="contractStartDate" class="form-label">Contract Start Date *</label>
                <input type="date" class="form-control" id="contractStartDate" name="contractStartDate"
                    value="{{ $playerInfo->contract_start_date }}">
            </div>
            <div class="mb-3">
                <label for="contractExpiryDate" class="form-label">Contract Expiry Date
                    *</label>
                <input type="date" class="form-control" id="contractExpiryDate" name="contractExpiryDate"
                    value="{{ $playerInfo->contract_expiry_date }}">
            </div>
            <div class="mb-3">
                <label for="nationalTeamPlayer" class="form-label">National Team Player
                    *</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="nationalTeamPlayer" id="yes"
                        value="1" {{ $playerInfo->national_team_player == '1' ? 'checked' : '' }}>
                    <label for="yes">Yes</label>
                    <input class="form-check-input" type="radio" name="nationalTeamPlayer" id="no"
                        value="0" {{ $playerInfo->national_team_player == '0' ? 'checked' : '' }}>
                    <label for="no">No</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="internationalCaps" class="form-label">International Caps *</label>
                <input type="number" class="form-control" id="internationalCaps" name="internationalCaps"
                    value="{{ $playerInfo->international_caps }}">
            </div>
            <div class="mb-3">
                <label for="trainingCompensation" class="form-label">Training Compensation to
                    previous club? *</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="trainingCompensation" id="yes"
                        value="1"
                        {{ $playerInfo->training_compensation_to_previous_club == '1' ? 'checked' : '' }}>
                    <label for="yes">Yes</label>
                    <input class="form-check-input" type="radio" name="trainingCompensation" id="no"
                        value="0"
                        {{ $playerInfo->training_compensation_to_previous_club == '0' ? 'checked' : '' }}>
                    <label for="no">No</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="transferFee" class="form-label">Transfer fee to previous club?
                    *</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="transferFee" id="yes" value="1"
                        {{ $playerInfo->transfer_fee_to_previous_club == '1' ? 'checked' : '' }}>
                    <label for="yes">Yes</label>
                    <input class="form-check-input" type="radio" name="transferFee" id="no" value="0"
                        {{ $playerInfo->transfer_fee_to_previous_club == '0' ? 'checked' : '' }}>
                    <label for="no">No</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="monthlySalaryTarget" class="form-label">Monthly Salary Target
                    *</label>
                <input type="number" class="form-control" id="monthlySalaryTarget" placeholder="US$"
                    name="monthlySalaryTarget" value="{{ $playerInfo->monthly_salary_target }}">
            </div>
            <div class="mb-3">
                <label for="currentMarketValue" class="form-label">Current Market Value
                    *</label>
                <input type="number" class="form-control" id="currentMarketValue" placeholder="US$"
                    name="currentMarketValue" value="{{ $playerInfo->current_market_value }}">
            </div>

            <div class="mb-3 d-flex justify-content-between">
                <a href="/dashboard/profile" class="btn cancel-btn">Cancel</a>
                <button type="submit" class="btn save-btn">Save</button>
            </div>

        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="careerCountry"]').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: '/admin/cities/ajax/' + countryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="careerCity"]').empty();
                        $('select[name="careerCity"]').append(
                            '<option value="" selected disabled>Select City</option>');
                        $.each(data, function(key, value) {
                            $('select[name="careerCity"]').append(
                                '<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="careerCity"]').empty();
            }
        });
    });
</script>
