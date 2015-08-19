<div class="content">
    <div class="inner-padding">
        <h1 class="plain">Gratitude Diary - Over the last 2 months...</h1>

        <ul class="experience">
            @foreach($module->pivot->data[0] as $key => $experience)
                <li>
                     @if ($key === 'diary_1' )
                        <li> <span>I am grateful for...</span>{{ $experience }}
                     @else

                        <span>I am...</span> {{ $experience }}
                     @endif
                </li>
            @endforeach
        </ul>


        <h1 class="plain">When I sent my letter of gratitude I felt...</h1>
        <p>
            <em>{{ $module->pivot->data[1]->letter }}</em>
        </p>
    </div>
</div>

