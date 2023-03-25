@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" action="{{ route('players-portfolio.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="player_id" class="form-label">Select Player *</label>
                        <select id="player_id" class="form-select" name="player_id">
                            <option value="" selected disabled>Select player to fill other details</option>
                            @foreach ($allPlayers as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('player_id')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="name" class="form-label">Player Name *</label>
                        <input type="name" class="form-control" id="name" name="name"
                            value="{{ old('name') }}" placeholder="Enter name">
                    </div>
                    @error('name')
                    <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="profile_link" class="form-label">Player Profile Link *</label>
                        <input type="profile_link" class="form-control" id="profile_link" name="profile_link"
                            value="{{ old('profile_link') }}" placeholder="Enter profile link">
                    </div>
                    @error('profile_link')
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
@push('scripts')

<script>
    $('#player_id').on('change', function () {
        var player_id = $(this).val();
        if (player_id) {
            $.ajax({
                url: "{{ route('players-portfolio.fetch') }}",
                type: "GET",
                data: {
                    player_id: player_id
                },
                dataType: "json",
                success: function (data) {
                    $('#name').val(data.name);
                    $('#profile_link').val("{{ route('player-profile-detail', 'id') }}".replace('id', data.id));
                }
            });
        }
    });
</script>

@endpush
