<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    <a href="/player/transfer-history/create" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add Transfer
        History
    </a>
</div>

@if (session('transfer-history-success'))
    <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
        {{ session('transfer-history-success') }}
        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (count($PlayerTransferHistories) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Transfer Date</th>
                <th scope="col">Transfer From Team</th>
                <th scope="col">Transfer To Team</th>
                <th scope="col">Transfer Type</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($PlayerTransferHistories as $PlayerTransferHistory)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $PlayerTransferHistory->transfer_date }}</td>
                    <td>{{ $PlayerTransferHistory->transfer_from_team }}</td>
                    <td>{{ $PlayerTransferHistory->transfer_to_team }}</td>
                    <td>{{ $PlayerTransferHistory->transfer_type }}</td>
                    <td>
                        <a href="/player/transfer-history/{{ $PlayerTransferHistory->id }}/edit"
                            class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/player/transfer-history/{{ $PlayerTransferHistory->id }}">
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
    <b>No tranfer history yet!</b>
@endif
