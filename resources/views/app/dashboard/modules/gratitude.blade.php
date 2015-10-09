<div class="content">
    <div class="inner-padding">
        <h2 class="title">
            10 Things I am grateful for...
        </h2>

        <ul class="experience">
            @foreach($module->pivot->data[0] as $key => $experience)
                <li>
                    <span>I am grateful for... </span> {{ $experience }}
                </li>
            @endforeach
        </ul>

        <h2 class="title">After I sent my letter of gratitude I felt...</h2>
        <p class="dashboard">
            {{ $module->pivot->data[1]->letter }}
        </p>
    </div>
</div>

