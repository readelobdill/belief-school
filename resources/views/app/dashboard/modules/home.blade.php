<div class="header">
    <div class="inner">
        <h2>My Belief School Beginnings</h2>
        <ul class="actions">
            <li class="forum">
                <a class="forum-icon" href="#">
                    <span>Forum</span>
                </a>
            </li>
            <li class="arrow"></li>
        </ul>
    </div>
</div>

<div class="content">
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

    @if($welcome)
        <p>Throughout my Belief School journey I chose to <em>{{$welcome->pivot->data[0]->challenge}}</em></p>
    @endif
</div>