<div class="content">
    <div class="inner-padding">
        <h1 class="title">
            Beautiful<br>
            you
        </h1>

        <img src="{{route('modules.visualise.dreamboard')}}" alt="Beautiful You">

        <div class="social">
            <a data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$module->pivot->secret])])}}" class="facebook">@include('app/partials/icons/facebook')Share on Facebook</a>
            <a data-share href="//www.pinterest.com/pin/create/button/?{{http_build_query(['url' => route('module.share', [$module->pivot->secret]), 'media' => route('dreamboard.show', [$module->pivot->secret]), 'description' => 'My Dreamboard'])}}" class="pinterest">@include('app/partials/icons/pinterest')Share on Pinterest</a>
            <a href="{{route('dreamboard.show', [$module->pivot->secret])}}" class="download">@include('app/partials/icons/download')Download</a>
        </div>
    </div>
</div>