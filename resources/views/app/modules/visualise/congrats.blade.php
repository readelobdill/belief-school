<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">
                    This is your amazing life!
                </h1>
                <p>Print this out. Frame it. Put it somewhere where you will look at it every day.  Focus on the things that remind you how much value you bring to the world!</p>

                <ul class="social">
                    <li class="fb" data-share href="https://www.facebook.com/sharer/sharer.php?{{http_build_query(['u' => route('module.share', [$moduleUser->secret])])}}" class="fb">Share on Facebook</li>

                    <li class="pin" data-share href="//www.pinterest.com/pin/create/button/?{{http_build_query(['url' => route('module.share', [$moduleUser->secret]), 'media' => route('dreamboard.show', [$moduleUser->secret]), 'description' => 'My Dreamboard'])}}">Share on Pinterest</li>

                    <li class="dl" href="{{route('dreamboard.show', [$moduleUser->secret])}}">Download</li>
                </ul>

                <div class="actions">
                    <a href="#" class="button" data-complete-module>What's next?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">Congratulations you are awesome!</h1>
                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <p>Your <a href="{{route('modules.view', ['fear-courage'])}}">next module</a> is ready and waiting for you.</p>
                @endif
                <p>
                    In the meantime <a href="{{route('dashboard')}}#module-{{$module->slug}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum</a> to find support and chat to others about getting to know your amazing self.
                </p>
            </div>
        </div>
    </div>
</div>