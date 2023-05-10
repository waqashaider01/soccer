@extends('backend.player.layouts.app')

@section('content')

    <div class="container-fluid">
        @if (count($subscriptions) > 0)
            <div class="row">
                <div class="col-10 py-5 mx-auto">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <div class="text-center mb-2" style="border-bottom:1px solid red">
                        <h1>Subscriptions</h1>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Subscription Created</th>
                                        <th>Cancel Subscription</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscriptions as $subscription)
                                        <tr>
                                            <td>{{ $subscription->id }}</td>
                                            <td>{{ $subscription->name }}</td>
                                            <td>{{ $subscription->created_at }}</td>
                                            @if ($subscription->ends_at == null)
                                                <td>
                                                    <a href="{{ route('cancel-subscription', $subscription->name) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to cancel this subscription?')">Cancel
                                                        Subscription</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="btn btn-danger" disabled>Subscription Cancelled</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-10 py-5 mx-auto">
                    <div class="text-center mb-2" style="border-bottom:1px solid red">
                        <h1>No Subscriptions</h1>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
