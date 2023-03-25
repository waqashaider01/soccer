@extends('backend.admin.layouts.app')
@push('styles')
@endpush

@section('content')
    <h2>Add FAQs</h2><br>

    <form action="{{ route('admin.addfaqs') }}" method="post">
        @csrf
        <label for="">Enter FAQ question</label><br>
        <input type="text" name="question" id="" required="required"><br><br>
        <label for="">Enter FAQ answer</label><br>
        <textarea type="text" name="answer" id="" required="required" placeholder="Add Answer" cols="100" rows="10"></textarea><br><br>
        <button type="submit" class="btn btn-primary">Save</button>

    </form>

    <br>
    <a href="{{ route('admin.showfaqs')}}" class="btn btn-secondary">Show FAQs</a>
    <a href="{{ route('admin.faqform')}}" class="btn btn-secondary">Add FAQs</a>
    <a href="{{ route('admin.showfaqs')}}" class="btn btn-secondary">Edit FAQs</a>
    <a href="{{ route('admin.showfaqs')}}" class="btn btn-secondary">Delete FAQs</a>

@endsection