@extends('backend.agent.layouts.app')
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
           @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                <button class="nav-link" id="nav" data-bs-toggle="tab" data-bs-target="#blockedUsers" type="button"
                    aria-selected="true">
                    <i class="far fa-edit"></i> Blocked Users
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
                    <form action="{{ route('agent-privacy-set' ,['id'=> auth()->user()->id]) }}" method="post">
                        @csrf
                        <div class="row mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-2 ">
                                <label for="Telephone" class="form-label">Telephone</label>
                            </div>
                            
                            <div class="col-md-4 ">
                                <select id="Telephone" name="telephone" class="form-select">
                                    
                                    <option value="everyone" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 0)) selected @endif>Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 1)) selected @endif>Only Me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 2)) selected @endif>Only Contact</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 3)) selected @endif>Only Share With</option>
                         
                                </select>

                            </div>
                               <div class="col-md-3"></div>
                           </div>
                        <div class="row mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-2">
                                <label for="Email" class="form-label me-3">Email</label>
                            </div>
                            <div class="col-md-4">
                                <select id="Email" name="email" class="form-select">
                                    <option value="everyone" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 0)) selected @endif>Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 1)) selected @endif>only me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 2)) selected @endif>only contact</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 3)) selected @endif>Only Share With</option>
                                    
                                </select>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-2">
                                <label for="Website" class="form-label me-3">Website</label>
                            </div>
                            <div class="col-md-4">
                                <select id="Website" name="website" class="form-select">
                                    <option value="everyone" @if (isset($UserPrivacy->website) &&  ($UserPrivacy->website == 0)) selected @endif>Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->website) && ($UserPrivacy->website == 1))  selected @endif>Only Me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->website) && ($UserPrivacy->website == 2))  selected @endif>Only contact</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->website) && ($UserPrivacy->website == 3))  selected @endif>only share with</option>


                                 
                                </select>
                            </div>
                            <div class="col-md-3"></div>

                        </div>
                        <div class="row mb-3 d-flex justify-content-center align-items-center">
<d iv class="col-md-3"></d>
                            <div class="col-md-2">
                                <label for="SocialMediaLinks" class="form-label-3">Social Media  Links</label>
                            </div>
                            <div class="col-md-4 ">
                                <select id="SocialMediaLinks" name="social_media_links" class="form-select width">
                                    <option value="everyone" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 0))  selected @endif >Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 1))  selected @endif >only me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 2))  selected @endif >Only Contacts</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 3))  selected @endif >Only share with</option>

                                </select>
                            </div>
                            <div class="col-md-3"></div>




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
                        <div class="row align-items-center mb-3 d-flex" style="background: #222e3c;">
                            <div class="col-md-10">
                              <h6 class="mb-0 d-inline-flex" style="color:white">ACTIVITY</h6>
                            </div>
                            <div class="col-md-1">
                              <h6 class="mb-0 text-center" style="padding:4px;background:blue;color:white;">Yes</h6>
                            </div>
                            <div class="col-md-1">
                              <h6 class="mb-0 text-center" style="padding:4px;color:white;">No</h6>
                            </div>
                        </div>

                    <div class="row mb-3 " >
                       <form action="{{ route('mailpreference' ,['id'=> Auth::id()]) }}" method="post">
                            @csrf
                        <div class="row mb-3">
                            <div class="col-md-10 d-inline-flex ">
                                <label for="btn">A member replies to an update or coment you've posted</label>
                            </div>
                            <div class="col-md-1 ps-4 d-inline-flex">
                                <input type="radio" id="html" {{ $mail_pref->comment == 1 ? 'checked' : '' }}
                                    name="comment" value="1">
                                <label for="html"></label>
                            </div>
                            <div class="col-md-1 d-inline-flex">
                                <input type="radio" id="css" {{ $mail_pref->comment == 0 ? 'checked' : '' }}
                                    name="comment" value="0">
                                <label for="css"></label>
                            </div>

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


            {{-- block user --}}
            <div class="tab-pane fade" id="blockedUsers" role="tabpanel">
                <div class=" table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> E-mail</th>
                                <th> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($blockusers ??[] as $BlockUser)
                                <tr>
                                    <td>{{ $BlockUser->name ?? '' }}</td>
                                    <td>{{ $BlockUser->email ?? ''}}</td>
                                    <td>
                                        @isset(Auth::user()->type)
                                            @if (Auth::user()->type == 'scout' || Auth::user()->type == 'club' || Auth::user()->type == 'coach' || Auth::user()->type == 'intermediary' || Auth::user()->type == 'academy')
                                                <a href="{{ route('unblock', $BlockUser->id) }}" type="button" class="btn option btn-danger">Unblock</a>
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
                                        <form action="{{ route('agent.password.change') }}" class="form-horizontal"
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
