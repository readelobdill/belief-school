<div class="inner vimeo">
    <iframe src="//player.vimeo.com/video/{{$module->intro_video}}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<a href="{{ route('home', ['skip' => 2])}}">
	<div class="next-section absol" data-next-section>
	    @include('app/partials/icons/down-arrow')
	</div>
</a>