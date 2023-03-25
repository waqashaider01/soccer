@extends("frontend.layouts.app")

@push('styles')
<style>
    body {
        font-family: "Oswald", sans-serif;
    }

    .justify-content-center {
        margin-top: 50px;
        margin-bottom: 50px;
        justify-content: center;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@endpush

@section('content')

{{-- add a form --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{ __('Guardian Approval Form') }}</h2>
                </div>
                <br>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('guardian.approve') }}">
                        @csrf
                        <input type="hidden" name="guardian_id" value="{{ $guardian->id }}">

                        <div class="form-group{{ $errors->has('guardian_id') ? ' has-error' : '' }}">
                            <label for="guardian_id" class="col-md-4 control-label">{{ __('Guardian ID') }}</label>
                            <div class="col-md-12">
                                <input id="guardian_id" type="text" class="form-control" name="guardian_id" value="{{ $guardian->id }}" readonly>
                                @if ($errors->has('guardian_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('guardian_email') ? ' has-error' : '' }}">
                            <label for="guardian_email" class="col-md-4 control-label">{{ __('Guardian Email') }}</label>
                            <div class="col-md-12">
                                <input id="guardian_email" type="text" class="form-control" name="guardian_email" value="{{ $guardian->gurdian_email }}" readonly>
                                @if ($errors->has('guardian_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('guardian_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('player_id') ? ' has-error' : '' }}">
                            <label for="player_id" class="col-md-4 control-label">{{ __('Player ID') }}</label>
                            <div class="col-md-12">
                                <input id="player_id" type="text" class="form-control" name="player_id" value="{{ $guardian->player->id }}" readonly>
                                @if ($errors->has('player_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('player_name') ? ' has-error' : '' }}">
                            <label for="player_name" class="col-md-4 control-label">{{ __('Player Name') }}</label>
                            <div class="col-md-12">
                                <input id="player_name" type="text" class="form-control" name="player_name" value="{{ $guardian->player->name }}" readonly>
                                @if ($errors->has('player_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('player_email') ? ' has-error' : '' }}">
                            <label for="player_email" class="col-md-4 control-label">{{ __('Player Email') }}</label>
                            <div class="col-md-12">
                                <input id="player_email" type="text" class="form-control" name="player_email" value="{{ $guardian->player->email }}" readonly>
                                @if ($errors->has('player_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('player_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="status" value="approved">
                                    {{ __('Approve') }}
                                </button>
                                <button type="submit" onclick="return confirm('Are you sure you want to disapprove it?')" class="btn btn-danger" name="status" value="disapproved">
                                    {{ __('Disapprove') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
