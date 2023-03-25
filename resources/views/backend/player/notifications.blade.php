@extends("backend.player.layouts.app")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/notifications.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="notifications">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active position-relative" id="nav-unread-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-unread" type="button" aria-selected="false">
                    <i class="far fa-envelope"></i>
                    <span class="position-relative">
                        Unread <span class="indicator-danger">10+</span>
                    </span>
                </button>

                <button class="nav-link" id="nav-read-tab" data-bs-toggle="tab" data-bs-target="#nav-read"
                    type="button" aria-selected="true">
                    <i class="far fa-envelope-open"></i>
                    <span class="position-relative">
                        Read <span class="indicator-primary">99+</span>
                    </span>
                </button>
            </div>
            <div class="view-select">
                <label for="view">View By:</label><br>
                <select name="view" id="view" class="mr-0">
                    <option value="">Newest First</option>
                    <option value="">Oldest First</option>
                </select>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-unread" role="tabpanel">
                <table class="table unread-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="read-total" id="read-total"></th>
                            <th>Notification</th>
                            <th>Date Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">Louis Anetekhai is now following you</td>
                            <td class="time">5 hours, 50 miuts ago</td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">Louis Anetekhai is now following you</td>
                            <td class="time">5 hours, 50 miuts ago</td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">Louis Anetekhai is now following you</td>
                            <td class="time">5 hours, 50 miuts ago</td>
                            <td>
                                <a href="" class="read-notification" data-bs-toggle="modal"
                                    data-bs-target="#readModal">Read</a> |
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>{{-- unread end --}}

            <div class="tab-pane fade" id="nav-read" role="tabpanel">
                <table class="table read-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="read-total" id="read-total"></th>
                            <th>Notification</th>
                            <th>Date Received</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">Louis Anetekhai is now following you</td>
                            <td class="time">5 hours, 50 miuts ago</td>
                            <td>
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">Louis Anetekhai is now following you</td>
                            <td class="time">5 hours, 50 miuts ago</td>
                            <td>
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="read-check" id="read-check"></td>
                            <td class="title">Louis Anetekhai is now following you</td>
                            <td class="time">5 hours, 50 miuts ago</td>
                            <td>
                                <a href="" class="delete-notification" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>{{-- read end --}}

        </div>
    @endsection
