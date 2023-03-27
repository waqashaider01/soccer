@extends('backend.player.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/messages.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('select').change(function() {
                $('select option')[0].value = $('select option:selected').val();
                $('select option')[0].innerHTML = $('select option:selected').val();
                $("select").val($('select option:selected').val());

                console.log($('select option:selected').val());
            });
        });
    </script> --}}
@endpush
@section('content')
    <style>
        .res_ponsive {
            margin-left: 2% !important;
        }
    </style>
    <div class="messages">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button class="nav-link active" id="nav-starred-tab" data-bs-toggle="tab" data-bs-target="#nav-starred"
                    type="button" aria-selected="true">
                    <i class="far fa-address-card"></i>
                    <span class="position-relative">
                        Privacy Setting
                    </span>
                </button>
                <button class="nav-link" id="nav-sent-tab" data-bs-toggle="tab" data-bs-target="#nav-sent" type="button"
                    aria-selected="false">
                    <i class="far fa-star"></i>
                    <span class="position-relative">
                        Mail Preferences
                    </span>
                </button>

                <button class="nav-link" id="nav-compose-tab" data-bs-toggle="tab" data-bs-target="#nav-compose"
                    type="button" aria-selected="true">
                    <i class="far fa-edit"></i> Change Password
                </button>
                <button class="nav-link" id="nav-subs" data-bs-toggle="tab" data-bs-target="#nav-sub" type="button"
                    aria-selected="true">
                    <i class="far fa-edit"></i> Subscriptions
                </button>
                <button class="nav-link" id="nav" data-bs-toggle="tab" data-bs-target="#blockedUsers" type="button"
                    aria-selected="true">
                    <i class="far fa-edit"></i> Block Users
                </button>
                <button class="nav-link   myButton" id="nav-compo" data-bs-toggle="tab" data-bs-target="#nav-verification"
                    type="button" aria-selected="true">
                    <i class="far fa-edit"></i> Account Verification
                </button>
            </div>
        </nav>




        <div class="tab-content" id="nav-tabContent">
            {{-- inbox end --}}

            <div class="tab-pane fade show active" id="nav-starred" role="tabpanel">
                <div class="card-header text-danger">
                    Information Visibility
                </div>
                <div class="card-body">
                    <form action="security/{{ auth()->user()->id }}" method="post">
                        @csrf
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-sm-2">
                                <label for="Telephone" class="form-label">Telephone</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="Telephone" name="telephone" class="form-select">
                                    <option value="everyone">Everyone</option>
                                    <option value="only_me">Only Me</option>
                                    <option value="only_contact">Only Contact</option>
                                    <option value="only_share_with">Only Share With</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-sm-2">
                                <label for="Email" class="form-label me-3">Email</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="Email" name="email" class="form-select">
                                    <option value="everyone">Everyone</option>
                                    <option value="only_me">Only Me</option>
                                    <option value="only_contact">Only Contact</option>
                                    <option value="only_share_with">Only Share With</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-sm-2">
                                <label for="Website" class="form-label me-3">Website</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="Website" name="website" class="form-select">
                                    <option value="everyone">Everyone</option>
                                    <option value="only_me">Only Me</option>
                                    <option value="only_contact">Only Contact</option>
                                    <option value="only_share_with">Only Share With</option>
                                </select>
                            </div>

                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">

                            <div class="col-sm-2">
                                <label for="SocialMediaLinks" class="form-label-3">Social Media <br> Links</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="SocialMediaLinks" name="social_media_links" class="form-select width">
                                    <option value="everyone">Everyone</option>
                                    <option value="only_me">Only Me</option>
                                    <option value="only_contact">Only Contacts</option>
                                    <option value="only_share_with">Only Share With</option>
                                </select>
                            </div>




                        </div>
                        <div class="d-flex flex-row mt-4">
                            <div>
                                <p class="text-capitalize">allow only premium members users to contact me</p>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="allow" value="yes"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check ms-3">
                                <input class="form-check-input" type="radio" name="allow" value="no"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">SAVE SETTING</button>
                        </div>
                </div>
                </form>
            </div>
            {{-- starred end --}}

            {{-- Mail Preferences --}}

            <div class="tab-pane fade" id="nav-sent" role="tabpanel">
                <div class="tab-pane fade show active" id="nav-starred" role="tabpanel">
                    <p>Send and email noice when</p>
                    <div class="container-fluid">
                        <div>

                        </div>
                        <div class="row align-items-center mb-3"style="background: #222e3c;">
                            <form action="{{ url('preference/' . Auth::id()) }}" method="post">
                                @csrf
                                <div class="col-md-10">
                                    <h6 class="mb-0 d-inline-block" style="color:white">ACTIVITY</h6>
                                </div>
                                <div class="col-md-1">
                                    <h6 class="mb-0" style="padding:4px;backgroung:rgb(94, 94, 247);color:white;">Yes
                                    </h6>
                                </div>
                                <div class="col-md-1">
                                    <h6 class="mb-0" style="padding:4px;backgroung:blue;color:white;">No
                                    </h6>
                                </div>

                        </div>
                        <div class="row mb-3" style="">
                            <div class="col-md-10">
                                <label for="btn">A member mention you in an update using "@andrenedved"</label>
                            </div>
                            <div class="col-md-1 text-center">
                                <input type="radio" id="html"{{ $mail_pref->mention == 1 ? 'checked' : '' }}
                                    name="mention" value="1">
                                <label for="html"></label>
                            </div>
                            <div class="col-md-1 text-center">
                                <input type="radio" id="css" {{ $mail_pref->mention == 0 ? 'checked' : '' }}
                                    name="mention" value="0">
                                <label for="css"></label>
                            </div>
                        </div>
                        <div class="row mb-3"style="">
                            <div class="col-md-10">
                                <label for="btn">A member replies to an update or coment you've posted</label>
                            </div>
                            <div class="col-md-1 text-center">
                                <input type="radio" id="html" {{ $mail_pref->comment == 1 ? 'checked' : '' }}
                                    name="comment" value="1">
                                <label for="html"></label>
                            </div>
                            <div class="col-md-1 text-center">

                                <input type="radio" id="css" {{ $mail_pref->comment == 0 ? 'checked' : '' }}
                                    name="comment" value="0">
                                <label for="css"></label>
                            </div>

                        </div>
                        <div class="row align-items-center mb-3"style="background: #222e3c;">
                            <div class="col-md-10">
                                <h6 class="mb-0" style="color:white">MESSAGES</h6>
                            </div>
                            <div class="col-md-1">
                                <h6 class="mb-0" style="padding:4px;backgroung:blue ;color:white;">Yes</h6>

                            </div>
                            <div class="col-md-1">
                                <h6 class="mb-0" style=" padding:4px;backgroung:blue ;color:white;">
                                    No</h6>

                            </div>

                        </div>
                        <div class="row mb-3"style="">
                            <div class="col-md-10">
                                <label for="btn">A member sends you a new message</label>
                            </div>
                            <div class="col-md-1 text-center">
                                <input type="radio" id="html" {{ $mail_pref->message == 1 ? 'checked' : '' }}
                                    name="message" value="1">
                                <label for="html"></label>
                            </div>
                            <div class="col-md-1 text-center">

                                <input type="radio" id="css" {{ $mail_pref->message == 0 ? 'checked' : '' }}
                                    name="message" value="0">
                                <label for="css"></label>
                            </div>

                        </div>
                        <div class="row align-items-center mb-3"style="background: #222e3c;">
                            <div class="col-md-10">
                                <h6 class="mb-0" style="color:white">FOLLOW</h6>
                            </div>
                            <div class="col-md-1">
                                <h6 class="mb-0" style="padding: 4px;backgroung:blue ;color:white;">Yes</h6>

                            </div>
                            <div class="col-md-1">
                                <h6 class="mb-0" style="padding: 4px;backgroung:blue ;color:white;">No</h6>

                            </div>

                        </div>
                        <div class="row mb-4"style="">
                            <div class="col-md-10">
                                <label for="btn"> A member starts following you activity</label>
                            </div>
                            <div class="col-md-1 text-center">
                                <input type="radio" id="html" {{ $mail_pref->follow == 1 ? 'checked' : '' }}
                                    name="follow" value="1">
                                <label for="html"></label>
                            </div>
                            <div class="col-md-1 text-center">

                                <input type="radio" id="css" {{ $mail_pref->follow == 0 ? 'checked' : '' }}
                                    name="follow" value="0">
                                <label for="css"></label>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary py-2 px-4  mb-2"
                            style="font-size:12px;font-weight:600;"> SAVE
                            CHANGES</button>
                        </form>

                        <form action="{{ url('additionOption/' . Auth::id()) }}" method="post">
                            @csrf
                            <div class="row align-items-center"style="background: #222e3c;">
                                <div class="col-md-10">
                                    <h6 class="mb-0" style="color:white">ADDITIONAL OPTIONS</h6>
                                </div>
                                <div class="col-md-1">
                                    <h6 class="mb-0" style="padding:4px;backgroung:blue ;color:white;">Yes</h6>

                                </div>
                                <div class="col-md-1">
                                    <h6 class="mb-0" style="padding:4px;backgroung:blue ;color:white;">No</h6>

                                </div>

                            </div>
                            <div class="row mb-3"style="">
                                <div class="col-md-10">
                                    <label for="btn"> There is an article or notification</label>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input type="radio" id="html" {{ $mail_pref->article == 1 ? 'checked' : '' }}
                                        name="article" value="1">
                                    <label for="html"></label>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input type="radio" id="css"{{ $mail_pref->article == 0 ? 'checked' : '' }}
                                        name="article" value="0">
                                    <label for="css"></label>
                                </div>
                            </div>
                            <div class="row mb-3"style="">
                                <div class="col-md-10">
                                    <label for="btn">Someone signs up via my invite</label>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input type="radio" id="html"
                                        {{ $mail_pref->sign_up_via_profile == 1 ? 'checked' : '' }}
                                        name="sign_up_via_profile" value="1">
                                    <label for="html"></label>
                                </div>
                                <div class="col-md-1 text-center">

                                    <input type="radio" id="css"
                                        {{ $mail_pref->sign_up_via_profile == 0 ? 'checked' : '' }}
                                        name="sign_up_via_profile" value="0">
                                    <label for="css"></label>
                                </div>

                            </div>
                            <div class="row mb-3"style="">
                                <div class="col-md-10">
                                    <label for="btn"> There is a market post relavent to me</label>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input type="radio" id="html"
                                        {{ $mail_pref->revelent_post == 1 ? 'checked' : '' }} name="revelent_post"
                                        value="1">
                                    <label for="html"></label>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input type="radio" id="css"
                                        {{ $mail_pref->revelent_post == 0 ? 'checked' : '' }} name="revelent_post"
                                        value="0">
                                    <label for="css"></label>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary py-2 px-4"
                                style="font-size:12px;font-weight:600;"> SAVE
                                CHANGES</button>
                        </form>
                        <p> Note: Add soccerworldlink.com to your address book to receive our emails in your inbox rather
                            than the span/bulk email folder</p>
                    </div>
                </div>
            </div>

            {{-- <div class="tab-pane fade" id="nav-sent" role="tabpanel">
                <div class="tab-pane fade show active" id="nav-starred" role="tabpanel">
                    <div class="card-header text-danger">
                        Send me an Email when
                    </div>
                    <div class="card-body">
                        <form action="{{ url('notification') }}" method="post">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="notification[]" value=""
                                    id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    I have a new follower
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="notification[]" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Someone send me a message
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="notification[]" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    There is a market post relevant to me
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="notification[]" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    There is a article or general update
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="notification[]" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    I have a pending action
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="notification[]" value=""
                                    id="flexCheckChecked">
                                <label class="form-check-label" for="flexCheckChecked">
                                    someone signs up vuia my Profile
                                </label>
                            </div>
                            <button type="submit">Save</button>
                        </form>


                    </div>
                </div>
            </div> --}}
            {{-- sent end --}}

            {{-- block user --}}
            <div class="tab-pane fade" id="blockedUsers" role="tabpanel">
                <div class=" table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                {{-- <th scope="col">Status</th> --}}
                                <th> Name </th>
                                <th> E-mail</th>
                                <th> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($blockusers as $BlockUser)
                                <tr>
                                    {{-- @dd(Auth::user()->type) --}}
                                    <td>{{ $BlockUser->name }}</td>
                                    <td>{{ $BlockUser->email }}</td>
                                    <td>
                                        @isset(Auth::user()->type)
                                            @if (Auth::user()->type == 'player')
                                                <a href="{{ route('unblock', $BlockUser->id) }}" type="button"
                                                    class="btn option">Unblock</a>
                                            @endif
                                        @endisset
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


            {{-- Account verification --}}
            <div class="tab-pane fade" id="nav-verification" role="tabpanel">

                @push('styles')
                    <link rel="stylesheet" href="{{ asset('css/dashboard/messages.css') }}"
                        xmlns:Auth="http://www.w3.org/1999/xhtml" xmlns:Auth="http://www.w3.org/1999/xhtml"
                        xmlns:Auth="http://www.w3.org/1999/xhtml" xmlns:Auth="http://www.w3.org/1999/xhtml"
                        xmlns:Auth="http://www.w3.org/1999/xhtml">
                    <link rel="stylesheet"
                        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
                        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
                        crossorigin="anonymous" referrerpolicy="no-referrer" />
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
                        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                @endpush

                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <title>Bootstrap demo</title>
                    <link rel="stylesheet"
                        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
                        crossorigin="anonymous">
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

                {{--  message banner --}}
                <div class="alert  alert-dismissible fade show messageShoweplay" role="alert">
                    <div class="alertboxresponsvive">
                        <div class="align-self-center mx-2 position-relative">
                            <div class="playalertboxmain">
                                <div class="playalertbox">
                                    <i class="bi bi-credit-card-fill verifyplayicon"></i>
                                </div>
                            </div>


                        </div>
                        <div class="mx-2 mt-3">

                            <h4>Verification Required </h4>
                            <p>Please Verify Your Account to unlock some of our services.</p>
                        </div>
                    </div>
                    {{-- <button type="button" class="btn-close colorbtnplay" data-bs-dismiss="alert"
                        aria-label="Close"></button> --}}
                </div>
                {{-- Messsage banner end  --}}

                {{-- <div class="container">
                    <div class="outer">
                        <h1> Identity Varification</h1>
                        <br>
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
                            <div class="p2"><i class="icon-done bi bi-check2 me-2"></i>Orignal full-size unedited
                                documents</div>
                            <div class="p3"><i class="icon-done bi bi-check2 me-2"></i>Place documents against a
                                single-coloured
                                background</div>
                            <div class="p4"><i class="icon-done bi bi-check2 me-2"></i>Readable, well-lit,coloured
                                images</div>
                            <div class="p5"><i class="icon-x bi bi-x me-2"></i>No black and white images</div>
                            <div class="p6"><i class="icon-x bi bi-x me-2"></i>No edited or expired documents</div>
                        </div>
                        <br>
                        @if ($userinfo->count() < 1)
                            <h5>File size must be between 10KB and 512KB in Jpg/jpeg/png format.</h5>
                            <br>
                            <div class="row">
                                <div class="row">
                                    <form action="{{ route('cnic_image') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <br>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-2 imgUp">
                                                    <div class="imagePreview"></div>
                                                    <label class="btn btn-primary">Upload<input required name="photofront"
                                                            value="abc" type="file" class="uploadFile img"
                                                            value="Upload Photo"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
                                                    </label>
                                                </div><!-- col-2 -->
                                                <div class="col-sm-2 imgUp">
                                                    <div class="imagePreview"></div>
                                                    <label class="btn btn-primary">
                                                        Upload<input type="file" required name="photoback"
                                                            class="uploadFile img" value="Upload Photo"
                                                            style="width: 0px;height: 0px;overflow: hidden;">
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
                        @else
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <h2>Verification Pending</h2>
                        @endif


                        <div class="row">
                            <div class="end-icon"> <i class="bi bi-box-arrow-up-left me-2"></i>
                                <p> This information is used for personal verification only and is kept private and
                                    confidential.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}


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






            </div>




            <style>
                ._navtabs {
                    border-bottom: none;
                }

                .pass_show {
                    position: relative
                }

                .pass_show .ptxt {

                    position: absolute;

                    top: 50%;

                    right: 20px;

                    z-index: 1;

                    color: #f36c01;

                    margin-top: -10px;

                    cursor: pointer;

                    transition: .3s ease all;

                }

                .pass_show .ptxt:hover {
                    color: #333333;
                }
            </style>
            <div class="tab-pane fade" id="nav-sub" role="tabpanel">
                <div class="tab-pane fade show active" id="nav-starred" role="tabpanel">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <button class="nav-link active" id="nav-starred-info" data-bs-toggle="tab"
                                data-bs-target="#info" type="button" aria-selected="true">

                                <span class="position-relative">
                                    information
                                </span>
                            </button>
                            <button class="nav-link" id="nav-payment" data-bs-toggle="tab" data-bs-target="#payment"
                                type="button" aria-selected="false">
                                <i class="far fa-star"></i>
                                <span class="position-relative">
                                    Payment Method
                                </span>
                            </button>

                            <button class="nav-link" id="nav-billing" data-bs-toggle="tab" data-bs-target="#bill"
                                type="button" aria-selected="true">
                                <i class="far fa-edit"></i> Billing Address
                            </button>
                            <button class="nav-link" id="nav-invoice" data-bs-toggle="tab" data-bs-target="#inv"
                                type="button" aria-selected="true">
                                My invoices
                            </button>
                            <button class="nav-link" id="nav-option" data-bs-toggle="tab" data-bs-target="#opt"
                                type="button" aria-selected="true">
                                Options
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            @if (!empty($subscriptions))
                                @foreach ($subscriptions as $subscription)
                                    <div class="row">
                                        <div class="col-md-4 d-flex flex-column">
                                            <div>
                                                <h6>Services</h6>
                                                <p class="">Players Permium Plan<br>
                                                    {{ $subscription->stripe_plan }}
                                                    month's Subscription</p>
                                                <div class="mt-5">
                                                    <h6 class="mb-0">Billing Cycle</h6>
                                                    <p class="mt-0">Monthly</p>
                                                </div>
                                                <div class="mt-5">
                                                    <h6>First Payment/Date</h6>
                                                    <p>${{ $subscription->paid_amount }} /
                                                        {{ date('F m, Y', strtotime($subscription->trial_ends_at)) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h6>Status</h6>
                                            <button class="btn btn-success mb-2">{{ $subscription->status }}</button>
                                            <div class="mt-5">
                                                <p class="text-bold mb-0 h6">Recurring Amount</p>
                                                <small class="text-muted ">${{ $subscription->recurring_amount }}
                                                    USD</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-5 mt-1">
                                                <h6>Payment Method</h6>
                                                <small class="text-muted">{{ $subscription->payment_method }}</small>
                                            </div>
                                            <div class="mt-5">
                                                <h6 class="mb-0 pt-3">Next Due Date</h6>
                                                <small
                                                    class="text-muted">{{ date('F m, Y', strtotime($subscription->ends_at)) }}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="tab-pane fade show " id="payment" role="tabpanel">
                            <div class="bg-light p-3 pt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="mb-2">Card Type</h5>
                                        <label for="text" class="p-2"
                                            style="width:90%; background-color:grey;border-radius:4px">{{ $subscription->payment_method }}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="mb-2">Card Number</h5>
                                        <label for="text" class="p-2"
                                            style="width:90%; background-color:grey;border-radius:4px">*****{{ substr($subscription->card_no, -4) }}</label>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="mb-2">Expiry Date</h5>
                                        <label for="text" class="p-2"
                                            style="width:90%; background-color:grey;border-radius:4px">{{ $subscription->expiration_date }}</label>
                                    </div>
                                </div>
                                <h5 style="margin-left:20px">Add New Card</h5>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary mt-2" style="margin-left: 30px;"
                                        data-toggle="modal" data-target="#exampleModal">
                                        <i class="far fa-star"></i>
                                        Pay Now
                                    </button>
                                </div>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pay here</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="d-flex ">
                                                    <img class="ms-2" src="{{ url('images\discover.png') }}"
                                                        alt="images" style="width:60px;height:50px">
                                                    <img class="ms-4" src="{{ url('images\master.png') }}"
                                                        alt="" style="width:60px;height:50px">
                                                    <img class="ms-4" src="{{ url('images\paypal.png') }}"
                                                        alt="" style="width:60px;height:50px">
                                                    <img class="ms-4" src="{{ url('images\jcb.png') }}" alt=""
                                                        style="width:85px;height:70px">

                                                </div>
                                                <div>
                                                    <div class="d-flex">
                                                        <div>
                                                            <p style="font-weight:500;margin-bottom:3px">Card Number</p>
                                                            <input type="text" class="me-2" style="padding:4px">
                                                        </div>
                                                        <div>
                                                            <p style="font-weight:500;margin-bottom:3px">CVV</p>
                                                            <div class="d-flex">
                                                                <input type="text"
                                                                    class="me-2"style="width:60%;padding:2px 4px;">
                                                                {{-- <span style="color:green"> what is this?</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p style="font-weight:500;margin-bottom:3px">Expiry Date</p>
                                                <select placeholder="MM">
                                                    <option name="" value="" style="display:none;">MM
                                                    </option>
                                                    <option name="January" value="Jan">January</option>
                                                    <option name="February" value="Feb">February</option>
                                                    <option name="March" value="Mar">March</option>
                                                    <option name="April" value="Apr">April</option>
                                                    <option name="May" value="May">May</option>
                                                    <option name="June" value="Jun">June</option>
                                                    <option name="July" value="Jul">July</option>
                                                    <option name="August" value="Aug">August</option>
                                                    <option name="September" value="Sep">September</option>
                                                    <option name="October" value="Oct">October</option>
                                                    <option name="November" value="Nov">November</option>
                                                    <option name="December" value="Dec">December</option>
                                                </select>
                                                <select id="year" name="year" style="width:">
                                                    <option>year</option>
                                                    <option value="1940">1940</option>
                                                    <option value="1941">1941</option>
                                                    <option value="1942">1942</option>
                                                    <option value="1943">1943</option>
                                                    <option value="1944">1944</option>
                                                    <option value="1945">1945</option>
                                                    <option value="1946">1946</option>
                                                    <option value="1947">1947</option>
                                                    <option value="1948">1948</option>
                                                    <option value="1949">1949</option>
                                                    <option value="1950">1950</option>
                                                    <option value="1951">1951</option>
                                                    <option value="1952">1952</option>
                                                    <option value="1953">1953</option>
                                                    <option value="1954">1954</option>
                                                    <option value="1955">1955</option>
                                                    <option value="1956">1956</option>
                                                    <option value="1957">1957</option>
                                                    <option value="1958">1958</option>
                                                    <option value="1959">1959</option>
                                                    <option value="1960">1960</option>
                                                    <option value="1961">1961</option>
                                                    <option value="1962">1962</option>
                                                    <option value="1963">1963</option>
                                                    <option value="1964">1964</option>
                                                    <option value="1965">1965</option>
                                                    <option value="1966">1966</option>
                                                    <option value="1967">1967</option>
                                                    <option value="1968">1968</option>
                                                    <option value="1969">1969</option>
                                                    <option value="1970">1970</option>
                                                    <option value="1971">1971</option>
                                                    <option value="1972">1972</option>
                                                    <option value="1973">1973</option>
                                                    <option value="1974">1974</option>
                                                    <option value="1975">1975</option>
                                                    <option value="1976">1976</option>
                                                    <option value="1977">1977</option>
                                                    <option value="1978">1978</option>
                                                    <option value="1979">1979</option>
                                                    <option value="1980">1980</option>
                                                    <option value="1981">1981</option>
                                                    <option value="1982">1982</option>
                                                    <option value="1983">1983</option>
                                                    <option value="1984">1984</option>
                                                    <option value="1985">1985</option>
                                                    <option value="1986">1986</option>
                                                    <option value="1987">1987</option>
                                                    <option value="1988">1988</option>
                                                    <option value="1989">1989</option>
                                                    <option value="1990">1990</option>
                                                    <option value="1991">1991</option>
                                                    <option value="1992">1992</option>
                                                    <option value="1993">1993</option>
                                                    <option value="1994">1994</option>
                                                    <option value="1995">1995</option>
                                                    <option value="1996">1996</option>
                                                    <option value="1997">1997</option>
                                                    <option value="1998">1998</option>
                                                    <option value="1999">1999</option>
                                                    <option value="2000">2000</option>
                                                    <option value="2001">2001</option>
                                                    <option value="2002">2002</option>
                                                    <option value="2003">2003</option>
                                                    <option value="2004">2004</option>
                                                    <option value="2005">2005</option>
                                                    <option value="2006">2006</option>
                                                    <option value="2007">2007</option>
                                                    <option value="2008">2008</option>
                                                    <option value="2009">2009</option>
                                                    <option value="2010">2010</option>
                                                    <option value="2011">2011</option>
                                                    <option value="2012">2012</option>
                                                    <option value="2013">2013</option>
                                                    <option value="2014">2014</option>
                                                    <option value="2015">2015</option>
                                                    <option value="2016">2016</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                </select>
                                                <p style="font-weight:500;margin-bottom:3px">Name on Card</p>
                                                <input type="text"
                                                    style="width
                                            100%;padding:4px">
                                                <div class="d-flex justify-content-center mt-4">
                                                    <button class="btn btn-primary me-3"
                                                        style="padding-left:40px;padding-right:40px">Save
                                                        Changes</button>
                                                    <button
                                                        class="btn btn-secondary"style="padding-left:40px;padding-right:40px">Cancel</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show " id="bill" role="tabpanel">
                            <h3>Billng Address</h3>
                            @foreach ($billing_addresses as $billing_address)
                                <p><b>Postal Code:</b> {{ $billing_address->postal_code }}</p>
                                <p><b>City:</b> {{ $billing_address->city }}</p>
                                <p><b>State:</b> {{ $billing_address->state }}</p>
                                <p><b>Country:</b> {{ $billing_address->country }}</p>
                                <hr>
                            @endforeach
                        </div>
                        <div class="tab-pane fade show " id="inv" role="tabpanel">
                            <div class="d-flex justify-content-between align-items-center bg-light p-3 mb-4">
                                <div>
                                    <h4> My Invoice</h4>
                                    <p>4 Records Found, page 1of 1</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class=" me-2 pt-3" style="font-size: 18px;font-weight:500"> <span
                                            style="color:gray">Total Due:</span> <span style="color:green;">$0.00
                                            USD</span></p>
                                    <button
                                        class="btn btn-success p-2"style="padding-left:40px !important;padding-right:40px !important">Pay
                                        All</button>
                                </div>
                            </div>
                            <div class=" table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" for="vehicle1"><input type="checkbox" class="me-2"
                                                    id="vehicle1" name="vehicle1" value="Bike">#invoice</th>
                                            <th scope="col">Invoice Date</th>
                                            <th scope="col">Due Date</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($invoices))
                                        @foreach ($invoices as $invoice)
                                        <tr>
                                            <td scope="col" for="vehicle1"><input type="checkbox"class="me-2"
                                                    id="vehicle1" name="vehicle1" value="Bike">#</td>
                                            <td>{{ date('d-m-Y', strtotime($invoice->trial_ends_at)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($invoice->trial_ends_at)) }}</td>
                                            <td>{{ $invoice->paid_amount }}</td>
                                            <td style="width:30%;">
                                                <div class="card bg-success" style="width: 100px; height: 40px;">
                                                    <div class="card-body">
                                                      <h5 class="card-title text-white text-center">Paid</h5>
                                                    </div>
                                                  </div>
                                              <button
                                                    class="btn btn-secondary p-2"
                                                    style="padding-left:40px !important;padding-right:40px !important;"
                                                    data-toggle="modal" data-target="#invoiceModal">View
                                                    Invoice</button></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        {{-- <tr>
                                            <td scope="col" for="vehicle2"><input type="checkbox"class="me-2"
                                                    id="vehicle2" name="vehicle2" value="Bike">1</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                            <td style="width:30%;"> <button class="btn btn-success me-2"
                                                    style="padding-left:40px;padding-right:40px">Paid</button> <button
                                                    class="btn btn-secondary p-2"
                                                    style="padding-left:40px !important;padding-right:40px !important;">View
                                                    Invoice</button></td>
                                        </tr> --}}
                                        {{-- <tr>
                                            <td scope="col" for="vehicle3"><input type="checkbox"class="me-2"
                                                    id="vehicle2" name="vehicle3" value="Bike">2</td>
                                            <td>Larry the Bird</td>
                                            <td>Thornton</td>
                                            <td>@twitter</td>
                                            <td style="width:30%;"> <button class="btn btn-success me-2"
                                                    style="padding-left:40px;padding-right:40px">Paid</button> <button
                                                    class="btn btn-secondary p-2"
                                                    style="padding-left:40px !important;padding-right:40px !important;">View
                                                    Invoice</button></td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Invoice</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="tab-pane fade show" id="bill" role="tabpanel">
                                            <h3>Invoice</h3>
                                            <div class="card">
                                              <div class="card-body">
                                                @foreach ($invoices as $invoice)
                                                <p><b>User Name:</b> {{ $invoice->name }}</p>
                                                <p><b>Card Name:</b> {{ $invoice->payment_method }}</p>
                                                <p><b>Card no:</b>*****{{ substr($invoice->card_no, -4) }}</p>
                                                <p><b>Card Expiration date:</b> {{ $invoice->expiration_date }}</p>
                                                <p><b>First payment amount:</b> ${{ $invoice->paid_amount }}</p>
                                                <p><b>Plan:</b> {{ $invoice->stripe_plan }} Months</p>
                                                <p><b>Invoice date:</b> {{ date('d-m-Y', strtotime($invoice->trial_ends_at)) }}</p>
                                                <p><b>Next due date:</b> {{ date('d-m-Y', strtotime($invoice->ends_at)) }}</p>
                                                <hr>
                                                @endforeach
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show " id="opt" role="tabpanel">
                            <ul class="nav nav-tabs d-flex justify-content-between _navtabs" id="myTab"
                                role="tablist">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault" />
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Auto-Renewel</label>
                                </div>

                                <li class="nav-item renewbtn"><a class=" btn btn-light" href="#profile" role="tab"
                                        aria-controls="profile" data-bs-toggle="tab">Renew</a></li>
                                <li class="nav-item"><a class="btn btn-danger" href="#messages" role="tab"
                                        aria-controls="messages" data-bs-toggle="tab">Cancel Subscription</a></li>


                            </ul>
                            <ul class="nav nav-tabs d-flex justify-content-between _navtabs mt-3" id="myTab0"
                                role="tablist">

                                <li class="nav-item renewbtn"><a class="btn btn-light" href="#messages" role="tab"
                                        aria-controls="messages" data-bs-toggle="tab">End Trial And Get Full Access</a>
                                </li>

                                <li class="nav-item active"><a class="  btn btn-success " href="#home" role="tab"
                                        aria-controls="home" data-bs-toggle="tab">Reactivate
                                        Subscription</a></li>
                            </ul>
                            <script>
                                // const button = document.getElementsByClassName("myButton");
                                // const div = document.getElementsByClassName("messageShoweplay");

                                // button.addEventListener("click", function() {
                                //     alert("jkjkj")
                                //     div.style.display = "block";
                                // });
                                $(document).ready(function() {
                                    $('.renewbtn a').click(function() {
                                        var target = $(this).attr('href');
                                        $(target).toggle();
                                    });
                                });
                            </script>
                            <div class="tab-content">
                                <div class="tab-pane " id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div style="">
                                        <h4>Review your Subscription</h4>
                                        <h5>Select the duration and billing cycle to renew your subscription</h5>
                                        <div class=" bg-light p-5 d-flex justify-content-center align-items-center">
                                            <label class="me-4"> Player's Premium Plan</label>
                                            <select class="me-4 p-2" name="cars" id="cars"
                                                style="width: 276px;
                                                ">
                                                @foreach ($subs as $sub)
                                                    <option value="{{ $sub->duration }}">{{ $sub->duration }} months
                                                    </option>
                                                @endforeach

                                            </select>
                                            <button class="btn btn-primary p-3"> Renew</button>

                                        </div>
                                        <div class="mt-3 p-3 bg-light">
                                            <h4 class="text-center">
                                                How It Works
                                            </h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quas vitae
                                                distinctio
                                                sapiente esse ad repudiandae nihil voluptatem inventore nisi maiores, id
                                                nulla
                                                eligendi,
                                                quaerat dolores voluptatibus! Magni, voluptatem perspiciatis!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div style="">
                                        <h4>Review your Subscription</h4>
                                        <h5>Select the duration and billing cycle to renew your subscription</h5>
                                        <div class=" bg-light p-5 d-flex justify-content-center align-items-center">
                                            <label class="me-4"> Player's Premium Plan</label>
                                            <select class="me-4 p-2" name="cars" id="cars"
                                                style="width: 276px;
                                                    ">
                                                @foreach ($subs as $sub)
                                                    <option value="{{ $sub->duration }}">{{ $sub->duration }} months
                                                    </option>
                                                @endforeach

                                            </select>
                                            <button class="btn btn-primary p-3"> Renew</button>

                                        </div>
                                        <div class="mt-3 p-3 bg-light">
                                            <h4 class="text-center">
                                                How It Works
                                            </h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quas vitae
                                                distinctio
                                                sapiente esse ad repudiandae nihil voluptatem inventore nisi maiores, id
                                                nulla
                                                eligendi,
                                                quaerat dolores voluptatibus! Magni, voluptatem perspiciatis!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                                    <div style="">
                                        <h4>Review your Subscription</h4>
                                        <h5>Select the duration and billing cycle to renew your subscription</h5>
                                        <div class=" bg-light p-5 d-flex justify-content-center align-items-center">
                                            <label class="me-4"> Player's Premium Plan</label>
                                            <select class="me-4 p-2" name="cars" id="cars"
                                                style="width: 276px;
                                                    ">
                                                @foreach ($subs as $sub)
                                                    <option value="{{ $sub->duration }}">{{ $sub->duration }} months
                                                    </option>
                                                @endforeach

                                            </select>
                                            <button class="btn btn-primary p-3"> Renew</button>

                                        </div>
                                        <div class="mt-3 p-3 bg-light">
                                            <h4 class="text-center">
                                                How It Works
                                            </h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quas vitae
                                                distinctio
                                                sapiente esse ad repudiandae nihil voluptatem inventore nisi maiores, id
                                                nulla
                                                eligendi,
                                                quaerat dolores voluptatibus! Magni, voluptatem perspiciatis!</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                    <div style="display:none">
                                        <h4>Review your Subscription</h4>
                                        <h5>Select the duration and billing cycle to renew your subscription</h5>
                                        <div class=" bg-light p-5 d-flex justify-content-center align-items-center">
                                            <label class="me-4"> Player's Premium Plan</label>
                                            <select class="me-4 p-2" name="cars" id="cars"
                                                style="width: 276px;
                                                    ">
                                                @foreach ($subs as $sub)
                                                    <option value="{{ $sub->duration }}">{{ $sub->duration }} months
                                                    </option>
                                                @endforeach

                                            </select>
                                            <button class="btn btn-primary p-3"> Renew</button>

                                        </div>
                                        <div class="mt-3 p-3 bg-light">
                                            <h4 class="text-center">
                                                How It Works
                                            </h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum quas vitae
                                                distinctio
                                                sapiente esse ad repudiandae nihil voluptatem inventore nisi maiores, id
                                                nulla
                                                eligendi,
                                                quaerat dolores voluptatibus! Magni, voluptatem perspiciatis!</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-compose" role="tabpanel">
                <div class="row">

                    <div class="card-header text-danger">
                        Change Password
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-sm-10 col-md-7">
                                    <div class="row mt-3">
                                        <form action="{{ url('player/changePassword') }}" class="form-horizontal"
                                            method="POST">
                                            @csrf
                                            <div
                                                class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                <label for="current-password" class="col-md-4 control-label">Current
                                                    Password</label>
                                                <div class="col-md-8">
                                                    <input id="current-password" type="password" class="form-control"
                                                        name="current-password" required>
                                                    @if ($errors->has('current-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('current-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-md-4 control-label">New
                                                    Password</label>
                                                <div class="col-md-8">
                                                    <input id="new-password" type="password" class="form-control"
                                                        name="new-password" required>
                                                    @if ($errors->has('new-password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new-password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="new-password-confirm" class="col-md-4 control-label">Confirm
                                                    New Password</label>
                                                <div class="col-md-8">
                                                    <input id="new-password-confirm" type="password" class="form-control"
                                                        name="new-password_confirmation" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12 text-left">
                                                    <button type="submit" class="btn btn-primary">Change
                                                        Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- compose end --}}
            {{-- <script>
                console.log("tabscript")
                // Get all the tabs
                $('#myTab a').on('click', function(e) {
                    e.preventDefault();
                    $(this).tab('show');
                    // Hide other tabs
                    $('#myTab a').not(this).each(function() {
                        var tabSelector = $(this).attr('href');
                        $(tabSelector).hide();
                    });
                    // Show the clicked tab
                    var tabSelector = $(this).attr('href');
                    $(tabSelector).show();
                });
            </script> --}}
            <script>
                $(document).ready(function() {
                    $('.pass_show').append('<span class="ptxt">Show</span>');
                });


                $(document).on('click', '.pass_show .ptxt', function() {

                    $(this).text($(this).text() == "Show" ? "Hide" : "Show");

                    $(this).prev().attr('type', function(index, attr) {
                        return attr == 'password' ? 'text' : 'password';
                    });

                });
            </script>

        </div>



    </div>
@endsection
