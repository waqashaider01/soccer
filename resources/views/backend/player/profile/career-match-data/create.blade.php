@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <h3 class="text-center">Add Career Match </h3>
                <form method="POST" action="/player/career-match-data">
                    @csrf
                    <div class="mb-3">
                        <label for="season" class="form-label">Season *</label>
                        <select id="season" class="form-select" name="season">
                            <option value="2022/2023">2022/2023</option>
                            <option value="2021/2022">2021/2022</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2019/2020">2019/2020</option>
                            <option value="2018/2019">2018/2019</option>
                            <option value="2017/2018">2017/2018</option>
                            <option value="2016/2017">2016/2017</option>
                            <option value="2015/2016">2015/2016</option>
                            <option value="2014/2015">2014/2015</option>
                            <option value="2013/2014">2013/2014</option>
                            <option value="2012/2013">2012/2013</option>
                            <option value="2011/2012">2011/2012</option>
                            <option value="2010/2011">2010/2011</option>
                        </select>
                    </div>
                    @error('season')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="team" class="form-label">Team *</label>
                        <input type="text" class="form-control" id="team" name="team">
                    </div>
                    @error('team')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="country" class="form-label">Country *</label>
                        <select id="country" class="form-select" name="country">
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
                        <label for="competition" class="form-label">Competition *</label>
                        <select id="competition" class="form-select" name="competition">
                            <option value="League">League</option>
                            <option value="Domestic Cups">Domestic Cups</option>
                            <option value="International Cups">International Cups</option>
                            <option value="National Team">National Team</option>
                        </select>
                    </div>
                    @error('competition')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="matchesPlayed" class="form-label">Matches Played *</label>
                        <input type="number" class="form-control" id="matchesPlayed" name="matchesPlayed">
                    </div>
                    @error('matchesPlayed')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="goals" class="form-label">Goals *</label>
                        <input type="number" class="form-control" id="goals" name="goals">
                    </div>
                    @error('goals')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="assists" class="form-label">Assists *</label>
                        <input type="number" class="form-control" id="assists" name="assists">
                    </div>
                    @error('assists')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="substituteIn" class="form-label">Substitute In *</label>
                        <input type="number" class="form-control" id="substituteIn" name="substituteIn">
                    </div>
                    @error('substituteIn')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="substituteOut" class="form-label">Substitute Out *</label>
                        <input type="number" class="form-control" id="substituteOut" name="substituteOut">
                    </div>
                    @error('substituteOut')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="yellowCards" class="form-label">Yellow Cards *</label>
                        <input type="number" class="form-control" id="yellowCards" name="yellowCards">
                    </div>
                    @error('yellowCards')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="secondYellowCards" class="form-label">Second Yellow Cards *</label>
                        <input type="number" class="form-control" id="secondYellowCards" name="secondYellowCards">
                    </div>
                    @error('secondYellowCards')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="redCards" class="form-label">Red Cards *</label>
                        <input type="number" class="form-control" id="redCards" name="redCards">
                    </div>
                    @error('redCards')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/player/career-match-data/create" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
