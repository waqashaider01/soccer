@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
<div class="container">
    <div class="row">
        <!-- Button trigger modal -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('recommend-player.market-post-create') }}" class="btn add-btn">
                <i class="fas fa-plus-square"></i> Add Recommend A Player Market Post
            </a>
        </div>
        @if (count($allRecommendPlayers) > 0)
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
                @foreach ($allRecommendPlayers as $recommendPlayer)
                <tr>
                    <th scope="row">{{ $recommendPlayer->id }}</th>
                    <th scope="row">
                        <img src="{{ asset($recommendPlayer->upload_logo) }}" alt="Image"
                            style="height: 50px;">
                    </th>
                    <th scope="row">{{ $recommendPlayer->expiry_date }}</th>
                    <td>
                        <a href="{{ route('view-market-detail', [$recommendPlayer->slug, $recommendPlayer->id]) }}" class="btn-view" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('recommend-player.market-post-edit', $recommendPlayer->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="GET" action="{{ route('recommend-player.market-post-delete', $recommendPlayer->id) }}">
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
        <b>No Recommend A Player Market Post yet!</b>
        @endif
    </div>
</div>
@endsection
