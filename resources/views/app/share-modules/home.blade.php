@extends('app.public-layout')
@section('content')
<div class="content">
    <p>
        I am <em>{{$home->pivot->data[0]->gender}}</em> and I am <em>{{$home->pivot->data[0]->age}} years old.</em>
    </p>
    <p>
        I want <em>{{$home->pivot->data[0]->want}}</em>.
    </p>
    <p>
        Because <em>{{$home->pivot->data[0]->why}}</em>.
    </p>
    <p>
        When I have it I will feel <em>{{$home->pivot->data[0]->how}}</em>.
    </p>
    <p>
        I don't have this because <em>{{$home->pivot->data[0]->why_not}}</em>.
    </p>

    @if($welcome)
        <p>Throughout my Belief School journey I chose to <em>{{$welcome->pivot->data[0]->challenge}}</em></p>
    @endif
</div>
@endsection