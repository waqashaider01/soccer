@if (session('images-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('images-success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<form action="/player/media-images/save" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image1" class="form-label">Media Image 1</label>
            <input type="file" class="form-control" id="image1" name="image1">
            <input type="hidden" class="form-control" id="oldImage1" name="oldImage1"
                value="{{ $playerInfo->media_img1 }}">
        </div>
        <div class="offset-md-3 col-md-3 mb-3">
            @if ($playerInfo->media_img1)
                <img src="{{ asset($playerInfo->media_img1) }}" width="100%">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image2" class="form-label">Media Image 2</label>
            <input type="file" class="form-control" id="image2" name="image2">
            <input type="hidden" class="form-control" id="oldImage2" name="oldImage2"
                value="{{ $playerInfo->media_img2 }}">
        </div>
        <div class="offset-md-3 col-md-3 mb-3">
            @if ($playerInfo->media_img2)
                <img src="{{ asset($playerInfo->media_img2) }}" width="100%">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image3" class="form-label">Media Image 3</label>
            <input type="file" class="form-control" id="image3" name="image3">
            <input type="hidden" class="form-control" id="oldImage3" name="oldImage3"
                value="{{ $playerInfo->media_img3 }}">
        </div>
        <div class="offset-md-3 col-md-3 mb-3">
            @if ($playerInfo->media_img3)
                <img src="{{ asset($playerInfo->media_img3) }}" width="100%">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image4" class="form-label">Media Image 4</label>
            <input type="file" class="form-control" id="image4" name="image4">
            <input type="hidden" class="form-control" id="oldImage4" name="oldImage4"
                value="{{ $playerInfo->media_img4 }}">
        </div>
        <div class="offset-md-3 col-md-3 mb-3">
            @if ($playerInfo->media_img4)
                <img src="{{ asset($playerInfo->media_img4) }}" width="100%">
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="image5" class="form-label">Media Image 5</label>
            <input type="file" class="form-control" id="image5" name="image5">
            <input type="hidden" class="form-control" id="oldImage5" name="oldImage5"
                value="{{ $playerInfo->media_img5 }}">
        </div>
        <div class="offset-md-3 col-md-3 mb-3">
            @if ($playerInfo->media_img5)
                <img src="{{ asset($playerInfo->media_img5) }}" width="100%">
            @endif
        </div>
    </div>

    <div class="mb-3 d-flex justify-content-between">
        <button type="/dashboard/player/profile" class="btn cancel-btn">Cancel</button>
        <button type="submit" class="btn save-btn">Save</button>
    </div>
    {{-- <div class="row">
        <div class="col-md-3 mb-3">
            <div class="cameraImage" id="uploadImg1">
                <label for="upload-img1" style="display: @if ($playerInfo->media_img1) none @endif"><i
                        class="fas fa-camera"></i></label>
                <input type="file" name="uploadImg1" id="upload-img1" accept="image/*" onchange="loadFile1(event)"
                    style="display: @if ($playerInfo->media_img1) none @endif">
                <input type="hidden" name="oldImg1" value="{{ $playerInfo->media_img1 }}">
                <img id="output1" />
                <img src="{{ asset($playerInfo->media_img1) }}" alt=""
                    style="display: @if ($playerInfo->media_img1) block @endif"">
                <i class=" fas fa-times-square" id="deleteImg1"
                    style="display: @if ($playerInfo->media_img1) block @endif" onclick="deleteImage1(event)"></i>
            </div>
        </div> --}}
    {{-- <div class="col-md-3 mb-3">
            <div class="cameraImage" id="uploadImg2">
                <label for="upload-img2"><i class="fas fa-camera"></i></label>
                <input type="file" name="uploadImg2" id="upload-img2" accept="image/*" onchange="loadFile2(event)">
                <img id="output2" />
                <i class="fas fa-times-square" id="deleteImg2" onclick="deleteImage2(event)"></i>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="cameraImage" id="uploadImg3">
                <label for="upload-img3"><i class="fas fa-camera"></i></label>
                <input type="file" name="uploadImg3" id="upload-img3" accept="image/*" onchange="loadFile3(event)">
                <img id="output3" />
                <i class="fas fa-times-square" id="deleteImg3" onclick="deleteImage3(event)"></i>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="cameraImage" id="uploadImg4">
                <label for="upload-img4"><i class="fas fa-camera"></i></label>
                <input type="file" name="uploadImg4" id="upload-img4" accept="image/*" onchange="loadFile4(event)">
                <img id="output4" />
                <i class="fas fa-times-square" id="deleteImg4" onclick="deleteImage4(event)"></i>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="cameraImage" id="uploadImg5">
                <label for="upload-img1"><i class="fas fa-camera"></i></label>
                <input type="file" name="uploadImg5" id="upload-img5" accept="image/*" onchange="loadFile5(event)">
                <img id="output5" />
                <i class="fas fa-times-square" id="deleteImg5" onclick="deleteImage5(event)"></i>
            </div>
        </div> --}}
    {{-- <div class="mb-3 d-flex justify-content-between">
            <button type="button" class="btn cancel-btn">Cancel</button>
            <button type="submit" class="btn save-btn">Save</button>
        </div>
    </div> --}}
</form>

<script>
    // image uplod section
    var loadFile1 = function(event) {

        var output = document.getElementById('output1');
        var container = document.getElementById('uploadImg1');
        var deleteIcon = document.getElementById('deleteImg1');
        var uploadImg = document.getElementById('upload-img1');
        container.firstElementChild.style.display = "none"
        uploadImg.style.display = "none"
        output.style.display = "block";
        deleteIcon.style.display = "block";
        container.appendChild(output);
        container.appendChild(deleteIcon);
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }

    };
    var deleteImage1 = function(e) {
        var output = document.getElementById('output1');
        var deleteIcon = document.getElementById('deleteImg1');
        var container = document.getElementById('uploadImg1');
        output.style.display = "none";
        deleteIcon.style.display = "none";
        container.innerHTML = `<label for="upload-img1"><i class="fas fa-camera"></i></label>
    <input type="file" name="uploadImg1" id="upload-img1" accept="image/*" onchange="loadFile1(event)">
    <img id="output1" />
    <i class="fas fa-times-square" id="deleteImg1" onclick="deleteImage1(event)"></i>`;
    }

    //     var loadFile2 = function(event) {

    //         var output = document.getElementById('output2');
    //         var container = document.getElementById('uploadImg2');
    //         var img = document.getElementById('deleteImg2');
    //         container.innerHTML = "";
    //         output.style.display = "block";
    //         img.style.display = "block";
    //         container.appendChild(output);
    //         container.appendChild(img);
    //         output.src = URL.createObjectURL(event.target.files[0]);
    //         output.onload = function() {
    //             URL.revokeObjectURL(output.src) // free memory
    //         }
    //     };
    //     var deleteImage2 = function(e) {
    //         var output = document.getElementById('output2');
    //         var img = document.getElementById('deleteImg2');
    //         var container = document.getElementById('uploadImg2');
    //         output.style.display = "none";
    //         img.style.display = "none";
    //         container.innerHTML = `<label for="upload-img2"><i class="fas fa-camera"></i></label>
    // <input type="file" name="uploadImg2" id="upload-img2" accept="image/*" onchange="loadFile2(event)">
    // <img id="output2" />
    // <i class="fas fa-times-square" id="deleteImg2" onclick="deleteImage2(event)"></i>`;
    //     }

    //     var loadFile3 = function(event) {

    //         var output = document.getElementById('output3');
    //         var container = document.getElementById('uploadImg3');
    //         var img = document.getElementById('deleteImg3');
    //         container.innerHTML = "";
    //         output.style.display = "block";
    //         img.style.display = "block";
    //         container.appendChild(output);
    //         container.appendChild(img);
    //         output.src = URL.createObjectURL(event.target.files[0]);
    //         output.onload = function() {
    //             URL.revokeObjectURL(output.src) // free memory
    //         }
    //     };
    //     var deleteImage3 = function(e) {
    //         var output = document.getElementById('output3');
    //         var img = document.getElementById('deleteImg3');
    //         var container = document.getElementById('uploadImg3');
    //         output.style.display = "none";
    //         img.style.display = "none";
    //         container.innerHTML = `<label for="upload-img3"><i class="fas fa-camera"></i></label>
    // <input type="file" name="uploadImg3" id="upload-img3" accept="image/*" onchange="loadFile3(event)">
    // <img id="output3" />
    // <i class="fas fa-times-square" id="deleteImg3" onclick="deleteImage3(event)"></i>`;
    //     }

    //     var loadFile4 = function(event) {

    //         var output = document.getElementById('output4');
    //         var container = document.getElementById('uploadImg4');
    //         var img = document.getElementById('deleteImg4');
    //         container.innerHTML = "";
    //         output.style.display = "block";
    //         img.style.display = "block";
    //         container.appendChild(output);
    //         container.appendChild(img);
    //         output.src = URL.createObjectURL(event.target.files[0]);
    //         output.onload = function() {
    //             URL.revokeObjectURL(output.src) // free memory
    //         }
    //     };
    //     var deleteImage4 = function(e) {
    //         var output = document.getElementById('output4');
    //         var img = document.getElementById('deleteImg4');
    //         var container = document.getElementById('uploadImg4');
    //         output.style.display = "none";
    //         img.style.display = "none";
    //         container.innerHTML = `<label for="upload-img4"><i class="fas fa-camera"></i></label>
    // <input type="file" name="uploadImg4" id="upload-img4" accept="image/*" onchange="loadFile4(event)">
    // <img id="output4" />
    // <i class="fas fa-times-square" id="deleteImg4" onclick="deleteImage4(event)"></i>`;
    //     }

    //     var loadFile5 = function(event) {

    //         var output = document.getElementById('output5');
    //         var container = document.getElementById('uploadImg5');
    //         var img = document.getElementById('deleteImg5');
    //         container.innerHTML = "";
    //         output.style.display = "block";
    //         img.style.display = "block";
    //         container.appendChild(output);
    //         container.appendChild(img);
    //         output.src = URL.createObjectURL(event.target.files[0]);
    //         output.onload = function() {
    //             URL.revokeObjectURL(output.src) // free memory
    //         }
    //     };
    //     var deleteImage5 = function(e) {
    //         var output = document.getElementById('output5');
    //         var img = document.getElementById('deleteImg5');
    //         var container = document.getElementById('uploadImg5');
    //         output.style.display = "none";
    //         img.style.display = "none";
    //         container.innerHTML = `<label for="upload-img5"><i class="fas fa-camera"></i></label>
    // <input type="file" name="uploadImg5" id="upload-img5" accept="image/*" onchange="loadFile5(event)">
    // <img id="output5" />
    // <i class="fas fa-times-square" id="deleteImg5" onclick="deleteImage5(event)"></i>`;
    //     }
</script>
