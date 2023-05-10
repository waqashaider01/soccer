<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    <a href="{{ route('agent.achievement-create') }}" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add Achievement
    </a>
</div>
@if (session('achievements-success'))
<div class="alert bg-success text-light alert-dismissible fade show" role="alert">
    {{ session('achievements-success') }}
    <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (count($achievements) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Achievements</th>
            <th scope="col">Details</th>
            <th scope="col">Country</th>
            <th scope="col">Month</th>
            <th scope="col">Year</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($achievements as $achievement)
        <tr>
            <th scope="row">1</th>
            <td>{{ $achievement->achievements }}</td>
            <td>{{ $achievement->details }}</td>
            <td>{{ $achievement->country->name }}</td>
            <td>{{ $achievement->month }}</td>
            <td>{{ $achievement->year }}</td>
            <td>
                <a href="{{ route('agent.achievement-edit', $achievement->id) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td>
                <form  action="{{ route('agent.achievement-delete', $achievement->id) }}" method="post">
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
<b>No Achievements yet!</b>
@endif
