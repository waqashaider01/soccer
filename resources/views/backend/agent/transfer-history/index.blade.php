<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    <a href="{{ route('agent-transfer-history.create') }}" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add Transfer History
    </a>
</div>
@if (session('achievements-success'))
<div class="alert bg-success text-light alert-dismissible fade show" role="alert">
    {{ session('achievements-success') }}
    <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (count($transferHistory) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Agent ID</th>
            <th scope="col">Agent Name</th>
            <th scope="col">Player ID</th>
            <th scope="col">Player Name</th>
            <th scope="col">Date</th>
            <th scope="col">Club From</th>
            <th scope="col">Club To</th>
            <th scope="col">Transfer Type</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transferHistory as $history)
        <tr>
            <th scope="row">1</th>
            <td>{{ $history->agent_id }}</td>
            <td>{{ $history->agent->name }}</td>
            <td>{{ $history->player_id }}</td>
            <td>{{ $history->player->name }}</td>
            <td>{{ $history->date }}</td>
            <td>{{ $history->club_from }}</td>
            <td>{{ $history->club_to }}</td>
            <td>{{ ucfirst(str_replace('-', ' ', $history->transfer_type)) }}</td>
            <td>
                <a href="{{ route('agent-transfer-history.edit', $history->id) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td>
                <form method="GET" action="{{ route('agent-transfer-history.delete', $history->id) }}">
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
<b>No Transfer Histories yet!</b>
@endif
