<div class="content">
    <div class="inner-padding">
        <h2 class="dashboard__sub-heading">
            10 Things I am grateful for...
        </h2>

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

        <div class="dashboard__sub-heading">After I sent my letter of gratitude I felt...</div>
        <p class="dashboard">
            {{ $module->pivot->data[1]->letter }}
        </p>
    </div>
</div>

