@extends('app.public-layout')
@section('metadata')
    <meta property="og:title" content="My Belief School" />
    <meta property="og:site_name" content="My Belief School" />
    <meta property="og:url" content="{{URL::current()}}" />
    <meta property="og:type" content="image" />
    <meta property="og:description" content="Belief School Transforms Lives. Insightful interactive online modules give you the evidence you need to create the life you want." />
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