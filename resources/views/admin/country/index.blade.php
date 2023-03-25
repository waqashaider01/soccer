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
                        Countries
                    </h4>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">Country Name</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr>
                                        <th>{{ $countries->firstItem() + $loop->index }}</th>
                                        <td>{{ $country->name }}</td>
                                        <td>{{ $country->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ url('/admin/countries/' . $country->id . '/edit') }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('/admin/countries/' . $country->id . '/delete') }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $countries->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header">
                        Add Country
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('countries.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Country Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Add Country</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
