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
                        Cities
                    </h4>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr>
                                        <th>{{ $cities->firstItem() + $loop->index }}</th>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->coutry->name }}</td>
                                        <td>{{ $city->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="{{ url('/admin/cities/' . $city->id . '/edit') }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url('/admin/cities/' . $city->id . '/delete') }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $cities->links() }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h4 class="card-header">
                        Add City
                    </h4>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cities.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="country" class="form-label">Country Name</label>
                                <select id="country" class="form-select" name="country">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">City Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name">
                            </div>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Add City</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
