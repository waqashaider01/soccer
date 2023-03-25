@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/messages.css') }}" xmlns:Auth="http://www.w3.org/1999/xhtml"
        xmlns:Auth="http://www.w3.org/1999/xhtml" xmlns:Auth="http://www.w3.org/1999/xhtml"
        xmlns:Auth="http://www.w3.org/1999/xhtml" xmlns:Auth="http://www.w3.org/1999/xhtml">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <style>
            .outer {
                padding: 30px !important;

            }

            .icon-done-img {
                color: green !important;
                font-size: 60px;


            }

            .icon-done-img-x {
                color: red !important;
                font-size: 60px;


            }

            .position-icon {
                position: relative;
            }

            .icon-done-image {
                position: absolute;
                bottom: -27px;
                display: flex;
                justify-content: center;
                width: 100%;
            }

            .icon-done {
                color: green !important;
                font-size: 25px;
            }

            .icon-x {
                color: red !important;
                font-size: 28px;
            }

            .upload-1 {

                height: 170px;

                justify-content: center;
                align-items: center;
                background-color: #f0f3f4;
            }

            .icon-camera {
                font-size: 45px;
            }

            .upload-2 {
                height: 170px;

                justify-content: center;
                align-items: center;
                background-color: #f0f3f4;
            }

            .button-upload {
                padding: 10px;
                background-color: yellow;
                border-radius: 10px;
                border: transparent;
                padding-left: 60px;
                padding-right: 60px;
            }

            .upload-img-1 {
                background-color: #f0f3f4;
                padding: 10px;
                height: 160px;
            }

            .upload-img-left {
                background-color: #f0f3f4;
                padding: 10px;
                height: 161px;

            }

            .img-upload {
                height: 140px;

            }

            .img-upload-1 {
                height: 140px !important;
                float: right;
                background-color: #f0f3f4;
            }

            .img-upload-left {
                float: right;
                height: 140px;
            }

            .progress-bar {
                background-color: yellow !important;
            }

            .end-icon {
                display: flex;
            }

            .imagePreview {
                width: 100%;
                height: 180px;
                background-position: center center;
                background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
                background-color: #fff;
                background-size: cover;
                background-repeat: no-repeat;
                display: inline-block;
                box-shadow: 0px -3px 6px 2px rgba(0, 0, 0, 0.2);
            }

            .btn-primary {
                display: block;
                border-radius: 0px;
                box-shadow: 0px 4px 6px 2px rgba(0, 0, 0, 0.2);
                margin-top: -5px;
            }

            .imgUp {
                margin-bottom: 15px;
            }

            .del {
                position: absolute;
                top: 0px;
                right: 15px;
                width: 30px;
                height: 30px;
                text-align: center;
                line-height: 30px;
                background-color: rgba(255, 255, 255, 0.6);
                cursor: pointer;
            }

            .imgAdd {
                width: 30px;
                height: 30px;
                border-radius: 50%;
                background-color: #4bd7ef;
                color: #fff;
                box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
                text-align: center;
                line-height: 30px;
                margin-top: 0px;
                cursor: pointer;
                font-size: 15px;
            }
        </style>
    </head>

    <div class="container">
        <div class="outer">
            <h1> Identity Varification</h1>
            <br>
            @if ($userinfo > 0)


                <h4>Upload Image Of ID Card</h4>
                <div class="row">
                    <div class="col-md-3 col-sm-6  col ">
                        <div class="position-icon">
                            <div class="upload-img-1 text-center"><img class="img-upload img-fluid"
                                    src="{{ asset('images/upload.jfif') }}" alt="">
                            </div>
                            <div class=" icon-done-image text-center"><i
                                    class="icon-done-img bi bi-check-circle-fill me-2"></i>
                            </div>
                        </div>
                        <br>
                        <div class="text-center my-2">
                            <p>
                                <strong>Good</strong>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6  col">
                        <div class="position-icon">
                            <div class="upload-img-1 text-center"><img class="img-upload-1"
                                    src="{{ asset('images/upload-1.jfif') }}" alt="">


                            </div>

                            <div class=" icon-done-image text-center"><i
                                    class="icon-done-img-x bi bi-x-circle-fill me-2"></i>
                            </div>
                        </div>
                        <br>
                        <div class="text-center my-2">
                            <p><strong>Not cut</strong> </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6  col">
                        <div class="position-icon">
                            <div class="upload-img-1 text-center"><img class="img-upload"
                                    src="{{ asset('images/upload-2.jfif') }}" alt="">
                            </div>
                            <div class=" icon-done-image text-center"><i
                                    class="icon-done-img-x bi bi-x-circle-fill me-2"></i>
                            </div>
                        </div>
                        <br>
                        <div class="text-center my-2">
                            <p><strong> blurry</strong></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6  col">
                        <div class="position-icon">
                            <div class="upload-img-1 text-center"><img class="img-upload"
                                    src="{{ asset('images/upload-2.jfif') }}" alt="">
                            </div>
                            <div class=" icon-done-image text-center"><i
                                    class="icon-done-img-x bi bi-x-circle-fill me-2"></i>
                            </div>
                        </div>
                        <br>
                        <div class="text-center my-2">
                            <p><strong>Not reflective</strong></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="p1"><i class="icon-done bi bi-check2 me-2"></i>Government Issued</div>
                    <div class="p2"><i class="icon-done bi bi-check2 me-2"></i>Orignal full-size unedited documents
                    </div>
                    <div class="p3"><i class="icon-done bi bi-check2 me-2"></i>Place documents against a single-coloured
                        background</div>
                    <div class="p4"><i class="icon-done bi bi-check2 me-2"></i>Readable, well-lit,coloured images</div>
                    <div class="p5"><i class="icon-x bi bi-x me-2"></i>No black and white images</div>
                    <div class="p6"><i class="icon-x bi bi-x me-2"></i>No edited or expired documents</div>
                </div>
                <br>



                <h5>File size must be between 10KB and 512KB in Jpg/jpeg/png format.</h5>
                <br>
                <div class="row">
                    <div class="row">
                        <form action="{{ route('backend.underage-post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-2 imgUp">
                                        <div class="imagePreview"></div>
                                        <label class="btn btn-primary">Upload<input name="photofront" value="abc"
                                                type="file" class="uploadFile img" value="Upload Photo"
                                                style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                    </div><!-- col-2 -->
                                    <div class="col-sm-2 imgUp">
                                        <div class="imagePreview"></div>
                                        <label class="btn btn-primary">
                                            Upload<input type="file" name="photoback" class="uploadFile img"
                                                value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                    </div>

                                </div><!-- row -->
                            </div><!-- container -->



                            <div class=" my-3">
                                <button class="button-upload" type="submit">Continue</button>
                            </div>
                        </form>

                    </div>

                </div>




                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <h2>Verification Pending</h2>
            @else
            @endif

            <div class="row">
                <div class="end-icon"> <i class="bi bi-box-arrow-up-left me-2"></i>
                    <p> This information is used for personal verification only and is kept private and confidential by
                        binance.</p>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="post">
        @csrf

        <button type="submit">Logout</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>

    <script>
        $(".imgAdd").click(function() {
            $(this).closest(".row").find('.imgAdd').before(
                '<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input name="photofront" type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
            );
        });
        $(document).on("click", "i.del", function() {
            // 	to remove card
            $(this).parent().remove();
            // to clear image
            // $(this).parent().find('.imagePreview').css("background-image","url('')");
        });
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader)
                    return; // no file selected, or no FileReader support

                if (/^image/.test(files[0].type)) { // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function() { // set image data as background of div
                        //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image",
                            "url(" + this.result + ")");
                    }
                }

            });
        });
    </script>
