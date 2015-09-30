<li id="module-{{$home->slug}}">
    <div class="header">
        <div class="inner">
            <h2>My Belief School Beginnings</h2>

        </div>
    </div>

    <div class="content">
        <div class="inner-padding">
            <p><b>I am {{$home->pivot->data->{'1'}->gender}} and I am {{$home->pivot->data->{'1'}->age}} years old.</b></p>

            <p><b>I want {{$home->pivot->data->{'1'}->want}}.</b></p>

            <p><b>Because {{$home->pivot->data->{'1'}->why}}.</b></p>

            <p><b>When I have it I will feel {{$home->pivot->data->{'1'}->how}}.</b></p>

            <p><b>I don't have this because {{$home->pivot->data->{'1'}->why_not}}.</b></p>

            @if($welcome && isset($welcome->pivot->data[0]))
                <p><b>Throughout my Belief School journey I chose to {{$welcome->pivot->data[0]->challenge}}</b></p>
            @endif
        </div>
    </div>