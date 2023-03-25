@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="/player/next-match-schedule">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="myTeam" class="form-label">My Team *</label>
                            <input type="text" class="form-control" id="myTeam" name="myTeam"
                                value="{{ old('myTeam') }}">
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
                                value="{{ old('opposingTeam') }}">
                        </div>
                        @error('opposingTeam')
                            <div class="text-danger mb-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="homeMatch" class="form-label">Home Match *</label>
                        <div class="mb-3">
                            <input class="form-check-input" type="radio" name="homeMatch" id="yes" value="1">
                            <label for="yes">Yes</label>
                            <input class="form-check-input" type="radio" name="homeMatch" id="no" value="0">
                            <label for="no">No</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="matchType" class="form-label">Match Type *</label>
                        <select id="matchType" class="form-select" name="matchType">
                            <option value="1st Division">1st Division</option>
                            <option value="2nd Division">2nd Division</option>
                            <option value="3rd Division">3rd Division</option>
                            <option value="4th Division">4th Division</option>
                            <option value="Amateur League">Amateur League</option>
                            <option value="International Match">International Match</option>
                            <option value="Cup Match">Cup Match</option>
                        </select>
                    </div>
                    @error('matchType')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="venue" class="form-label">Venue *</label>
                        <input type="text" class="form-control" id="venue" name="venue" value="{{ old('venue') }}">
                    </div>
                    @error('venue')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                    </div>
                    @error('date')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="time" class="form-label">Time *</label>
                        <input type="time" class="form-control" id="time" name="time" value="{{ old('time') }}">
                    </div>
                    @error('time')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="liveStream" class="form-label">Live Stream Link (if available)
                        </label>
                        <input type="url" class="form-control" id="liveStream" name="liveStream"
                            value="{{ old('liveStream') }}">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/player/next-match-schedule/create" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
