@extends('backend.admin.layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .nav-tabs,.tab-content{
        width: 70%;
        display: flex;
        margin-left: auto;
        margin-right: auto;
        margin-top: 51px;
    }
    .nav-link{
        font-weight: 600;
        font-size: 18px;
    }
    
</style>
<ul class="nav nav-tabs " id="myTab" role="tablist">
    <li class="nav-item active me-4" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
    </li>
    <li class="nav-item me-4" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#players" type="button" role="tab" aria-controls="players" aria-selected="false">Players</button>
    </li>
    <li class="nav-item me-4" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#agents" type="button" role="tab" aria-controls="agents" aria-selected="false">Agents</button>
    </li>
    <li class="nav-item me-4" role="presentation">
        <button class="nav-link" id="agents-tab" data-bs-toggle="tab" data-bs-target="#acadmies" type="button" role="tab" aria-controls="acadmies" aria-selected="false">Academies and Clubs</button>
      </li>
  </ul>

  {{-------------------------- Tabs satrts---------------------------- --}}
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
        <form action="{{'helpquestion/store'}}" method="post">
            @csrf
            <input type="hidden" name="category" value="general" >
            <input type="text" name="question" required class="form-control p-2 mb-3" placeholder="Write aquestion">
           <textarea name="answer"  required class="form-control p-2 mb-3" cols="100" rows="10" placeholder="write our answer of the question here"></textarea>
           <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($generl)>0)
                      @foreach ($generl as $genrals)  
                      <tr>
                          <td>{{$genrals->id}}</td>
                          <td>{{$genrals->question}}</td>
                          <td>{{$genrals->answer}}</td>
                          <td>
                              <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$genrals->id}}">Edit</a>
                                 <form action="{{url("admin/helpquestion/delete/".$genrals->id)}}" method="post" class="d-inline-flex">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                          </td>
                      </tr>
                       @endforeach
                       @endif
                </tbody>
            </table>
    
            @foreach ($generl as $genrels)  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$genrels->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>  
                        <form action="{{url('admin/helpquestion/store/'.$genrels->id)}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="category" value="general" >
                            <input type="text" name="question" required class="form-control p-2 mb-3" value="{{$genrels->question}}">
                            <textarea name="answer"  required class="form-control p-2 mb-" cols="100" rows="10" >{{$genrels->answer}}</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
             @endforeach
        </div>

    </div>

    <div class="tab-pane fade" id="players" role="tabpanel" aria-labelledby="players-tab">
        <form action="{{'helpquestion/store'}}" method="post">
            @csrf
            <input type="hidden" name="category" value="players" >
            <input type="text" name="question" required class="form-control p-2 mb-3" placeholder="Write aquestion">
           <textarea name="answer"  required class="form-control p-2 mb-3" cols="100" rows="10" placeholder="write our answer of the question here"></textarea>
           <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($players)>0)
                      @foreach ($players as $player)  
                      <tr>
                          <td>{{$player->id}}</td>
                          <td>{{$player->question}}</td>
                          <td>{{$player->answer}}</td>
                          <td>
                              <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$player->id}}">Edit</a>
                                 <form action="{{url("admin/helpquestion/delete/".$player->id)}}" method="post" class="d-inline-flex">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                          </td>
                      </tr>
                       @endforeach
                       @endif
                </tbody>
            </table>
    
            @foreach ($players as $player)  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$player->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>  
                        <form action="{{url('admin/helpquestion/store/'.$player->id)}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="category" value="players" >
                            <input type="text" name="question" required class="form-control p-2 mb-3" value="{{$player->question}}">
                            <textarea name="answer"  required class="form-control p-2 mb-" cols="100" rows="10" >{{$player->answer}}</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
             @endforeach
        </div>
    </div>

    <div class="tab-pane fade" id="agents" role="tabpanel" aria-labelledby="agents-tab">
        
        <form action="{{'helpquestion/store'}}" method="post">
            @csrf
            <input type="hidden" name="category" value="agents" >
            <input type="text" name="question" required class="form-control p-2 mb-3" placeholder="Write aquestion">
           <textarea name="answer"  required class="form-control p-2 mb-3" cols="100" rows="10" placeholder="write our answer of the question here"></textarea>
           <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($agents)>0)
                      @foreach ($agents as $agent)  
                      <tr>
                          <td>{{$agent->id}}</td>
                          <td>{{$agent->question}}</td>
                          <td>{{$agent->answer}}</td>
                          <td>
                              <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$agent->id}}">Edit</a>
                                 <form action="{{url("admin/helpquestion/delete/".$agent->id)}}" method="post" class="d-inline-flex">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                          </td>
                      </tr>
                       @endforeach
                       @endif
                </tbody>
            </table>
    
            @foreach ($agents as $agent)  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$agent->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>  
                        <form action="{{url('admin/helpquestion/store/'.$agent->id)}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="category" value="agents" >
                            <input type="text" name="question" required class="form-control p-2 mb-3" value="{{$agent->question}}">
                            <textarea name="answer"  required class="form-control p-2 mb-" cols="100" rows="10" >{{$agent->answer}}</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
             @endforeach
        </div>

    </div>

    <div class="tab-pane fade" id="acadmies" role="tabpanel" aria-labelledby="acadmies-tab">
        <form action="{{'helpquestion/store'}}" method="post">
            @csrf
            <input type="hidden" name="category" value="acadmies" >
            <input type="text" name="question" required class="form-control p-2 mb-3" placeholder="Write aquestion">
           <textarea name="answer"  required class="form-control p-2 mb-3" cols="100" rows="10" placeholder="write our answer of the question here"></textarea>
           <button type="submit" class="btn btn-primary">Add</button>
        </form>
        <div class="mt-5">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($acadmies)>0)
                      @foreach ($acadmies as $academy)  
                      <tr>
                          <td>{{$academy->id}}</td>
                          <td>{{$academy->question}}</td>
                          <td>{{$academy->answer}}</td>
                          <td>
                              <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{$academy->id}}">Edit</a>
                                 <form action="{{url("admin/helpquestion/delete/".$academy->id)}}" method="post" class="d-inline-flex">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                          </td>
                      </tr>
                       @endforeach
                       @endif
                </tbody>
            </table>
    
            @foreach ($acadmies as $academy)  
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$academy->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>  
                        <form action="{{url('admin/helpquestion/store/'.$academy->id)}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="category" value="acadmies" >
                            <input type="text" name="question" required class="form-control p-2 mb-3" value="{{$academy->question}}">
                            <textarea name="answer"  required class="form-control p-2 mb-" cols="100" rows="10" >{{$academy->answer}}</textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
  </div>

@endsection