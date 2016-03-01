@extends('app.public-layout')


@section('title')
    Here I am
@endsection
@section('metadata')


<meta property="og:title" content="Here I am" />
<meta property="og:site_name" content="Belief School" />
<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:type" content="article" />
<meta property="og:description" content="" />

<meta property="og:image" content="{{route('vimeo.thumbnail', [$module->pivot->user->id, $module->id])}}" />
<meta property="og:image:height" content="720" />
<meta property="og:image:width" content="1280" />

<meta property="og:video:url" content="https://vimeo.com/moogaloop.swf?clip_id={{explode(':',str_replace('/videos/', '', $module->pivot->data[0]->video->uri))[0]}}&autoplay=1" />
<meta property="og:video:secure_url" content="https://vimeo.com/moogaloop.swf?clip_id={{explode(':',str_replace('/videos/', '', $module->pivot->data[0]->video->uri))[0]}}&autoplay=1" />
<meta property="og:video:width" content="1280" />
<meta property="og:video:height" content="720" />
<meta property="og:video:type" content="application/x-shockwave-flash" />

@endsection

@section('content')
<div class="content">
    <h1 class="title">
        Here I am
    </h1>
    <div class="your-video intrinsic-video">
        {!! $module->pivot->data[0]->video->embed->html !!}
    </div>
</div>
@endsection
