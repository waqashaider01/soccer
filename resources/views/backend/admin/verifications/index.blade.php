@extends("backend.admin.layouts.app")
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/dashboard/activity.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    table, th, td{
        border:1px solid black;
        text-align: center;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
    }

</style>
@endpush
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

<center><h1>Pending Verifications</h1></center>
<table class="center" style="width:80%">
    <thead>

    <tr>
    {{--<th>ID</th>--}}       
    <th>Name</th>
    <th>Email</th>
    <th>PhotoFront</th>
    <th>Photo Back</th>
    {{--<th>Verification Status</th>--}}
    <th>Actions</th>

    </tr>


    <tbody>

    @foreach( $user as $user)

        <tr>

            {{--<td>--}}
                {{--{{ $user->id }}--}}
            {{--</td>--}}

            <td>
                @foreach( $userDetails as $userData )
                    @if($user->user_id === $userData->id)
                        {{$userData->name}}


            </td>
            <td>
                {{ $userData->email }}


                @endif

                @endforeach
            </td>
            <td>

                <a href="{{ asset('uploads/nicImages/'.$user->photofront) }}"  > <img src="{{ asset('uploads/nicImages/'.$user->photofront) }}" height="70px" width="70px"></a>
            </td>
            <td>

               <a href="{{ asset('uploads/nicImages/'.$user->photoback) }}"> <img src="{{ asset('uploads/nicImages/'.$user->photoback) }}" height="70px" width="70px"></a>
            </td>
            {{--<td>--}}
                {{--@if($user->status == 0)--}}

                    {{--Pending Verification--}}

                    {{--@endif--}}

            {{--</td>--}}
            <td>


                    <a href="{{ url('verified/'. $user->id ) }}"  style="margin-top: 10px;">Approve</a>

            </td>


        </tr>






    @endforeach
    </tbody>

    </table>




@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

<script>let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
    });</script>
@endpush