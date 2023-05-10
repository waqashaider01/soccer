@extends("backend.player.layouts.app")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/messages.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"
        integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('content')
    <!--Read Modal -->
    <div class="modal fade" id="readModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readModalLabel">Notification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt vero eum qui doloremque tempore odio
                        aperiam veritatis nesciunt harum sapiente.</p>
                    <small><b>5 hours, 50 minutes ago</b></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Mark as Read</button>
                </div>
            </div>
        </div>
    </div>
    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="messages">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @if(isset($receiver))
                <button class="nav-link" id="nav-inbox-tab" data-bs-toggle="tab" data-bs-target="#nav-inbox"
                    type="button" aria-selected="false">
                    <i class="fas fa-id-card"></i>
                    <span class="position-relative">
                        inbox <span class="indicator-primary">{{$inbox_count ?? ''}}</span>
                    </span>
                </button>
                @else
                <button class="nav-link active" id="nav-inbox-tab" data-bs-toggle="tab" data-bs-target="#nav-inbox"
                    type="button" aria-selected="true">
                    <i class="fas fa-id-card"></i>
                    <span class="position-relative">
                        inbox <span class="indicator-primary">{{$inbox_count ?? ''}}</span>
                    </span>
                </button>
                @endif
                <button class="nav-link" id="nav-starred-tab" data-bs-toggle="tab" data-bs-target="#nav-starred"
                    type="button" aria-selected="false">
                    <i class="far fa-star"></i>
                    <span class="position-relative">
                        starred <span class="indicator-danger">{{$star_count ?? ''}}</span>
                    </span>
                </button>
                <button class="nav-link" id="nav-sent-tab" data-bs-toggle="tab" data-bs-target="#nav-sent"
                    type="button" aria-selected="false">
                    <i class="far fa-paper-plane"></i>
                    <span class="position-relative">
                        sent<span class="indicator-primary">{{$sent_count ?? ''}}</span>
                    </span>
                </button>
                @isset($receiver)
                <button class="nav-link active" id="nav-compose-tab" data-bs-toggle="tab" data-bs-target="#nav-compose"
                type="button" aria-selected="true">
                <i class="far fa-edit"></i> compose
                </button>
                @endisset

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @if(isset($receiver))
            <div class="tab-pane fade" id="nav-inbox" role="tabpanel">
            @else
            <div class="tab-pane fade show active" id="nav-inbox" role="tabpanel">
            @endif
                <table class="inbox-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="read-total" id="read-total"></th>
                            <th>From</th>
                            <th>Subject</th>
                            <th><i class="far fa-star"></i></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inbox as $inboxs)
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">
                                <img src="{{ asset('images/blog/blog1.jpg') }}" alt="">
                                <span>From: </span> {{$inboxs->sender_name}}
                                <p class="mt-2">{{$inboxs->message_sent_time}}</p>
                            </td>
                            <td>
                                <p>Subject: {{$inboxs->message_subject}}</p>
                                <p>{{$inboxs->message}}</p>
                            </td>
                            <td>
                                @if($inboxs->starred_message == 1)
                                <a href="/unstarred_message/{{$inboxs->id}}"><i class="fa-solid fa-star"></i></a>

                                @else
                                <a href="/starred_message/{{$inboxs->id}}"><i class="far fa-star"></i></a>
                                @endif
                            </td>
                            <td>
                                {{-- <a href="/read_message/{{$inboxs->id}}" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a>  --}}
                                    @if($inboxs->read_message == 1)
                                    <a href="/unread_message/{{$inboxs->id}}" class="read-notification"
                                        >Unread</a>
                                    @else
                                    <a href="/read_message/{{$inboxs->id}}" class="read-notification"
                                        >Read</a>
                                    @endif
                                {{-- <a href="delete_receive/{id}" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a> --}}
                                    <a href="delete_receive/{{$inboxs->id}}" class="delete-notification">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">
                                <img src="{{ asset('images/blog/blog2.jpg') }}" alt="">
                                <span>To: </span>Lorem ipsum dolor sit, amet consectetur <span>(2)</span>
                                <p class="mt-2">June 27, 2021 at 12:30 am</p>
                            </td>
                            <td>
                                <p>Re: Test</p>
                                <p>Lorem ipsum dolor sit, amet consectetur Lorem, ipsum dolor.</p>
                            </td>
                            <td><i class="far fa-star"></i></td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">
                                <img src="{{ asset('images/blog/blog3.jpg') }}" alt="">
                                <span>To: </span>Lorem ipsum dolor sit, amet consectetur <span>(2)</span>
                                <p class="mt-2">June 27, 2021 at 12:30 am</p>
                            </td>
                            <td>
                                <p>Re: Test</p>
                                <p>Lorem ipsum dolor sit, amet consectetur Lorem, ipsum dolor.</p>
                            </td>
                            <td><i class="far fa-star"></i></td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>--}}
                    </tbody>
                </table>
            </div>

            <div class="tab-pane fade" id="nav-starred" role="tabpanel">
                <div class="card">
                    <div class="card-header text-danger">
                        Messages Starred
                    </div>
                    <div class="card-body">
                        <table class="starred-table">
                            <tbody>
                                @foreach($starred_message as $star)
                                <tr>
                                    <td class="star"><i class="fas fa-star"></i></td>
                                    <td class="title"><b>{{$star->sender_name}}</b></td>
                                    <td class="description">{{$star->message}}
                                    </td>
                                    <td class="time"><b>{{$star->message_sent_time}}</b></td>
                                    <td>

                                        {{-- <a href="" class="delete-notification" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"><i class="fas fa-trash"></i></a>&nbsp; --}}
                                        <a href="delete_receive/{{$inboxs->id}}" class="delete-notification" ><i class="fas fa-trash"></i></a>&nbsp;

                                        {{-- <a href="" class="read-notification" data-bs-toggle="modal"
                                        data-bs-target="#readModal"><i class="far fa-envelope"></i></a> --}}

                                        @if($star->read_message == 1)
                                        <a href="/unread_message/{{$star->id}}" class="read-notification">
                                            <i class="fa-solid fa-envelope-open"></i> </a>
                                        @else
                                        <a href="/read_message/{{$star->id}}" class="read-notification"><i class="far fa-envelope"></i></a>


                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td class="star"><i class="fas fa-star"></i></td>
                                    <td class="title"><b>Muhammad Salman</b></td>
                                    <td class="description">Lorem, ipsum dolor sit amet consectetur adipisicing lorem7
                                    </td>
                                    <td class="time"><b>11:20PM</b></td>
                                    <td>

                                        <a href="" class="delete-notification" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"><i class="fas fa-trash"></i></a>&nbsp;
                                        <a href="" class="read-notification" data-bs-toggle="modal"
                                            data-bs-target="#readModal"><i class="far fa-envelope"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="star"><i class="fas fa-star"></i></td>
                                    <td class="title"><b>Waqar Khattak</b></td>
                                    <td class="description">Lorem, ipsum dolor sit amet consectetur adipisicing lorem7
                                    </td>
                                    <td class="time"><b>11:20PM</b></td>
                                    <td>

                                        <a href="" class="delete-notification" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"><i class="fas fa-trash"></i></a>&nbsp;
                                        <a href="" class="read-notification" data-bs-toggle="modal"
                                            data-bs-target="#readModal"><i class="far fa-envelope"></i></a>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>{{-- starred end --}}

            <div class="tab-pane fade" id="nav-sent" role="tabpanel">
                <table class="sent-table">
                    <thead>
                        <tr>
                            {{-- <th><input type="checkbox" name="read-total" id="read-total"></th> --}}
                            <th>From</th>
                            <th>Subject</th>
                            {{-- <th><i class="far fa-star"></i></th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sent_message as $sent_messages)


                        <tr>
                            {{-- <td><input type="checkbox" name="read-check" id="read-check"></td> --}}
                            <td class="title">
                                <img src="{{ asset('images/blog/blog1.jpg') }}" alt="">
                                <span>To: </span>{{$sent_messages['receiver_name']}}
                                <p class="mt-2">{{date('d/M/Y H:i:s', strtotime($sent_messages['message_sent_time']))}}</p>
                            </td>
                            <td>
                                <p>Subject: {{$sent_messages['message_subject']}}</p>
                                <p>{{$sent_messages['message']}}</p>
                            </td>
                            {{-- <td><i class="far fa-star"></i></td> --}}
                            <td>
                                 <!--<a href="" class="read-notification" data-bs-toggle="modal"-->
                                 <!--   data-bs-target="#readModal">Read</a>-->
                                <!--<a href="/delete_sent/{{$sent_messages->id}}" class="delete-notification" >Delete</a>-->
                                     <a href="/delete_sent/{{$sent_messages->id}}" class="delete-notification" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">
                                <img src="{{ asset('images/blog/blog2.jpg') }}" alt="">
                                <span>To: </span>Lorem ipsum dolor sit, amet consectetur <span>(2)</span>
                                <p class="mt-2">June 27, 2021 at 12:30 am</p>
                            </td>
                            <td>
                                <p>Re: Test</p>
                                <p>Lorem ipsum dolor sit, amet consectetur Lorem, ipsum dolor.</p>
                            </td>
                            <td><i class="far fa-star"></i></td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">
                                <img src="{{ asset('images/blog/blog3.jpg') }}" alt="">
                                <span>To: </span>Lorem ipsum dolor sit, amet consectetur <span>(2)</span>
                                <p class="mt-2">June 27, 2021 at 12:30 am</p>
                            </td>
                            <td>
                                <p>Re: Test</p>
                                <p>Lorem ipsum dolor sit, amet consectetur Lorem, ipsum dolor.</p>
                            </td>
                            <td><i class="far fa-star"></i></td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>{{-- sent end --}}




            @isset($receiver)
            <div class="tab-pane fade show active" id="nav-compose" role="tabpanel">
                <div class="row">
                    <div class="col-md-4">
                       <form action="/sentmessage" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="receiver_id" value="{{$receiver->id}}">

                            <div class="mb-3">
                                <label for="sendTo" class="form-label">Send to *</label>
                                <input type="text" class="form-control" name="receiver" id="receiver" value="{{$receiver->name}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text" class="form-control" name="subject" id="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control" name="message" id="message" rows="7" ></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="attachment" class="form-label">Add an attachment *</label>
                                <input class="form-control" type="file" name="file" id="attachment" required>
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <button type="submit" class="btn save-btn">Send Message</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>{{-- compose end --}}
            @endisset
        </div>
    @endsection
