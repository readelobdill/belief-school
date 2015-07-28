<div class="image {{$imageName}} {{ ((!empty($moduleUser) && isset($moduleUser->data->{$imageName})) ? 'has-image' : '') }}">
    <div class="camera-icon">@include('app/partials/icons/camera')</div>
    <img src="{{ ((!empty($moduleUser) && isset($moduleUser->data->{$imageName})) ? asset('uploads/dreamboard/'.Auth::user()->id.'/'.$moduleUser->data->{$imageName}) : '') }}" alt="">
    <input type="file" name="{{ $imageName }}">
    <div class="loader"></div>
</div>