@extends("backend.player.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{url('player/transfer-history/' .$PlayerTransferHistory->id)}}">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="transferDate" class="form-label">Transfer Date *</label>
                        <input type="date" class="form-control" id="transferDate" name="transferDate"
                            value="{{ $PlayerTransferHistory->transfer_date }}">
                    </div>
                    @error('transferDate')
                        <div class="text-danger mb-3">{{ $message ?? '' }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="transferFromTeam" class="form-label">Transfer From Team *</label>
                        <input type="text" class="form-control" id="transferFromTeam" name="transferFromTeam"
                            value="{{ $PlayerTransferHistory->transfer_from_team ?? '' }}">
                    </div>
                    @error('transferFromTeam')
                        <div class="text-danger mb-3">{{ $message  ?? ''}}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="transferToTeam" class="form-label">Transfer To Team *</label>
                        <input type="text" class="form-control" id="transferToTeam" name="transferToTeam"
                            value="{{ $PlayerTransferHistory->transfer_to_team ?? '' }}">
                    </div>
                    @error('transferToTeam')
                        <div class="text-danger mb-3">{{ $message ?? '' }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="transferType" class="form-label">Transfer Type *</label>
                        <select id="transferType" class="form-select" name="transferType">
                            <option value="Transfer" @if ($PlayerTransferHistory->transfer_type == 'Transfer') selected @endif>Transfer</option>
                            <option value="Free Agent" @if ($PlayerTransferHistory->transfer_type == 'Free Agent') selected @endif>Free Agent</option>
                            <option value="Loan" @if ($PlayerTransferHistory->transfer_type == 'Loan') selected @endif>Loan</option>
                            <option value="Back From Loan" @if ($PlayerTransferHistory->transfer_type == 'Back From Loan') selected @endif>Back From Loan
                            </option>
                        </select>
                    </div>
                    @error('transferType')
                        <div class="text-danger mb-3">{{ $message ?? '' }}</div>
                    @enderror
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{url('player/transfer-history/'.$PlayerTransferHistory->id) }}/edit"
                            class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
