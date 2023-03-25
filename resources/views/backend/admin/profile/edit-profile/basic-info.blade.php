<div class="row">
    <div class="col-md-4">
        <form method="POST" action="/player/basic-info/save">
            @csrf
            <div class="mb-3">
                <label for="passport" class="form-label">EU Passport *</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="passport" id="yes" value="1"
                        {{ $playerInfo->eu_passport == '1' ? 'checked' : '' }}>
                    <label for="yes">Yes</label>
                    <input class="form-check-input" type="radio" name="passport" id="no" value="0"
                        {{ $playerInfo->eu_passport == '0' ? 'checked' : '' }}>
                    <label for="no">No</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="languages" class="form-label">Languages Spoken
                    *</label>

                <select id="languages" class="form-select chosen-select-languages" multiple="multiple"
                    name="languages[]">

                    {{-- @for ($i = 0; $i < count($languages); $i++)
                        @for ($j = 0; $j < count(json_decode($playerInfo->languages)); $j++)
                            @if (json_decode($playerInfo->languages[$j]) == $languages[$i]->id)
                                <option value="{{ $languages[$i]->id }}" selected>{{ $languages[$i]->name }}
                                </option>
                            @endif
                        @endfor
                        <option value="{{ $languages[$i]->id }}">{{ $languages[$i]->name }}</option>
                    @endfor --}}
                </select>
            </div>
            <div class="mb-3">
                <label for="mainPosition" class="form-label">Main Position *</label>
                <select id="mainPosition" class="form-select" name="mainPosition">
                    <option value="" selected disabled>Select position</option>
                    <option value="striker" @if ($playerInfo->main_position == 'striker') selected @endif>Striker</option>
                    <option value="second-striker" @if ($playerInfo->main_position == 'second-striker') selected @endif>Second Striker
                    </option>
                    <option value="right-forward" @if ($playerInfo->main_position == 'right-forward') selected @endif>Right Forward
                    </option>
                    <option value="left-forward" @if ($playerInfo->main_position == 'left-forward') selected @endif>Left Forward</option>
                    <option value="attacking-midfielder" @if ($playerInfo->main_position == 'attacking-midfielder') selected @endif>Attacking
                        Midfielder</option>
                    <option value="central-midfielder" @if ($playerInfo->main_position == 'central-midfielder') selected @endif>Central
                        Midfielder</option>
                    <option value="right-midfielder" @if ($playerInfo->main_position == 'right-midfielde') selected @endif>Right Midfielder
                    </option>
                    <option value="left-midfielder" @if ($playerInfo->main_position == 'left-midfielder') selected @endif>Left Midfielder
                    </option>
                    <option value="defensive-midfielder" @if ($playerInfo->main_position == 'defensive-midfielder') selected @endif>Defensive
                        Midfielder</option>
                    <option value="right-fullback" @if ($playerInfo->main_position == 'right-fullback') selected @endif>Right Fullback
                    </option>
                    <option value="left-fullback" @if ($playerInfo->main_position == 'left-fullback') selected @endif>Left Fullback
                    </option>
                    <option value="central-defender" @if ($playerInfo->main_position == 'central-defender') selected @endif>Central
                        Defender</option>
                    <option value="right-wing-back" @if ($playerInfo->main_position == 'right-wing-back') selected @endif>Right Wing Back
                    </option>
                    <option value="left-wing-back" @if ($playerInfo->main_position == 'left-wing-back') selected @endif>Left Wing Back
                    </option>
                    <option value="goalkeeper" @if ($playerInfo->main_position == 'goalkeeper') selected @endif>Goalkeeper</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alternatePosition" class="form-label">Alternative Position *</label>
                <select id="alternatePosition" class="form-select" name="alternatePosition">
                    <option value="" selected disabled>Select position</option>
                    <option value="striker" @if ($playerInfo->alternative_position == 'striker') selected @endif>Striker</option>
                    <option value="second-striker" @if ($playerInfo->alternative_position == 'second-striker') selected @endif>Second Striker
                    </option>
                    <option value="right-forward" @if ($playerInfo->alternative_position == 'right-forward') selected @endif>Right Forward
                    </option>
                    <option value="left-forward" @if ($playerInfo->alternative_position == 'left-forward') selected @endif>Left Forward
                    </option>
                    <option value="attacking-midfielder" @if ($playerInfo->alternative_position == 'attacking-midfielder') selected @endif>Attacking
                        Midfielder</option>
                    <option value="central-midfielder" @if ($playerInfo->alternative_position == 'central-midfielder') selected @endif>Central
                        Midfielder</option>
                    <option value="right-midfielder" @if ($playerInfo->alternative_position == 'right-midfielde') selected @endif>Right
                        Midfielder
                    </option>
                    <option value="left-midfielder" @if ($playerInfo->alternative_position == 'left-midfielder') selected @endif>Left Midfielder
                    </option>
                    <option value="defensive-midfielder" @if ($playerInfo->alternative_position == 'defensive-midfielder') selected @endif>Defensive
                        Midfielder</option>
                    <option value="right-fullback" @if ($playerInfo->alternative_position == 'right-fullback') selected @endif>Right Fullback
                    </option>
                    <option value="left-fullback" @if ($playerInfo->alternative_position == 'left-fullback') selected @endif>Left Fullback
                    </option>
                    <option value="central-defender" @if ($playerInfo->alternative_position == 'central-defender') selected @endif>Central
                        Defender</option>
                    <option value="right-wing-back" @if ($playerInfo->alternative_position == 'right-wing-back') selected @endif>Right Wing Back
                    </option>
                    <option value="left-wing-back" @if ($playerInfo->alternative_position == 'left-wing-back') selected @endif>Left Wing Back
                    </option>
                    <option value="goalkeeper" @if ($playerInfo->alternative_position == 'goalkeeper') selected @endif>Goalkeeper</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="preferredFoot" class="form-label">Preferred Foot *</label>
                <select id="preferredFoot" class="form-select" name="preferredFoot">
                    <option value="" selected disabled>Select preferred foot</option>
                    <option value="right" @if ($playerInfo->preferred_foot == 'right') selected @endif>Right</option>
                    <option value="left" @if ($playerInfo->preferred_foot == 'left') selected @endif>Left</option>
                    <option value="both" @if ($playerInfo->preferred_foot == 'both') selected @endif>Both</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="speed" class="form-label">Speed (40-meter sprint time) *</label>
                <input type="text" class="form-control" id="speed" name="speed" value="{{ $playerInfo->speed }}">
            </div>
            <div class="mb-3">
                <label for="haveAgent" class="form-label">Do you have an agent? *</label>
                <div class="mb-3">
                    <input class="form-check-input" type="radio" name="haveAgent" id="yes" value="1"
                        {{ $playerInfo->have_agent == '1' ? 'checked' : '' }}>
                    <label for="yes">Yes</label>
                    <input class="form-check-input" type="radio" name="haveAgent" id="no" value="0"
                        {{ $playerInfo->have_agent == '0' ? 'checked' : '' }}>
                    <label for="no">No</label>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <button type="/dashboard/profile" class="btn cancel-btn">Cancel</button>
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
    $(".chosen-select-languages").chosen({
        no_results_text: "Oops, nothing found!"
    });
    var search = document.querySelector(".chosen-search-input");
    search.value = "Select max 5 languages";
</script>
