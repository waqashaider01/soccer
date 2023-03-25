@extends("backend.admin.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/admin/edit/privacy"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <h1 class="text-center">Edit Privacy Policy</h1>
                    <div class="mb-3">
                        @foreach($privaccy as $privaccys)
                            
                       
                        <label for="descriptionn" class="form-label">Description *</label>
                        <textarea id="blog-description" name="privacy_policy" value="" placeholder="Add description...">{!!$privaccys['privacy_policy'] !!}</textarea>
                        @endforeach
                    </div>
                    @error('descriptionn')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    
                    <div class="mb-3 d-flex justify-content-between">
                        <a href="{{ route( Auth::user()->type . '.dashboard') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    CKEDITOR.replace('blog-description');

    function showPreview(event) {
        if (event.target.files.length > 0) {
            var image = document.getElementById("image");
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("image-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>php 
@endpush
