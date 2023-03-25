<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ route('agent.basic-info-save') }}">
            @csrf
            <div class="mb-3">
                <label for="club_name" class="form-label">Club's Name *</label>
                <input class="form-control" type="text" name="club_name" id="club_name"
                    value="{{ $agent->club_name ?? '' }}" placeholder="Enter club name">
            </div>
            <div class="mb-3">
                <label for="position_at_club" class="form-label">Position At Club *</label>
                <select id="position_at_club" class="form-select" name="position_at_club">
                    <option value="" selected disabled>Select position</option>
                    <option value="owner" @if ($agent->position_at_club == 'owner') selected @endif>Owner</option>
                    <option value="representative" @if ($agent->position_at_club == 'representative') selected @endif>Representative</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="club_nationality" class="form-label">Club Nationality *</label>
                <input type="text" class="form-control" id="club_nationality" name="club_nationality"
                    value="{{ $agent->club_nationality }}" placeholder="e.g Pakistan">
            </div>

            <div class="mb-3">
                <label for="countries_of_operation" class="form-label">Countries of Operation *</label>
                <select id="countries_of_operation" class="form-select chosen-select-country" multiple="multiple"
                    name="countries_of_operation[]">
                    @foreach ($countries as $country)
                        <option value="{{ $country->name }}" @if (in_array($country->name, json_decode($agent->countries_of_operation) ?? [])) selected @endif>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="countries_of_operation_worldwide" class="form-label">Countries of Operation Wordwide *</label>
                <input class="form-check-input" type="checkbox" name="countries_of_operation_worldwide"
                    id="countries_of_operation_worldwide" @if ($agent->countries_of_operation_worldwide == 1) checked @endif>
            </div>

            <div class="mb-3">
                <label for="passport" class="form-label">Profile Link *</label>
                <input class="form-control" type="text" name="profile_link" id="profile_link"
                    value="{{ $agent->profile_link ?? '' }}" placeholder="Enter Profile Link">
            </div>

            <div class="mb-3 d-flex justify-content-between">
                <button type="{{ route(Auth::user()->type . '.dashboard') }}" class="btn cancel-btn">Cancel</button>
                <button type="submit" class="btn save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"
integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // chosen liberary
    $(".chosen-select-country").chosen({
        no_results_text: "Oops, nothing found!"
    });
    var search = document.querySelector(".chosen-search-input");
    search.value = "Select max 5 languages";
</script>
