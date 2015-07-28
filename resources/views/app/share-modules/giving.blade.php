@extends('app.public-layout')
@section('content')
<div class="content">
    <p>I did <em>{{ $module->pivot->data[0]->{'challenge-1'} }}</em>, it made me feel <em>{{ $module->pivot->data[1]->{'response-1'} }}</em></p>
    <p>I did <em>{{ $module->pivot->data[0]->{'challenge-2'} }}</em>, it made me feel <em>{{ $module->pivot->data[1]->{'response-2'} }}</em></p>
    <p>I did <em>{{ $module->pivot->data[0]->{'challenge-3'} }}</em>, it made me feel <em>{{ $module->pivot->data[1]->{'response-3'} }}</em></p>
</div>
@endsection