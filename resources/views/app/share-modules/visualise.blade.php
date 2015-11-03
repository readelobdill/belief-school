@extends('app.public-layout')
@section('title')
    My Beautiful Life
@endsection
@section('metadata')
    <meta property="og:title" content="My Beautiful Life." />
    <meta property="og:site_name" content="Belief School" />
    <meta property="og:url" content="{{URL::current()}}" />
    <meta property="og:type" content="article" />
    <meta property="og:description" content="This is a collection of images that fill me with joy, inspire me and show me how much I am loved. I created this at Belief School." />
    <meta property="og:image" content="{{route('dreamboard.show', [$module->pivot->secret])}}" />

@endsection
@section('content')
<div class="content">
    <h1 class="title">
        Beautiful<br>
        you
    </h1>
    <img src="{{route('dreamboard.show', [$module->pivot->secret])}}" />
</div>
@endsection
