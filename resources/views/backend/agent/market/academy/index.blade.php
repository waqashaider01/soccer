@extends("backend.agent.layouts.app")
@push('styles')
@endpush
@section('content')
<div class="container">
    <div class="row">
        <!-- Button trigger modal -->
        <div class="mb-3 d-flex justify-content-end">
            <a href="{{ route('academy.market-post-create') }}" class="btn add-btn">
                <i class="fas fa-plus-square"></i> Add Academy Market Post
            </a>
        </div>
        @if (count($allAcademy) > 0)
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
                @foreach ($allAcademy as $academy)
                <tr>
                    <th scope="row">{{ $academy->id }}</th>
                    <th scope="row">
                        <img src="{{ asset($academy->upload_logo) }}" alt="{{ $academy->academy_name }}"
                            style="height: 50px;">
                    </th>
                    <th scope="row">{{ $academy->expiry_date }}</th>
                    <td>
                        <a href="{{ route('view-market-detail', [$academy->slug, $academy->id]) }}" class="btn-view" target="_blank">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('academy.market-post-edit', $academy->id) }}" class="btn-edit">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="GET" action="{{ route('academy.market-post-delete', $academy->id) }}">
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
        <b>No Academy Market Post yet!</b>
        @endif
    </div>
</div>
@endsection
