@extends('backend.player.layouts.app')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <link rel="stylesheet" href="{{ asset('css/dashboard/activity.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
<div class="mb-3 d-flex justify-content-end">
    <a href="{{ route('create-blog', Auth::user()->type) }}" class="btn add-btn">
        <i class="fas fa-plus-square"></i> Add Blog
    </a>
</div>
@if (session('blogs-success'))
<div class="alert bg-success text-light alert-dismissible fade show" role="alert">
    {{ session('blogs-success') }}
    <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (count($blogs) > 0)
<h2>All Blogs</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
            <th>{{ $blog->id }}</th>
            <td><img src="{{ asset('images/blog/' . $blog->image) }}" width="20%" alt="{{ $blog->title }}"></td>
            <td>{{ $blog->title }}</td>
            <td>
                <a href="{{ route('edit-blog', [Auth::user()->type, $blog->id]) }}" class="btn-edit">
                    <i class="fas fa-edit"></i>
                </a>
            </td>
            <td>
                <form method="GET" action="{{ route('delete-blog', [Auth::user()->type, $blog->id]) }}">
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
<b>No Blogs yet!</b>
@endif
@endsection
