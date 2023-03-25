@extends('backend.admin.layouts.app')
@push('styles')
@endpush
@section('content')
<form action="{{ url('sub/store') }}" method="post">
    @csrf
    <input type="number" name="duration" class="form-control mb-3"
        placeholder="Enter your duration">
    <input type="number" name="price" class="form-control mb-3"
        placeholder="Enter your price">
    <button type="submit" class="mb-2 btn btn-primary">Add</button>
</form>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Duration</th>
                </th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subs as $sub)
                <tr>
                    <td>{{ $sub->id ?? '' }}</td>
                    <td>{{ $sub->duration ?? '' }}</td>
                    <td>{{ $sub->price ?? '' }}</td>
                    <td>{{ $sub->status ?? '' }}</td>
                    <td>
                        <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $sub->id }}"
                            class="btn btn-info">Edit</a>
                        <a href="{{ url('delete/' . $sub->id) }}"
                            class="btn btn-danger ms-2">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

{{-- model for edit --}}
@foreach ($subs as $sub)
    <div class="modal fade" id="exampleModal{{ $sub->id }}" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Subscription</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="{{ url('update/' . $sub->id) }}" method="post">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <input type="number" name="duration" class="form-control mb-3"
                            value="{{ $sub->duration }}">
                        <input type="number" name="price" class="form-control mb-3"
                            value="{{ $sub->price }}">
                        <input type="number" name="status" class="form-control mb-3"
                            value="{{ $sub->status }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
@endforeach

@endsection

{{-- @section('content') --}}
{{--
@if(count($pricing)> 0)

    <h2>All Pricings</h2>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Subscription</th>
            <th scope="col">Price</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pricing as $pricing)

        <tr>
            <td>{{ $pricing->id }}</td>
            <td>{{ $pricing->Subscription }}</td>
            <td>{{ $pricing->Price }}</td>
            <td>
                    <a href="editpricing/{{$pricing->id}}" class="btn btn-warning btnnn">
                    <i class="fas fa-check"></i> Edit</a>

                    <a href="deletepricing/{{$pricing->id}}" class="btn btn-danger btnn"
                    onclick="return confirm('Are you sure to delete?')">
                    <i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>

        @endforeach
    </tbody>
    </table>

@else
<h2>No Pricings set!</h2>

@endif

<br>
    <a href="{{ route('admin.showpricing') }}" class="btn btn-secondary">Show pricing</a>
    <a href="{{ route('admin.pricingform') }}" class="btn btn-secondary">Add pricing</a>
    <a href="{{ route('admin.showpricing') }}" class="btn btn-secondary">Edit pricing</a>
    <a href="{{ route('admin.showpricing') }}" class="btn btn-secondary">Delete pricing</a>

@endsection --}}
