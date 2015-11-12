@extends('app.public-layout')


@section('title')
    Here I am
@endsection
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

<meta property="og:video:url" content="{{asset('uploads/you-to-you/'.Auth::user()->id . '/' . $module->pivot->data[0]->localVideo)}}" />
<meta property="og:video:width" content="1280" />
<meta property="og:video:height" content="720" />
<meta property="og:video:type" content="video/mp4" />

@endsection

@section('content')
<div class="content">
    <h1 class="title">
        Here I am
    </h1>
    <div class="your-video">
        <video autoplay controls src="{{asset('uploads/you-to-you/'.Auth::user()->id . '/' . $module->pivot->data[0]->localVideo)}}"></video>
    </div>
</div>
@endsection
