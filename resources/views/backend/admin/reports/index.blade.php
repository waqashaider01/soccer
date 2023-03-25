@extends('backend.admin.layouts.app')
@push('styles')
@endpush
@section('content')
    @if (session('reports-success'))
        <div class="alert bg-success text-light alert-dismissible fade show" role="alert">
            {{ session('reports-success') }}
            <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (count($reports) > 0)
        <style>
            <style>.btnnnn:hover {
                background-color: transparent !important;
                color: black !important;
                font-weight: 500;
            }

            .btn-check:focus+.btn,
            .btn:focus,
            .btn:hover {
                background-color: #141414;
                border-color: var(--bs-btn-hover-border-color);
                color: var(--bs-btn-hover-color);
            }

            .btnn:hover {
                background-Color: transparent;
                color: red !important;
                font-weight: 500;
            }
        </style>
        <h2>All Reports</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Report Against</th>
                    <th scope="col">Type</th>
                    <th scope="col" style="width:40%">Reason</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <th>{{ $report->id }}</th>
                        <td>{{ $report->user->name }}</td>
                        <td>{{ $report->type }}</td>
                        <td>{{ $report->reason }}</td>
                        <td>
                            <a href="{{ route('admin.accept-report', $report->id) }}" title="Edit"
                                class="btnnnn btn btn-warning ">
                                <i class="fas fa-check"></i>
                            </a>

                            <a href="{{ route('admin.reject-report', $report->id) }}" title="Reject"
                                class="btn btn-danger btnn" data-toggle="modal" data-target="#exampleModal"
                                onclick="return confirm('Are you sure you want to reject?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure You want to report permenantly</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="button" class="btn btn-danger">Report</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <b>No Reports yet!</b>
    @endif
@endsection
