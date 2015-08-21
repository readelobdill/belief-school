<div class="content">
    <div class="inner-padding">
        <div class="content-width">

        <h1 class="title">
            Here I am
        </h1>

        @if(isset($module->pivot->data[0]->letter))
            <em>{{$module->pivot->data[0]->letter}}</em>
        @elseif(isset($module->pivot->data[0]->video))
            <em>I can has video</em>
        @endif
        </div>
    </div>
</div>