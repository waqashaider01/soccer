@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
<div class="container">
    <div class="row">
        <!-- Button trigger modal -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('club.market-post-create') }}" class="btn add-btn">
                <i class="fas fa-plus-square"></i> Add Club Seeking Market Post
            </a>
        </div>
        @if (count($allClubs) > 0)
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allClubs as $club)
                <tr>
                    <th scope="row">{{ $club->id }}</th>
                    <th scope="row">
                        <img src="{{ asset($club->upload_logo) }}" alt="{{ $club->club_name }}"
                            style="height: 50px;">
                    </th>
                    <th scope="row">{{ $club->expiry_date }}</th>
                    <td>
                        <a href="{{ route('view-market-detail', [$club->slug, $club->id]) }}" class="btn-view" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('club.market-post-edit', $club->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="GET" action="{{ route('club.market-post-delete', $club->id) }}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" onclick="return confirm('Are you sure you want to delete?')"
                                class="btn-delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <b>No Club Seeking Market Post yet!</b>
        @endif
    </div>
</div>
@endsection
