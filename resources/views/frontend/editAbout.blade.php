@extends("backend.admin.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/admin/edit/about"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        
                        <h1 class="text-center">Edit About Us</h1>
                        @foreach($privaccy as $privaccys)
                    <div class="mb-3">
                        
                        <textarea id="blog-description" name="partA" value="" placeholder="Add description...">{!!$privaccys['partA'] !!}</textarea>
                    </div>
                    @error('terms_conditions')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        
                        <textarea id="blogg-description" name="partB" value="" placeholder="Add description...">{!!$privaccys['partB'] !!}</textarea>
                    </div>
                    @error('terms_conditions')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        
                        <textarea id="bloggg-description" name="partC" value="" placeholder="Add description...">{!!$privaccys['partC'] !!}</textarea>
                    </div>
                    @error('terms_conditions')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror
                    @endforeach
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

    CKEDITOR.replace('bloggg-description');

    CKEDITOR.replace('blogg-description');

    function showPreview(event) {
        if (event.target.files.length > 0) {
            var image = document.getElementById("image");
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("image-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script>
@endpush
