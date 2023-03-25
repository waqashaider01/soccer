@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="/player/career-match-data/{{ $PlayerCareerMatchData->id }}">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="season" class="form-label">Season *</label>
                        <select id="season" class="form-select" name="season">
                            <option value="2022/2023" @if ($PlayerCareerMatchData->season == '2022/2023') selected @endif>2022/2023</option>
                            <option value="2021/2022" @if ($PlayerCareerMatchData->season == '2021/2022') selected @endif>2021/2022</option>
                            <option value="2020/2021" @if ($PlayerCareerMatchData->season == '2020/2021') selected @endif>2020/2021</option>
                            <option value="2019/2020" @if ($PlayerCareerMatchData->season == '2019/2020') selected @endif>2019/2020</option>
                            <option value="2018/2019" @if ($PlayerCareerMatchData->season == '2018/2019') selected @endif>2018/2019</option>
                            <option value="2017/2018" @if ($PlayerCareerMatchData->season == '2017/2018') selected @endif>2017/2018</option>
                            <option value="2016/2017" @if ($PlayerCareerMatchData->season == '2016/2017') selected @endif>2016/2017</option>
                            <option value="2015/2016" @if ($PlayerCareerMatchData->season == '2015/2016') selected @endif>2015/2016</option>
                            <option value="2014/2015" @if ($PlayerCareerMatchData->season == '2014/2015') selected @endif>2014/2015</option>
                            <option value="2013/2014" @if ($PlayerCareerMatchData->season == '2013/2014') selected @endif>2013/2014</option>
                            <option value="2012/2013" @if ($PlayerCareerMatchData->season == '2012/2013') selected @endif>2012/2013</option>
                            <option value="2011/2012" @if ($PlayerCareerMatchData->season == '2011/2012') selected @endif>2011/2012</option>
                            <option value="2010/2011" @if ($PlayerCareerMatchData->season == '2010/2011') selected @endif>2010/2011</option>
                        </select>
                    </div>
                    @error('season')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="team" class="form-label">Team *</label>
                        <input type="text" class="form-control" id="team" name="team"
                            value="{{ $PlayerCareerMatchData->team }}">
                    </div>
                    @error('team')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="country" class="form-label">Country *</label>
                        <select id="country" class="form-select" name="country">
                            <option value="" selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                @if ($PlayerCareerMatchData->country == $country->id)
                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                @else
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('country')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="competition" class="form-label">Competition *</label>
                        <select id="competition" class="form-select" name="competition">
                            <option value="League" @if ($PlayerCareerMatchData->competition == 'League') selected @endif>League</option>
                            <option value="Domestic Cups" @if ($PlayerCareerMatchData->competition == 'Domestic Cups') selected @endif>Domestic Cups
                            </option>
                            <option value="International Cups" @if ($PlayerCareerMatchData->competition == 'International Cups') selected @endif>
                                International Cups</option>
                            <option value="National Team" @if ($PlayerCareerMatchData->competition == 'National Team') selected @endif>National Team
                            </option>
                        </select>
                    </div>
                    @error('competition')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="matchesPlayed" class="form-label">Matches Played *</label>
                        <input type="number" class="form-control" id="matchesPlayed" name="matchesPlayed"
                            value="{{ $PlayerCareerMatchData->matches_played }}">
                    </div>
                    @error('matchesPlayed')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="goals" class="form-label">Goals *</label>
                        <input type="number" class="form-control" id="goals" name="goals"
                            value="{{ $PlayerCareerMatchData->goals }}">
                    </div>
                    @error('goals')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="assists" class="form-label">Assists *</label>
                        <input type="number" class="form-control" id="assists" name="assists"
                            value="{{ $PlayerCareerMatchData->assists }}">
                    </div>
                    @error('assists')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="substituteIn" class="form-label">Substitute In *</label>
                        <input type="number" class="form-control" id="substituteIn" name="substituteIn"
                            value="{{ $PlayerCareerMatchData->substitute_in }}">
                    </div>
                    @error('substituteIn')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="substituteOut" class="form-label">Substitute Out *</label>
                        <input type="number" class="form-control" id="substituteOut" name="substituteOut"
                            value="{{ $PlayerCareerMatchData->substitute_out }}">
                    </div>
                    @error('substituteOut')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="yellowCards" class="form-label">Yellow Cards *</label>
                        <input type="number" class="form-control" id="yellowCards" name="yellowCards"
                            value="{{ $PlayerCareerMatchData->yellow_cards }}">
                    </div>
                    @error('yellowCards')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="secondYellowCards" class="form-label">Second Yellow Cards *</label>
                        <input type="number" class="form-control" id="secondYellowCards" name="secondYellowCards"
                            value="{{ $PlayerCareerMatchData->second_yellow_cards }}">
                    </div>
                    @error('secondYellowCards')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="redCards" class="form-label">Red Cards *</label>
                        <input type="number" class="form-control" id="redCards" name="redCards"
                            value="{{ $PlayerCareerMatchData->red_cards }}">
                    </div>
                    @error('redCards')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/player/career-match-data/{{ $PlayerCareerMatchData->id }}/edit"
                            class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
