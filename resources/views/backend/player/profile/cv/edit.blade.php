@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('player.cv-update') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $cv->id }}" name="cid">

                    <div class="mb-3">
                        <label for="cv" class="form-label">Upload CV *</label>
                        <input type="file" class="form-control" id="cv" name="cv">
                    </div>
                    @error('cv')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="form-group mb-3">
                        <label for="cv" class="form-label">CV Name</label>
                        <input type="text" class="form-control" value="{{ $cv->cv }}">
                    </div>

                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{ route('player.profile') }}"
                            class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
