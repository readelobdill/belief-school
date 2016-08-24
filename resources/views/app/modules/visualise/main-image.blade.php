<div class="image {{$imageName}} {{ ((!empty($moduleUser) && isset($moduleUser->data->{$imageName})) ? 'has-image' : '') }}">
	<div class="image-container">
		<div class="camera-icon">@include('app/partials/icons/camera')</div>
		<img src="{{ ((!empty($moduleUser) && isset($moduleUser->data->{$imageName})) ? asset('uploads/dreamboard/'.Auth::user()->id.'/'.$moduleUser->data->{$imageName}) : '') }}" alt="my dreamboard">
		<input type="file" name="{{ $imageName }}" accept="image/jpeg,image/png">
	</div>
    <div class="loader"></div>
    <div class="beautiful-text">my beautiful life</div>
</div>