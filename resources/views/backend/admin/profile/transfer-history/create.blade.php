@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="/player/transfer-history">
                    @csrf
                    <div class="mb-3">
                        <label for="transferDate" class="form-label">Transfer Date *</label>
                        <input type="date" class="form-control" id="transferDate" name="transferDate"
                            value="{{ old('transferDate') }}">
                    </div>
                    @error('transferDate')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="transferFromTeam" class="form-label">Transfer From Team *</label>
                        <input type="text" class="form-control" id="transferFromTeam" name="transferFromTeam"
                            value="{{ old('transferFromTeam') }}">
                    </div>
                    @error('transferFromTeam')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="transferToTeam" class="form-label">Transfer To Team *</label>
                        <input type="text" class="form-control" id="transferToTeam" name="transferToTeam"
                            value="{{ old('transferToTeam') }}">
                    </div>
                    @error('transferToTeam')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="transferType" class="form-label">Transfer Type *</label>
                        <select id="transferType" class="form-select" name="transferType">
                            <option value="Transfer">Transfer</option>
                            <option value="Free Agent">Free Agent</option>
                            <option value="Loan">Loan</option>
                            <option value="Back From Loan">Back From Loan
                            </option>
                        </select>
                    </div>
                    @error('transferType')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="/player/tranfer-history/create" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
