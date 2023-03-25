@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('agent-transfer-history.update') }}">
                    @csrf

                    <input type="hidden" value="{{ $transferHistory->id }}" name="cid">

                    <div class="mb-3">
                        <label for="player_id" class="form-label">Select Player *</label>
                        <select id="player_id" class="form-select" name="player_id">
                            <option value="" selected disabled>Select player to fill other details</option>
                            @foreach ($allPlayers as $player)
                            <option value="{{ $player->id }}" @if ($transferHistory->player_id == $player->id) selected @endif>
                                {{ $player->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @error('player_id')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="date" name="date"
                            value="{{ old('date', $transferHistory->date) }}" placeholder="Enter date">
                    </div>
                    @error('date')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="club_from" class="form-label">From Club *</label>
                        <input type="text" class="form-control" id="club_from" name="club_from"
                            value="{{ old('club_from', $transferHistory->club_from) }}" placeholder="Enter from which club">
                    </div>
                    @error('club_from')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="club_to" class="form-label">To Club *</label>
                        <input type="text" class="form-control" id="club_to" name="club_to"
                            value="{{ old('club_to', $transferHistory->club_to) }}" placeholder="Enter to which club">
                    </div>
                    @error('club_to')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="transfer_type" class="form-label">Transfer Type *</label>
                        <select id="transfer_type" class="form-select" name="transfer_type">
                            <option value="" selected disabled>Select transfer type</option>
                            <option value="transfer" @if ($transferHistory->transfer_type == 'transfer') selected @endif>
                                Transfer</option>
                            <option value="free-agent" @if ($transferHistory->transfer_type == 'free-agent') selected @endif>
                                Free Agent</option>
                            <option value="loan" @if ($transferHistory->transfer_type == 'loan') selected @endif>
                                Loan</option>
                            <option value="back-from-loan" @if ($transferHistory->transfer_type == 'back-from-loan') selected @endif>Back from Loan</option>
                        </select>
                    </div>
                    @error('transfer_type')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{ route( Auth::user()->type . '.profile') }}"
                            class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
