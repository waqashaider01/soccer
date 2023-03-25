@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('player.achievement-update') }}">
                    @csrf

                    <input type="hidden" value="{{ $achievement->id }}" name="cid">

                    <div class="mb-3">
                        <label for="achievements" class="form-label">Achievements *</label>
                        <input type="number" class="form-control" id="achievements" name="achievements"
                            value="{{ $achievement->achievements }}">
                    </div>
                    @error('achievements')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="details" class="form-label">Details *</label>
                        <textarea class="form-control" placeholder="Add Details..." id="details"
                            name="details">{{ $achievement->details }}</textarea>
                    </div>
                    @error('details')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="country_id" class="form-label">Country *</label>
                        <select id="country_id" class="form-select" name="country_id">
                            <option value="" selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                @if ($achievement->country_id == $country->id)
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
                        <label for="month" class="form-label">Month *</label>
                        <input type="text" class="form-control" id="month" name="month"
                            value="{{ $achievement->month }}">
                    </div>
                    @error('month')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="year" class="form-label">Year *</label>
                        <input type="text" class="form-control" id="year" name="year"
                            value="{{ $achievement->year }}">
                    </div>
                    @error('year')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{ route('player.all-achievements') }}"
                            class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
