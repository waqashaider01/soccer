@extends("backend.admin.layouts.app")
@push('styles')
@endpush
@section('content')
@if (session('blogs-success'))
<div class="alert bg-success text-light alert-dismissible fade show" role="alert">
    {{ session('blogs-success') }}
    <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (count($blogs) > 0)
<style>
    .btnnn:hover{
       background-color:transparent;
color:black !important;
font-weight:500;
    }
    .btnn:hover{
        background-Color:transparent;
        color:red !important;
font-weight:500;
    }
</style>

<div class="d-flex justify-content-end mt-3">
    <a href="{{ url('admin/create-blog') }}">
<button type="button" class="btn btn-info">Add Blog</button>
</a>
</div>

<h2>All Blogs</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">SN</th>
            {{-- <th scope="col">Image</th> --}}
            <th scope="col">Title</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <th>{{ $blog->id }}</th>
            {{-- <td><img src="{{ asset('images/blog/' . $blog->image) }}" width="20%" alt="{{ $blog->title }}"></td> --}}
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->status ?? 'Null' }}</td>
            <td>
                <a href="{{ route('admin.accept-blog', $blog->id) }}" class="btn btn-warning btnnn">
                    <i class="fas fa-check"></i>
                </a>
                <a href="{{ route('edit-blog', [Auth::user()->type, $blog->id]) }}" class="btn btn-info btnn">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('admin.reject-blog', $blog->id) }}" class="btn btn-danger btnn"
                    onclick="return confirm('Are you sure you want to reject?')">
                    <i class="fas fa-trash"></i>
                </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<b>No Blogs yet!</b>
@endif
@endsection
