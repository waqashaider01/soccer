@extends('backend.player.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/messages.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
    <style>
        /* .content {
                                                                                                                                                                                                                                                                                                                                                                    padding: 0 !important;
                                                                                                                                                                                                                                                                                                                                                                } */
    </style>
    @if (session('error'))
        <div class="alert alert-danger mb-0 py-1 text-center">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success mb-0 py-1 text-center">{{ session('success') }}</div>
    @endif
    <div class="container p-0">
        <div class="item">
            <img src="{{ asset('images/invite.png') }}" alt="" class="bg_img">
            <div class="text_wrapper">
                <div class="text_position">
                    <h3 class="item--title fw-bold">INVITE A FRIEND AND YOU WILL BOTH GET REWARD POINTS</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="container">
            <div class="text-center">
                <h6>Send an invite by email or share it with your Friends.</h6>
            </div>
            <form action="{{ route('invitation_code_send', auth()->user()->id) }}" method="post">
                @csrf
                <div class="d-flex justify-content-center mt-4 mb-4">
                    <div class="form-group me-2 " style="width:34%">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
                <div class="text-center mb-4">
                    <h6>Share the invite link on social media.</h6>
                </div>
                <div class="d-flex justify-content-center mt-4 mb-4">
                    <div class="form-group me-2"style="width:34%">
                        <input type="text" name="invitation_code" readonly class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" id="copytext" placeholder="Copy url:"
                            value="{{ url('/') }}/{{ auth()->user()->invitation_code }}">
                    </div>
                    <button type="button" id="copy" class="btn btn-primary">copy</button>
                </div>
            </form>
            <div class="text-center mb-4">
                <!-- Facebook -->
                <a style="color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f fa-lg me-2"></i></a>

                <!-- Twitter -->
                <a style="color: #55acee;" href="#!" role="button"><i class="fab fa-twitter fa-lg me-2"></i></a>

                <!-- Google -->
                <a style="color: #dd4b39;" href="#!" role="button"><i class="fab fa-google fa-lg me-2"></i></a>

                <!-- Instagram -->
                <a style="color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram fa-lg me-2"></i></a>
            </div>
            <div class="text-center mb-4">
                <h6>Copy your invite link and share it with your Friends.</h6>

            <div class="row px-5">
                

                <div class="mt-2 col-lg-3  col-md-4  col-sm-6">
                    <div class="card info">
                        <div class="card-body">
                            <div class="row gx-3">
                                <div class="col-2 mt-3">
                                    <div class="icon followers-icon">
                                        <i class="fa-solid fa-share" style="color:red ;"></i>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="text">
                                        <h5 class="title">{{ $invite_count ?? '0' }}</h5>
                                        <p class="description">Invitations Sent</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- info-card end --}}
                </div>

                <div class="mt-2 col-lg-3  col-md-4  col-sm-6">
                    <div class="card info">
                        <div class="card-body">
                            <div class="row gx-3">
                                <div class="col-2 mt-3">
                                    <div class="icon following-icon">
                                        <i class="fa-regular fa-clock" style="color:orange ;"></i>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="text">
                                        @php
                                             $pending = $invite_count-$invitefriend;
                                        @endphp
                                        <h5 class="title">{{$pending?$pending : '0'}}</h5>
                                        <p class="description">Pending</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- info-card end --}}
                </div>
                <div class="mt-2 col-lg-3  col-md-4  col-sm-6">
                    <div class="card info">
                        <div class="card-body">
                            <div class="row gx-3">
                                <div class="col-2 mt-3">
                                    <div class="icon favorites-icon">
                                        <i class="fa-solid fa-check" style="color:blue ;"></i>
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="text">
                                        <h5 class="title">{{$invitefriend}}</h5>
                                        <p class="description">Completed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- info-card end --}}
                </div>
                <div class="mt-2 col-lg-3  col-md-4  col-sm-6">
                    <div class="card info">
                        <div class="card-body">
                            <div class="row gx-3">
                                <div class="col-2 mt-3">
                                    <div class="icon favorites-icon">
                                        <!-- <i class="fa-solid fa-dollar-sign" style="color:green;"></i> -->
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="text">
                                        @php
                                            $earn=($invitefriend*10)/100;
                                        @endphp
                                        <h5 class="title">{{$earn}}</h5>
                                        <p class="description">Point Earned</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>{{-- info-card end --}}
                </div>

                
               
                <section class="intro">
                    <div class="bg-image h-100" style="background-color: #f5f7fa;">
                        <div class="mask d-flex align-items-center h-100">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <div class="table-responsive table-scroll"
                                                    data-mdb-perfect-scrollbar="true"
                                                    style="position: relative; height: 400px">
                                                    <table class="table table-striped mb-0" style="border-bottom:none;">
                                                        <thead style="background-color: #222e3c;">
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Status</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @if(count($all_invitations) > 0)
                                                                @foreach($all_invitations as $invitation)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{ $invitation->email }}</td>
                                                                        <td>
                                                                            @php $is_complete = false; @endphp
                                                                            @foreach($friends as $friend)
                                                                                @if($friend->email==$invitation->email)
                                                                                    <p class="mb-0">complete</p>
                                                                                    @php $is_complete = true; @endphp
                                                                                    @break
                                                                                @endif
                                                                            @endforeach
                                                                            @if(!$is_complete)
                                                                                <p class="mb-0">sent</p>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
