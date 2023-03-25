@extends("admin.layouts.app")
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <h4 class="card-header">
                        Languages
                    </h4>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Language Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($languages as $language)
                                    <tr>
                                        <th>{{ $languages->firstItem() + $loop->index }}</th>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ url('/admin/languages/' . $language->id . '/edit') }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('/admin/languages/' . $language->id . '/delete') }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $languages->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header">
                        Add Language
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('languages.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Language Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Add Language</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
