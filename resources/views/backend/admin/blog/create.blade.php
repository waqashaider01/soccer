@extends("backend.admin.layouts.app")
@push('styles')
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('store-blog', Auth::user()->type) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-10">
                            <label for="image" class="form-label">Image *</label>
                            <input type="file" class="form-control" id="image" name="image"
                                onchange="showPreview(event);">
                        </div>
                        <div class="col-2">
                            <div class="preview">
                                <img id="image-preview" width="100%">
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input class="form-control" placeholder="Title of blog..." id="title" name="title"
                            value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea id="blog-description" name="description" value="{{ old('description') }}" placeholder="Add description..."></textarea>
                    </div>
                    @error('description')
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
</script>
@endpush
