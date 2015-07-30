@extends('app.public-layout')
@section('content')
<div class="content">
    <p>
        I am <em>{{$module->pivot->data->{'1'}->gender}}</em> and I am <em>{{$module->pivot->data->{'1'}->age}} years old.</em>
    </p>
    <p>
        I want <em>{{$module->pivot->data->{'1'}->want}}</em>.
    </p>
    <p>
        Because <em>{{$module->pivot->data->{'1'}->why}}</em>.
    </p>
    <p>
        When I have it I will feel <em>{{$module->pivot->data->{'1'}->how}}</em>.
    </p>
    <p>
        I don't have this because <em>{{$module->pivot->data->{'1'}->why_not}}</em>.
    </p>

    @if(isset($welcome))
        <p>Throughout my Belief School journey I chose to <em>{{$welcome->pivot->data->{'1'}->challenge}}</em></p>
    @endif
</div>
@endsection