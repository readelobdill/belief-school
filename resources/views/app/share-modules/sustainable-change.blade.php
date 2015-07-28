@extends('app.public-layout')
@section('content')
<p>Throughout my Belief School journey I choose to <em>{{ $modules[1]->pivot->data[0]->challenge }}</em></p>
<p>It made me feel: <em>{{$module->pivot->data[0]->i_felt}}</em></p>
<p>I incorporated into my life: <em>{{ $module->pivot->data[1]->i_chose }}</em></p>
@endsection