<div class="header">
    <div class="inner">
        <h2>My Belief School Beginnings</h2>

    </div>
</div>

<div class="content">
    <div class="inner-padding">
        <p>
            I am <em>{{$home->pivot->data->{'1'}->gender}}</em> and I am <em>{{$home->pivot->data->{'1'}->age}} years old.</em>
        </p>
        <p>
            I want <em>{{$home->pivot->data->{'1'}->want}}</em>.
        </p>
        <p>
            Because <em>{{$home->pivot->data->{'1'}->why}}</em>.
        </p>
        <p>
            When I have it I will feel <em>{{$home->pivot->data->{'1'}->how}}</em>.
        </p>
        <p>
            I don't have this because <em>{{$home->pivot->data->{'1'}->why_not}}</em>.
        </p>

        @if($welcome && isset($welcome->pivot->data[0]))
            <p>Throughout my Belief School journey I chose to <em>{{$welcome->pivot->data[0]->challenge}}</em></p>
        @endif
    </div>
</div>