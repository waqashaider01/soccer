@extends('backend.admin.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/messages.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--<script>-->
    <!--    $(document).ready(function() {-->
    <!--        $('select').change(function() {-->
    <!--            $('select option')[0].value = $('select option:selected').val();-->
    <!--            $('select option')[0].innerHTML = $('select option:selected').val();-->
    <!--            $("select").val($('select option:selected').val());-->

    <!--            console.log($('select option:selected').val());-->
    <!--        });-->
    <!--    });-->
    <!--</script>-->
@endpush
@section('content')
    <div class="messages">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                <button class="nav-link active" id="nav-starred-tab" data-bs-toggle="tab" data-bs-target="#nav-starred"
                    type="button" aria-selected="true">
                    <i class="far fa-address-card"></i>
                    <span class="position-relative">
                        Privacy Setting
                    </span>
                </button>

                <button class="nav-link" id="nav-compose-tab" data-bs-toggle="tab" data-bs-target="#nav-compose"
                    type="button" aria-selected="true">
                    <i class="far fa-edit"></i> Change Password
                </button>
                <button class="nav-link" id="nav-blocked-users" data-bs-toggle="tab" data-bs-target="#blocked-users"
                    type="button" aria-selected="true">
                    <i class="far fa-edit"></i> Blocked Users
                </button>
                {{-- <button class="nav-link" id="nav-verification" data-bs-toggle="tab" data-bs-target="#verification"
                    type="button" aria-selected="true">
                    <i class="far fa-edit"></i> Account Verification
                </button> --}}
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="tab-pane fade" id="nav-inbox" role="tabpanel">

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div> -->
            {{-- inbox end --}}

            <div class="tab-pane fade show active" id="nav-starred" role="tabpanel">
                <div class="card-header text-danger">
                    Information Visibility
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/adminsecurity/'.auth()->user()->id) }}" method="post">
                        @csrf
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-sm-2">
                                <label for="Telephone" class="form-label">Telephone</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="Telephone" name="telephone" class="form-select">
                                    
                                    <option value="everyone" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 0)) selected @endif>Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 1)) selected @endif>Only Me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 2)) selected @endif>Only Contact</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->telephone) &&  ($UserPrivacy->telephone == 3)) selected @endif>Only Share With</option>
                         
                                </select>

                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-sm-2">
                                <label for="Email" class="form-label me-3">Email</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="Email" name="email" class="form-select">
                                    <option value="everyone" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 0)) selected @endif>Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 1)) selected @endif>only me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 2)) selected @endif>only contact</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->email) &&  ($UserPrivacy->email == 3)) selected @endif>Only Share With</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <div class="col-sm-2">
                                <label for="Website" class="form-label me-3">Website</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="Website" name="website" class="form-select">
                                    <option value="everyone" @if (isset($UserPrivacy->website) &&  ($UserPrivacy->website == 0)) selected @endif>Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->website) && ($UserPrivacy->website == 1))  selected @endif>Only Me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->website) && ($UserPrivacy->website == 2))  selected @endif>Only contact</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->website) && ($UserPrivacy->website == 3))  selected @endif>only share with</option>


                                 
                                </select>
                            </div>

                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">

                            <div class="col-sm-2">
                                <label for="SocialMediaLinks" class="form-label-3">Social Media <br> Links</label>
                            </div>
                            <div class="col-sm-9 col-md-5 col-10">
                                <select id="SocialMediaLinks" name="social_media_links" class="form-select width">
                                    <option value="everyone" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 0))  selected @endif >Everyone</option>
                                    <option value="only_me" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 1))  selected @endif >only me</option>
                                    <option value="only_contact" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 2))  selected @endif >Only Contacts</option>
                                    <option value="only_share_with" @if (isset($UserPrivacy->social_media_links) && ($UserPrivacy->social_media_links == 3))  selected @endif >Only share with</option>

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
            <div class="tab-pane fade" id="blocked-users" role="tabpanel">
                <div class="row">

                    <div class="card-header text-danger">
                        Blocked Users
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Type</th>
                                            {{-- <th scope="col">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($blocked_users))
                                            @foreach ($blocked_users as $blo_user)
                                                <tr>
                                                    <th scope="row">{{ $blo_user->id }}</th>
                                                    <td>{{ $blo_user->name }}</td>
                                                    <td>{{ $blo_user->email }}</td>
                                                    <td>{{ $blo_user->type }}</td>
                                                    {{-- <td>
                                            <a href="">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td> --}}
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- compose end --}}

            {{-- Account Verification --}}

            {{-- <div class="tab-pane fade" id="verification" role="tabpanel">
                <div class="row">

                    <div class="card-header text-danger">
                        Account Verification
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row justify-content-center">
                                <form action="{{ url('admin/save-accverification') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Title</label>
                                        <input type="title" class="form-control" name="title"
                                            id="exampleFormControlInput1" placeholder="Title here">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table mt-5">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->description }}</td>
                                <td>
                                    <a href="{{ url('admin/delete-verification') }}/{{ $data->id }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                    </div>

                </div>
            </div> --}}
            {{-- compose end --}}

            <style>
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
                                        <form action="{{ url('admin/changeadminPassword') }}" class="form-horizontal"
                                            method="POST">
                                            @csrf

                                            <div
                                                class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                <label for="current-password" class="col-md-4 control-label">Current
                                                    Password</label>
                                                <div class="col-md-6">
                                                    <input id="current-password" type="password" class="form-control"
                                                        name="current-password" required>
                                                    @if ($errors->has('current-password'))
                                                        <span
                                                            class="help-block"><strong>{{ $errors->first('current-password') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                <label for="new-password" class="col-md-4 control-label">New
                                                    Password</label>
                                                <div class="col-md-6">
                                                    <input id="new-password" type="password" class="form-control"
                                                        name="new-password" required>
                                                    @if ($errors->has('new-password'))
                                                        <span
                                                            class="help-block"><strong>{{ $errors->first('new-password') }}</strong></span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="new-password-confirm" class="col-md-4 control-label">Confirm
                                                    New Password</label>
                                                <div class="col-md-6">
                                                    <input id="new-password-confirm" type="password" class="form-control"
                                                        name="new-password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 mt-4">
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
