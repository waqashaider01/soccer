<form method="POST" action="/player/profile-img/save" id="upload-profile-form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="oldImage" name="oldImage" value="{{ $playerInfo->profile_img }}">
    <div class="content">
        <div class="form-input">
            @if ($playerInfo->profile_img)
                <img id="uploadedImg" src="{{ asset($playerInfo->profile_img) }}" width="100%" class="mb-4">
            @endif

            <div class="preview">
                <img id="profileImg-preview" src="{{ $playerInfo->profile_img }}">
            </div>
            <label for="profileImg"><i class="fas fa-cloud-upload-alt"></i> Upload Profile</label>
            <input type="file" id="profileImg" accept="image/*" onchange="showPreview(event);" name="profileImage">
        </div>
    </div>
    <div class="mb-3 d-flex justify-content-between">
        <button type="button" class="btn cancel-btn">Cancel</button>
        <button type="submit" class="btn save-btn">Save</button>
    </div>
</form>

<script>
    // Profile Image
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var uploadedImg = document.getElementById("uploadedImg");
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("profileImg-preview");
            preview.src = src;
            preview.style.display = "block";
            uploadedImg.style.display = "none";
        }
    }
</script>
