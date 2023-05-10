
<form action="/player/attributes/save" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <h5 class="mb-3">Technical</h5>
            @include('backend.player.profile.attributes.technical')
        </div>
        {{-- Technical-attributes end --}}


        <div class="col-md-4">
            <h5 class="mb-3">Tactical</h5>
            @include('backend.player.profile.attributes.tactical')
        </div>
        {{-- Tactical-attributes end --}}


        <div class="col-md-4">
            <h5 class="mb-3">Physical</h5>
            @include('backend.player.profile.attributes.physical')
        </div>
        {{-- Physical-attributes end --}}
    </div>
    <div class="row">
        @if (isset($PlayerAttribute) )
            <div class="col-md-4">
                @php
                 $technicalavg=(($PlayerAttribute->ball_control + $PlayerAttribute->corners + $PlayerAttribute->crossing + $PlayerAttribute->dribbling + $PlayerAttribute->finishing + $PlayerAttribute->first_touch + $PlayerAttribute->free_kick_taking + $PlayerAttribute->heading + $PlayerAttribute->long_shots + $PlayerAttribute->long_throws + $PlayerAttribute->marking + $PlayerAttribute->passing + $PlayerAttribute->penalty_taking + $PlayerAttribute->tackling + $PlayerAttribute->technique) / 1500) * 100 ;
                 $technicalavg=number_format($technicalavg,2);
                @endphp
                <p class="mb-3">Technical average:
                    <b>{{$technicalavg ?? '0' }}%</b>
                </p>
            </div>
            <div class="col-md-4">
                <p class="mb-3">Tactical average:
                @php
                 $tact=(($PlayerAttribute->aggression + $PlayerAttribute->anticipation + $PlayerAttribute->bravery + $PlayerAttribute->composure + $PlayerAttribute->concentration + $PlayerAttribute->creativity + $PlayerAttribute->decisions + $PlayerAttribute->determination + $PlayerAttribute->flair + $PlayerAttribute->influence + $PlayerAttribute->off_the_ball + $PlayerAttribute->positioning + $PlayerAttribute->team_work + $PlayerAttribute->work_rate) / 1400) * 100 ;
                 $tact = number_format($tact, 2);
                @endphp
                    <b>{{ $tact ?? '0'}}%</b>
                </p>
            </div>
            <div class="col-md-4">
                @php
                    $physicalavg= (($PlayerAttribute->acceleration + $PlayerAttribute->agility + $PlayerAttribute->balance + $PlayerAttribute->jumping + $PlayerAttribute->natural_fitness + $PlayerAttribute->reflexes + $PlayerAttribute->speed + $PlayerAttribute->stamina + $PlayerAttribute->strength + $PlayerAttribute->goalkeeping) / 1000) * 100;
                    $physicalavg=number_format($physicalavg,2);
                @endphp
                <p class="mb-3">Physical average:
                    <b>{{ $physicalavg ?? '0'}}%</b>
                </p>
            </div>
    </div>
    @endif
    <div class="mb-3 d-flex justify-content-between">
        <a href="/dashboard/player/profile" class="btn cancel-btn">Cancel</a>
        <button type="submit" class="btn save-btn">Save</button>
    </div>
</form>
