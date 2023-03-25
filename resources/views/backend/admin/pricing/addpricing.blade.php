@extends('backend.admin.layouts.app');
@push('styles')
@endpush

@section('content')

    <h2>Add pricing</h2><br>

    <form action="{{ route('admin.addpricing') }}" method="post">
        @csrf
        <label for="">Enter subscription</label><br>
        <input type="text" name="subs" id="" required="required"><br><br>
        <label for="">Enter Price</label><br>
        <input type="text" name="price" id="" required="required" ><br><br>
        <button type="submit" class="btn btn-primary">Save</button>

    </form>

    <br>
    <a href="{{ route('admin.showpricing') }}" class="btn btn-secondary">Show pricing</a>
    <a href="{{ route('admin.pricingform') }}" class="btn btn-secondary">Add pricing</a>
    <a href="{{ route('admin.showpricing') }}" class="btn btn-secondary">Edit pricing</a>
    <a href="{{ route('admin.showpricing') }}" class="btn btn-secondary">Delete pricing</a>

@endsection