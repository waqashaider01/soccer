<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ route('agent.contact-info-save') }}">
            @csrf
            <div class="mb-3">
                <label for="profile_type" class="form-label">Profile Type *</label>
                <select name="profile_type" id="profile_type" class="form-control">
                    <option value="" selected disabled>Select Profile Type</option>
                    <option value="public" {{ $agent->profile_type == 'public' ? 'selected' : '' }}>Public</option>
                    <option value="followers-only" {{ $agent->profile_type == 'followers-only' ? 'selected' : '' }}>Followers Only</option>
                    <option value="hide" {{ $agent->profile_type == 'hide' ? 'selected' : '' }}>Hide</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone *</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $agent->telephone }}" placeholder="Enter telephone no">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">General Email *</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $agent->email }}" placeholder="Enter General Email">
            </div>

            <div class="mb-3">
                <label for="social_media_link_1" class="form-label">Social Media Link 1 *</label>
                <input type="text" class="form-control" id="social_media_link_1" name="social_media_link_1" value="{{ $agent->social_media_link_1 }}" placeholder="Enter Social Media Link 1">
            </div>

            <div class="mb-3">
                <label for="social_media_link_2" class="form-label">Social Media Link 2 *</label>
                <input type="text" class="form-control" id="social_media_link_2" name="social_media_link_2"
                    value="{{ $agent->social_media_link_2 }}" placeholder="Enter Social Media Link 2">
            </div>

            <div class="mb-3">
                <label for="social_media_link_3" class="form-label">Social Media Link 3 *</label>
                <input type="text" class="form-control" id="social_media_link_3" name="social_media_link_3"
                    value="{{ $agent->social_media_link_3 }}" placeholder="Enter Social Media Link 3">
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website *</label>
                <input type="text" class="form-control" id="website" name="website"
                    value="{{ $agent->website }}" placeholder="Enter website link">
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State *</label>
                <input type="text" class="form-control" id="state" name="state"
                    value="{{ $agent->state }}" placeholder="Enter state e.g Punjab">
            </div>

            <div class="mb-3">
                <label for="birth_city" class="form-label">City *</label>
                <select name="birth_city" id="birth_city" class="form-control">
                    <option value="" selected disabled>Select City</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}" {{ $agent->birth_city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="birth_country" class="form-label">Country *</label>
                <select name="birth_country" id="birth_country" class="form-control">
                    <option value="" selected disabled>Select Country</option>
                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ $agent->birth_country == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 d-flex justify-content-between">
                <a href="{{ route(Auth::user()->type . '.dashboard') }}" class="btn cancel-btn">Cancel</a>
                <button type="submit" class="btn save-btn">Save</button>
            </div>

        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="countryOfBirth"]').on('change', function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    url: '/admin/cities/ajax/' + countryID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="cityOfBirth"]').empty();
                        $('select[name="cityOfBirth"]').append(
                            '<option value="" selected disabled>Select City</option>');
                        $.each(data, function(key, value) {
                            $('select[name="cityOfBirth"]').append(
                                '<option value="' +
                                value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="cityOfBirth"]').empty();
            }
        });
    });
</script>
