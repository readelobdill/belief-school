<div class="content">
    <div class="inner-padding">
        <h1 class="title">
            Beautiful you
        </h1>

        <img src="{{route('modules.visualise.dreamboard')}}" alt="Beautiful You">

        <ul class="social">
            <li class="fb" data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$module->pivot->secret])])}}" class="fb">Share on Facebook</li>

            <li class="pin" data-share href="//www.pinterest.com/pin/create/button/?{{http_build_query(['url' => route('module.share', [$module->pivot->secret]), 'media' => route('dreamboard.show', [$module->pivot->secret]), 'description' => 'My Dreamboard'])}}">Share on Pinterest</li>

            <li class="dl" href="{{route('dreamboard.show', [$module->pivot->secret])}}">Download</li>
        </ul>
    </div>
</div>