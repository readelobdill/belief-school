<div class="content">
    <div class="inner-padding">
        <div class="content-width">
            <h1 class="title">
                @if($style === 'pdf')
                    <img src="{{asset('img/here-i-am.png')}}" alt="">
                @else
                    Here I am
                @endif
            </h1>

            @if(isset($module->pivot->data[0]->letter))
                <p class="dashboard">{{$module->pivot->data[0]->letter}}</p>
            @elseif(isset($module->pivot->data[0]->localVideo))
                <div class="your-video">
                    <video controls preload="metadata" src="{{asset('uploads/you-to-you/'.Auth::user()->id . '/' . $module->pivot->data[0]->localVideo)}}"></video>
                    <img src="{{asset('uploads/you-to-you/'.Auth::user()->id.'/'.$module->pivot->data[0]->image)}}" alt="" class="poster">
                </div>

                <ul class="social">
                    <li><a class="fb"  data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$module->pivot->secret])])}}">Share on Facebook</a></li>
                </ul>
            @endif

        </div>
    </div>
</div>
