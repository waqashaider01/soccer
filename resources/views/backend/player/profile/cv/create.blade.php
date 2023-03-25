@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('player.cv-store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV *</label>
                        <input type="file" class="form-control" id="cv" name="cv"
                            value="{{ old('cv') }}" placeholder="Select and upload cv">
                    </div>
                    @error('cv')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{ route('player.profile') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
