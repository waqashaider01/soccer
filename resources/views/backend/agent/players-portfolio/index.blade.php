<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    <a href="{{ route('players-portfolio.create') }}" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add Player Portfolio
    </a>
</div>
@if (session('players-portfolio-success'))
<div class="alert bg-success text-light alert-dismissible fade show" role="alert">
    {{ session('achievements-success') }}
    <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (count($playersPortfolio) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Agent ID</th>
            <th scope="col">Agent Name</th>
            <th scope="col">Player ID</th>
            <th scope="col">Player Name</th>
            <th scope="col">Player Profile Link</th>
            {{-- <th scope="col">Edit</th> --}}
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($playersPortfolio as $portfolio)
        <tr>
            <th scope="row">1</th>
            <td>{{ $portfolio->agent_id }}</td>
            <td>{{ $portfolio->agent->name }}</td>
            <td>{{ $portfolio->player_id }}</td>
            <td>{{ $portfolio->player->name }}</td>
            <td>
                <a href="{{ route('player-profile-detail', $portfolio->player->id) }}" class="btn btn-info">View Profile</a>
            </td>
            {{-- <td>
                <a href="{{ route('players-portfolio.edit', $portfolio->id) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                </a>
            </td> --}}
            <td>
                <form method="GET" action="{{ route('players-portfolio.delete', $portfolio->id) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" onclick="return confirm('Are you sure you want to delete?')"
                        class="btn-delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<b>No Players Portfolio yet!</b>
@endif
