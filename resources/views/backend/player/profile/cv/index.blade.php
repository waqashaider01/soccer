<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    {{-- <a href="{{ route('player.cv-create') }}" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add CV
    </a> --}}
</div>
@if (session('cv-success'))
    <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
        {{ session('cv-success') }}
        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (count($PlayerCVs) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Player Name</th>
                <th scope="col">CV</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($PlayerCVs as $PlayerCV)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $PlayerCV->player->name }}</td>
                    <td>{{ $PlayerCV->cv }}</td>
                    <td>
                        <a href="{{ route('player.cv-edit', $PlayerCV->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('player.achievement-delete', $PlayerCV->id) }}">
                            @csrf
                            @method('DELETE')
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
    <b>No CV yet!</b>
@endif
