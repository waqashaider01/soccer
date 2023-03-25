@push('styles')
@endpush
<div class="row">
    @if (session('video-links-success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('video-links-success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col-md-12">
        <form action="/player/media-videos/save" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="videoLink1">Video Link 1</label>
                    <textarea class="form-control" placeholder="Video Link 1" id="link1"
                        name="videoLink1">{{ $playerInfo->media_video1 }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    @if ($playerInfo->media_video1)
                        <x-embed url="{{ $playerInfo->media_video1 }}" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="videoLink2">Video Link 2</label>
                    <textarea class="form-control" placeholder="Video Link 2" id="link2"
                        name="videoLink2">{{ $playerInfo->media_video2 }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    @if ($playerInfo->media_video2)
                        <x-embed url="{{ $playerInfo->media_video2 }}" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="videoLink3">Video Link 3</label>
                    <textarea class="form-control" placeholder="Video Link 3" id="link3"
                        name="videoLink3">{{ $playerInfo->media_video3 }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    @if ($playerInfo->media_video3)
                        <x-embed url="{{ $playerInfo->media_video3 }}" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="videoLink4">Video Link 4</label>
                    <textarea class="form-control" placeholder="Video Link 4" id="link4"
                        name="videoLink4">{{ $playerInfo->media_video4 }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    @if ($playerInfo->media_video4)
                        <x-embed url="{{ $playerInfo->media_video4 }}" />
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="videoLink5">Video Link 5</label>
                    <textarea class="form-control" placeholder="Video Link 5" id="link5"
                        name="videoLink5">{{ $playerInfo->media_video5 }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    @if ($playerInfo->media_video5)
                        <x-embed url="{{ $playerInfo->media_video5 }}" />
                    @endif
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <button type="/dashboard/player/profile" class="btn cancel-btn">Cancel</button>
                <button type="submit" class="btn save-btn">Save</button>
            </div>
        </form>
    </div>
</div>
