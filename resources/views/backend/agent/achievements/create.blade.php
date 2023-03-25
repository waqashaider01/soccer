@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('agent.achievement-store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="achievements" class="form-label">Achievements *</label>
                        <input type="number" class="form-control" id="achievements" name="achievements"
                            value="{{ old('achievements') }}" placeholder="Enter number of achievements">
                    </div>
                    @error('achievements')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="details" class="form-label">Details *</label>
                        <textarea class="form-control" placeholder="Add Details..." id="details" name="details"
                            value="{{ old('details') }}"></textarea>
                    </div>
                    @error('details')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="country_id" class="form-label">Country *</label>
                        <select id="country_id" class="form-select" name="country_id">
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
                        <label for="month" class="form-label">Month *</label>
                        <input type="text" class="form-control" id="month" name="month" value="{{ old('month') }}"
                            placeholder="Enter month e.g June">
                    </div>
                    @error('month')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="year" class="form-label">Year *</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ old('year') }}"
                            placeholder="Enter year e.g 1999">
                    </div>
                    @error('year')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{ route( Auth::user()->type . '.profile') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
