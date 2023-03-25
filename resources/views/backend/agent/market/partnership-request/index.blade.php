@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
<div class="container">
    <div class="row">
        <!-- Button trigger modal -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('partnership-request.market-post-create') }}" class="btn add-btn">
                <i class="fas fa-plus-square"></i> Add Partnership Requests Market Post
            </a>
        </div>
        @if (count($partnershipRequests) > 0)
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
                @foreach ($partnershipRequests as $request)
                <tr>
                    <th scope="row">{{ $request->id }}</th>
                    <th scope="row">
                        <img src="{{ asset($request->upload_logo) }}" alt="Logo"
                            style="height: 50px;">
                    </th>
                    <th scope="row">{{ $request->expiry_date }}</th>
                    <td>
                        <a href="{{ route('view-market-detail', [$request->slug, $request->id]) }}" class="btn-view" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('partnership-request.market-post-edit', $request->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="GET" action="{{ route('partnership-request.market-post-delete', $request->id) }}">
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
        <b>No Partnership Requests Market Post yet!</b>
        @endif
    </div>
</div>
@endsection
