<div class="content">
    <div class="inner-padding">
        <div class="content-width">
            <h1 class="title">
                @if($style === 'pdf')
                    <img src="{{asset('img/here-i-am.png')}}" alt="Here I am">
                @else
                    Here I am
                @endif
            </h1>

            
            @if(isset($module->pivot->data[0]->video))
                @if($style !== 'pdf')
                <div class="your-video intrinsic-video">
                    {!! $module->pivot->data[0]->video->embed->html !!}
                    <img src="{{route('vimeo.thumbnail', [$module->pivot->user->id, $module->id])}}" alt="you to you" class="poster">
                </div>
                @else
                    <div class="your-video">
                        <a href="{{route('module.share', [$module->pivot->secret])}}">
                            <img style="margin: 0 auto" width="100%" src="{{asset('uploads/dreamboard/'.Auth::user()->id.'/'.$modules[4]->pivot->data->image_main)}}" alt="" >
                        </a>
                    </div>
                @endif

                <ul class="social">
                    <li><a class="fb"  data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$module->pivot->secret])])}}">Share on Facebook</a></li>
                </ul>
            @endif

            @if(isset($module->pivot->data[0]->letter))
                <p class="dashboard">{{$module->pivot->data[0]->letter}}</p>
            @endif

        </div>
    </div>
</div>
