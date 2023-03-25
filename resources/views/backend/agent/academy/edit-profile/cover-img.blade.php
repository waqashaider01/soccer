<form method="POST" action="{{ route('agent.cover-img-save') }}" id="upload-cover-form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="oldImage" name="oldImage" value="{{ $agent->cover_img }}">
    <div class="content">
        <div class="form-input">
            @if ($agent->cover_img)
                <img id="uploadedImg" src="{{ asset($agent->cover_img) }}" width="100%" class="mb-4">
            @endif

            <div class="preview">
                <img id="coverImg-preview" src="{{ $agent->cover_img }}">
            </div>
            <label for="coverImg"><i class="fas fa-cloud-upload-alt"></i> Upload Cover</label>
            <input type="file" id="coverImg" accept="image/*" onchange="showCoverPreview(event);" name="coverImage">
        </div>
    </div>
    <div class="mb-3 d-flex justify-content-between">
        <button type="button" class="btn cancel-btn">Cancel</button>
        <button type="submit" class="btn save-btn">Save</button>
    </div>
</form>

<script>
    // Cover Image
    function showCoverPreview(event) {
        if (event.target.files.length > 0) {
            var uploadedImg = document.getElementById("uploadedImg");
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("coverImg-preview");
            preview.src = src;
            preview.style.display = "block";
            uploadedImg.style.display = "none";
        }
    }
</script>
