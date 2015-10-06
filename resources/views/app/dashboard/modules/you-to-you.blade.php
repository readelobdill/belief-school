<div class="content">
    <div class="inner-padding">
        <div class="content-width">
            <h1 class="title">
                Here I am
            </h1>

            @if(isset($module->pivot->data[0]->letter))
                <p class="dashboard">{{$module->pivot->data[0]->letter}}</p>
            @elseif(isset($module->pivot->data[0]->video))
                <div class="your-video">
                    {!! $module->pivot->data[0]->video->embed->html !!}
                </div>
            @endif

        </div>
    </div>
</div>