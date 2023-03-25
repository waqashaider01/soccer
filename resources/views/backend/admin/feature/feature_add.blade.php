@extends('backend.admin.layouts.app')
@push('styles')
@endpush
@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Market Post/month</th>
                <th>Message/month</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Feature as $Feature)
                <tr>
                    <td>{{ $Feature->id ?? '' }}</td>
                    <td>{{ $Feature->market_post_pre_month ?? '' }}</td>
                    <td>{{ $Feature->messages_pre_month }}</td>
                    <td>
                        <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade p-2 bg-dark text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-white" id="exampleModalLabel">Update Feature</h2>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/feature/' . $Feature->id) }}" method="post">
                        @csrf
                        <input class="form-control form-control mb-2" type="text"
                            value="{{ $Feature->market_post_pre_month }}" aria-label=".form-control example" name="market">
                        <input class="form-control form-control mb-2" type="text"
                            value="{{ $Feature->messages_pre_month }}" name="message" aria-label=".form-control example">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
