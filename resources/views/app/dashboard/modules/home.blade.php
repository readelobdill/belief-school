<li id="module-{{$home->slug}}">
    <div class="header {{!($home && $home->pivot->complete && isset($welcome->pivot->data[0])) ? 'is-locked' : ''}}">
        <div class="inner">
            @if($home && $home->pivot->complete && isset($welcome->pivot->data[0]))
                <h2>My Belief School Beginnings</h2>
            @else
                <h2><a href="{{route('modules.view', [$home->slug] )}}" title="My Belief School Beginnings">My Belief School Beginnings</a></h2>
            @endif

        </div>
    </div>
    @if($home && $home->pivot->complete && isset($welcome->pivot->data[0]))
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
