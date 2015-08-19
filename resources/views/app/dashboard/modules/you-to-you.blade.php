<div class="content">
    <div class="inner-padding">
        @if(isset($module->pivot->data[0]->letter))
            <em>{{$module->pivot->data[0]->letter}}</em>
        @elseif(isset($module->pivot->data[0]->video))
            <em>I can has video</em>
        @endif

    </div>
</div>