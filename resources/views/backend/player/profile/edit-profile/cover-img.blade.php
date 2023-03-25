<form method="POST" action="/player/cover-img/save" id="upload-cover-form" enctype="multipart/form-data">
    @csrf
    @if ($playerInfo != null)
        <input type="hidden" class="form-control" id="oldImage" name="oldImage" value="{{ $playerInfo->cover_img }}">
        <div class="content">
            <div class="form-input">
                @if ($playerInfo->cover_img)
                    <img id="uploadedImg" src="{{ asset($playerInfo->cover_img) }}" width="100%" class="mb-4">
                @endif

                <div class="preview">
                    <img id="coverImg-preview" src="{{ $playerInfo->cover_img }}">
                </div>
                <label for="coverImg"><i class="fas fa-cloud-upload-alt"></i> Upload Cover</label>
                <input type="file" id="coverImg" accept="image/*" onchange="showPreview(event);" name="coverImage">
            </div>
        </div>
    @endif
    <div class="mb-3 d-flex justify-content-between">
        <button type="button" class="btn cancel-btn">Cancel</button>
        <button type="submit" class="btn save-btn">Save</button>
    </div>
</form>

<script>
    // Cover Image
    function showPreview(event) {
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
