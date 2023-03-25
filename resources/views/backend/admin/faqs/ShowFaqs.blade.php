@extends('backend.admin.layouts.app')
@push('styles')
@endpush

@section('content')

@if(count($faqs) > 0)

    <h2>All FAQs</h2>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Operation</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faqs as $faq)

        <tr>
            <td>{{ $faq->id }}</td>
            <td>{{ $faq->Question }}</td>
            <td>{{ $faq->Answer }}</td>
            <td>
                    <a href="editfaqs/{{$faq->id}}" class="btn btn-warning btnnn">
                    <i class="fas fa-check"></i> Edit</a> 
                    
                    <a href="deletefaqs/{{$faq->id}}" class="btn btn-danger btnn"
                    onclick="return confirm('Are you sure you want to reject?')">
                    <i class="fas fa-trash"></i> Delete</a>
            </td>
        </tr>

        @endforeach
    </tbody>
    </table>

    @else
        <h2>No FAQs yet!</h2>

    @endif

    <br>
    <a href="{{ route('admin.showfaqs')}}" class="btn btn-secondary">Show FAQs</a>
    <a href="{{ route('admin.faqform')}}" class="btn btn-secondary">Add FAQs</a>
    <a href="{{ route('admin.showfaqs')}}" class="btn btn-secondary">Edit FAQs</a>
    <a href="{{ route('admin.showfaqs')}}" class="btn btn-secondary">Delete FAQs</a>

@endsection