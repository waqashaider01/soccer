@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="/player/next-match-schedule/{{ $PlayerNextMatchSchedule->id }}">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="myTeam" class="form-label">My Team *</label>
                            <input type="text" class="form-control" id="myTeam" name="myTeam"
                                value="{{ $PlayerNextMatchSchedule->my_team }}">
                        </div>
                        @error('myTeam')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                        <div class="col-md-2 mb-3">
                            <span class="text-center">VS</span>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label for="opposingTeam" class="form-label">Opposing Team
                                *</label>
                            <input type="text" class="form-control" id="opposingTeam" name="opposingTeam"
                                value="{{ $PlayerNextMatchSchedule->opposing_team }}">
                        </div>
                        @error('opposingTeam')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="homeMatch" class="form-label">Home Match *</label>
                        <div class="mb-3">
                            <input class="form-check-input" type="radio" name="homeMatch" id="yes" value="1"
                                {{ $PlayerNextMatchSchedule->home_match == '1' ? 'checked' : '' }}>
                            <label for="yes">Yes</label>
                            <input class="form-check-input" type="radio" name="homeMatch" id="no" value="0"
                                {{ $PlayerNextMatchSchedule->home_match == '0' ? 'checked' : '' }}>
                            <label for="no">No</label>
                        </div>
                    </div>
                    @error('homeMatch')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="matchType" class="form-label">Match Type *</label>
                        <select id="matchType" class="form-select" name="matchType">
                            <option value="1st Division" @if ($PlayerNextMatchSchedule->match_type == '1st Division') selected @endif>1st Division
                            </option>
                            <option value="2nd Division" @if ($PlayerNextMatchSchedule->match_type == '2nd Division') selected @endif>2nd Division
                            </option>
                            <option value="3rd Division" @if ($PlayerNextMatchSchedule->match_type == '3rd Division') selected @endif>3rd Division
                            </option>
                            <option value="4th Division" @if ($PlayerNextMatchSchedule->match_type == '4th Division') selected @endif>4th Division
                            </option>
                            <option value="Amateur League" @if ($PlayerNextMatchSchedule->match_type == 'Amateur League') selected @endif>Amateur League
                            </option>
                            <option value="International Match" @if ($PlayerNextMatchSchedule->match_type == 'International Match') selected @endif>
                                International Match</option>
                            <option value="Cup Match" @if ($PlayerNextMatchSchedule->match_type == 'Cup Match') selected @endif>Cup Match</option>
                        </select>
                    </div>
                    @error('matchType')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="venue" class="form-label">Venue *</label>
                        <input type="text" class="form-control" id="venue" name="venue"
                            value="{{ $PlayerNextMatchSchedule->venue }}">
                    </div>
                    @error('venue')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ $PlayerNextMatchSchedule->date }}">
                    </div>
                    @error('date')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="time" class="form-label">Time *</label>
                        <input type="time" class="form-control" id="time" name="time"
                            value="{{ $PlayerNextMatchSchedule->time }}">
                    </div>
                    @error('time')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="liveStream" class="form-label">Live Stream Link (if available)
                        </label>
                        <input type="url" class="form-control" id="liveStream" name="liveStream"
                            value="{{ $PlayerNextMatchSchedule->live_stream }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/player/next-match-schedule/{{ $PlayerNextMatchSchedule->id }}/edit"
                            class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
