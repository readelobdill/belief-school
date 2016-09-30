@extends('app.public-layout')
@section('title')
    My Beautiful Life
@endsection
@section('metadata')
    <meta property="og:title" content="My Beautiful Life." />
    <meta property="og:site_name" content="Belief School" />
    <meta property="og:url" content="{{URL::current()}}" />
    <meta property="og:description" content="This is a collection of images that fill me with joy, inspire me and show me how much I am loved. I created this at Belief School." />
    <meta property="og:image" content="{{route('dreamboard.facebook', [$module->pivot->secret])}}" />
    <meta property="og:image:width" content="1620" />
    <meta property="og:image:height" content="848" />

@endsection
@section('content')
<div class="content">
    <img src="{{route('dreamboard.show', [$module->pivot->secret])}}" alt="Beautiful You" />
</div>
@endsection
