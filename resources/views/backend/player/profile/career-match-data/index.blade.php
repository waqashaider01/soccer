<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    <a href="/player/career-match-data/create" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add Career Match Data
    </a>
</div>

@if (session('success'))
    <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (count($PlayerCareerMatchDatas) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Season</th>
                <th scope="col">Team</th>
                <th scope="col">Country</th>
                <th scope="col">Competition</th>
                <th scope="col">Matches Played</th>
                <th scope="col">Goals</th>
                <th scope="col">Assists</th>
                <th scope="col">Substitute In</th>
                <th scope="col">Substitute Out</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($PlayerCareerMatchDatas as $PlayerCareerMatchData)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $PlayerCareerMatchData->season }}</td>
                    <td>{{ $PlayerCareerMatchData->team }}</td>
                    <td>{{ $PlayerCareerMatchData->country }}</td>
                    <td>{{ $PlayerCareerMatchData->competition }}</td>
                    <td>{{ $PlayerCareerMatchData->matches_played }}</td>
                    <td>{{ $PlayerCareerMatchData->goals }}</td>
                    <td>{{ $PlayerCareerMatchData->assists }}</td>
                    <td>{{ $PlayerCareerMatchData->substitute_in }}</td>
                    <td>{{ $PlayerCareerMatchData->substitute_out }}</td>
                    <td>
                        <a href="/player/career-match-data/{{ $PlayerCareerMatchData->id }}/edit"
                            class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/player/career-match-data/{{ $PlayerCareerMatchData->id }}">
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
    <b>No career match data yet!</b>
@endif
