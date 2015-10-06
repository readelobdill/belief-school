<li id="module-{{$home->slug}}">
    <div class="header">
        <div class="inner">
            <h2>My Belief School Beginnings</h2>

        </div>
    </div>
    @if($home && isset($home->pivot->data{'1'}))
    <div class="content">
        <div class="inner-padding">

            <ul class="and-i-am">
                <li><span>I am</span> {{$home->pivot->data->{'1'}->gender}} <span> and I am</span> {{$home->pivot->data->{'1'}->age}} <span>years old.</span></li>

                <li><span>I want</span> {{$home->pivot->data->{'1'}->want}}.</li>

                <li><span>Because</span> {{$home->pivot->data->{'1'}->why}}.</li>

                <li><span>When I have it I will feel</span> {{$home->pivot->data->{'1'}->how}}.</li>

                <li><span>I don't have this because</span> {{$home->pivot->data->{'1'}->why_not}}.</li>

                @if($welcome && isset($welcome->pivot->data[0]))
                    <li><span>Throughout my Belief School journey I chose to</span> {{$welcome->pivot->data[0]->challenge}}</li>
                @endif

            </ul>
        </div>
    </div>
        @endif
</li>
