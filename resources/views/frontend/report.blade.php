@extends('frontend.layouts.app')
@push('styles')
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-10 py-5 mx-auto">
            <div class="text-center mb-2" style="border-bottom:1px solid red">
                <h1>Submit Your Report</h1>
            </div>
            <div class="row col-md-6">
                <form method="POST" action="{{ route('submit-report') }}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    {{-- <input type="hidden" name="reported_id" value="{{  }}"> --}}

                    <div class="form-group">
                        <label for="type" class="form-label">Select Report Type *</label>
                        <select name="type" id="type" class="form-control">
                            <option value="volvo" selected disabled>Report Type</option>
                            <option value="spam">Spam</option>
                            <option value="abuse">Abuse or Harassment</option>
                            <option value="violence">Violence or Physical Harm</option>
                            <option value="offensive">Rude or Offensive</option>
                            <option value="inappropriate">Inappropriate Content</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reason" class="form-label">Add Reason *</label>
                        <textarea class="form-control" name="reason" id="reason" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
