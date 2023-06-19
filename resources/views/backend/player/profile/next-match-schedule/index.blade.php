<!-- Button trigger modal -->
<div class="mb-3 d-flex justify-content-end">
    <a href="{{url('player/next-match-schedule/create')}}" class="btn add-btn">
        <i class="fas fa-plus-square"></i>Add Next Match
    </a>
</div>

@if (session('next-match-success'))
    <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
        {{ session('next-match-success') }}
        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (count($PlayerNextMatchSchedules) > 0)
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">SN</th>
                <th scope="col">Day/Date</th>
                <th scope="col">My Team</th>
                <th scope="col">Opposing Team</th>
                <th scope="col">Home/Away</th>
                <th scope="col">Match Type</th>
                <th scope="col">Venue</th>
                <th scope="col">Time</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($PlayerNextMatchSchedules ?? [] as $PlayerNextMatchSchedule)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $PlayerNextMatchSchedule->date ?? ''}}</td>
                    <td>{{ $PlayerNextMatchSchedule->my_team ?? '' }}</td>
                    <td>{{ $PlayerNextMatchSchedule->opposing_team ?? '' }}</td>
                    <td>{{ $PlayerNextMatchSchedule->home_match == 1 ? 'Home' : 'Away' }}</td>
                    <td>{{ $PlayerNextMatchSchedule->match_type  ?? ''}}</td>
                    <td>{{ $PlayerNextMatchSchedule->venue  ?? ''}}</td>
                    <td>{{ $PlayerNextMatchSchedule->time ?? ''}}</td>
                    <td>
                        <a href="{{url('player/next-match-schedule/'.$PlayerNextMatchSchedule->id.'/edit')}}"
                            class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{url('player/next-match-schedule/'.$PlayerNextMatchSchedule->id) }}">
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
    <b>No Next Natch Schedule yet!</b>
@endif
