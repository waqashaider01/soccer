@php
$name = explode(' ', $agent->user->name);
@endphp
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ route('agent.personal-info-save') }}">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name *</label>
                <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $name[0] }}"
                placeholder="Louis">
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name *</label>
                <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $name[1] }}" placeholder="Anetekhai">
            </div>
            <div class="mb-3">
                <label for="nationality" class="form-label">Nationality *</label>
                <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $agent->nationality }}" placeholder="Pakistan">
            </div>
            <div class="mb-3">
                <label for="licensed" class="form-label">Licensed/Registered *</label>
                <div class="mb-3">
                    <input type="radio" class="form-check-input" id="licensed" name="licensed" value="Yes"
                    @if ($agent->licensed == 'Yes') checked @endif>
                    <label for="Yes">Yes</label>
                    <input type="radio" class="form-check-input" id="licensed" name="licensed" value="No"
                    @if ($agent->licensed == 'No') checked @endif>
                    <label for="No">No</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="current_team" class="form-label">Current Team *</label>
                <input type="text" class="form-control" id="current_team" name="current_team" value="{{ $agent->current_team }}"
                    placeholder="Pakistan" required>
            </div>

            <div class="mb-3">
                <label for="about_me" class="form-label">About Me *</label>
                <textarea rows="4" class="form-control" id="about_me" name="about_me">{{ $agent->about_me }}</textarea>
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
