<form method="POST" action="{{ route('agent.profile-img-save') }}" id="upload-profile-form" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="oldImage" name="oldImage" value="{{ $agent->profile_img }}">
    <div class="content">
        <div class="form-input">
            @if ($agent->profile_img)
                <img id="uploadedImg" src="{{ asset($agent->profile_img) }}" width="100%" class="mb-4">
            @endif

            <div class="preview">
                <img id="profileImg-preview" src="{{ $agent->profile_img }}">
            </div>
            <label for="profileImg"><i class="fas fa-cloud-upload-alt"></i> Upload Profile</label>
            <input type="file" id="profileImg" accept="image/*" onchange="showProfilePreview(event);" name="profileImage">
        </div>
    </div>
    <div class="mb-3 d-flex justify-content-between">
        <button type="button" class="btn cancel-btn">Cancel</button>
        <button type="submit" class="btn save-btn">Save</button>
    </div>
</form>

<script>
    // Profile Image
    function showProfilePreview(event) {
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
