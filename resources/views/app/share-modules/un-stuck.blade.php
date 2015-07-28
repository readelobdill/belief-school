@extends('app.public-layout')
@section('content')
<div class="content">
    <p>I've turned <em>{{ $module->pivot->data[0]->{'challenge-1'} }}</em> into <em>{{ $module->pivot->data[1]->{'response-1'} }}</em></p>
    <p>I've turned <em>{{ $module->pivot->data[0]->{'challenge-2'} }}</em> into <em>{{ $module->pivot->data[1]->{'response-2'} }}</em></p>
    <p>I've turned <em>{{ $module->pivot->data[0]->{'challenge-3'} }}</em> into <em>{{ $module->pivot->data[1]->{'response-3'} }}</em></p>
</div>
@endsection