@extends('app.public-layout')
@section('metadata')
<?php
$id = explode('/', $module->pivot->data[0]->video->uri)[2];
?>

<meta property="og:title" content="Here I am" />
<meta property="og:site_name" content="Belief School" />
<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:type" content="article" />
<meta property="og:description" content="" />

<meta property="og:image" content="https://i.vimeocdn.com/video/default_1280x720" />
<meta property="og:image:height" content="720" />
<meta property="og:image:width" content="1280" />

<meta property="og:video:url" content="https://player.vimeo.com/video/{{ $id }}?autoplay=1" />
<meta property="og:video:secure_url" content="https://player.vimeo.com/video/{{ $id }}?autoplay=1" />
<meta property="og:video:width" content="{{$module->pivot->data[0]->video->width}}" />
<meta property="og:video:height" content="{{$module->pivot->data[0]->video->height}}" />
<meta property="og:video:type" content="text/html" />

<meta property="og:video:url" content="https://vimeo.com/moogaloop.swf?clip_id={{ $id }}&amp;autoplay=1" />
<meta property="og:video:secure_url" content="https://vimeo.com/moogaloop.swf?clip_id={{ $id }}&amp;autoplay=1" />
<meta property="og:video:width" content="{{$module->pivot->data[0]->video->width}}" />
<meta property="og:video:height" content="{{$module->pivot->data[0]->video->height}}" />
<meta property="og:video:type" content="application/x-shockwave-flash" />
@endsection

@section('content')
<div class="content">
    <h1 class="title">
        Here I am
    </h1>
    <div class="your-video">
        {!! $module->pivot->data[0]->video->embed->html !!}
    </div>
</div>
@endsection
