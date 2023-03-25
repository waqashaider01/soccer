@extends('frontend.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<style>
    body {
        font-family: "Oswald", sans-serif;
    }
</style>
@endpush
@section('content')
<section class="blog-hero">
    <div class="heading">
        <h1>HELP</h1>
    </div>

</section>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 py-4 mx-auto">
            {{-- tab --}}
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="border: 2px solid black;font-size:18px">
                <li class="nav-item pe-5 me-5" role="presentation" style="border-right: 2px solid black">
                    <a class="nav-link active pe-md-4 pe-0 me-md-1 me-0 ms-md-5 ms-0 pb-md-1 pb-0 "
                        style="border: none !important;" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                        type="button" role="tab" aria-controls="general" aria-selected="true">General</a>
                </li>
                <li class="nav-item pe-5 me-5" role="presentation" style="border-right: 2px solid black">
                    <a class="nav-link pe-md-4 pe-0 me-md-2 me-0 pb-md-1 pb-0" style="border: none !important;"
                        id="players-tab" data-bs-toggle="tab" data-bs-target="#players" type="button" role="tab"
                        aria-controls="players" aria-selected="false">Players</a>
                </li>
                <li class="nav-item pe-5 me-5" role="presentation" style="border-right: 2px solid black">
                    <button class="nav-link pe-md-4 pe-0 me-md-2 me-0 pb-md-1 pb-0" style="border: none !important;"
                        id="agents-tab" data-bs-toggle="tab" data-bs-target="#agents" type="button" role="tab"
                        aria-controls="agents" aria-selected="false">Agents </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link pe-md-5 pe-0 me-md-3 me-0 pb-md-2 pb-0 mb-md-1 mb-0"
                        style="border: none !important;" id="academies-tab" data-bs-toggle="tab"
                        data-bs-target="#academies" type="button" role="tab" aria-controls="academies"
                        aria-selected="false">Academies and
                        Clubs</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                {{-- General tab --}}
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    @if(count($generls) > 0)     
                        @foreach ($generls as $generl)
                        <div class="accordion" id="accordionExample{{$generl->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$generl->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$generl->id}}" aria-expanded="true" aria-controls="collapse{{$generl->id}}">
                                       {{$generl->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{$generl->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$generl->id}}"
                                    data-bs-parent="#accordionExample{{$generl->id}}">
                                    <div class="accordion-body">
                                        {{$generl->answer}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                
                </div>

                {{-- Player --}}
                <div class="tab-pane fade " id="players" role="tabpanel" aria-labelledby="players-tab">
                    @if(count($players) > 0)     
                        @foreach ($players as $player)
                        <div class="accordion" id="accordionExample{{$player->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$player->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$player->id}}" aria-expanded="true" aria-controls="collapse{{$player->id}}">
                                       {{$player->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{$player->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$player->id}}"
                                    data-bs-parent="#accordionExample{{$player->id}}">
                                    <div class="accordion-body">
                                        {{$player->answer}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                
                </div>

                {{-- Agents --}}
                <div class="tab-pane fade" id="agents" role="tabpanel" aria-labelledby="agents-tab">
                    @if(count($agents) > 0)     
                        @foreach ($agents as $agent)
                        <div class="accordion" id="accordionExample{{$agent->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$agent->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$agent->id}}" aria-expanded="true" aria-controls="collapse{{$agent->id}}">
                                       {{$agent->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{$agent->id}}" class="accordion-collapse collapse " aria-labelledby="heading{{$agent->id}}"
                                    data-bs-parent="#accordionExample{{$agent->id}}">
                                    <div class="accordion-body">
                                        {{$agent->answer}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h3>No Question Here</h3>
                    @endif
                
                </div>

                {{-- Academies --}}
                <div class="tab-pane fade" id="academies" role="tabpanel" aria-labelledby="academies-tab">
                    @if(count($acadmies) > 0)     
                        @foreach ($acadmies as $acadmie)
                        <div class="accordion" id="accordionExample{{$acadmie->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$acadmie->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{$acadmie->id}}" aria-expanded="true" aria-controls="collapse{{$acadmie->id}}">
                                       {{$acadmie->question}}
                                    </button>
                                </h2>
                                <div id="collapse{{$acadmie->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$acadmie->id}}"
                                    data-bs-parent="#accordionExample{{$acadmie->id}}">
                                    <div class="accordion-body">
                                        {{$acadmie->answer}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <h3>No Question Here</h3>
                    @endif
                
                </div>
                












            </div>

         </div>
     </div>
</div>
@endsection