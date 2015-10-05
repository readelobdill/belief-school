<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">You are one step away from completing Belief School.</h1>

                <p><b>This makes you extraordinary.</b></p>

                <p>Before you complete your journey you can revisit module one and send your email to as many people as you like. The more people who respond, the greater your understanding of how you are seen in the world.</p>

                <p><a href="mailto:?subject=Show%20your%20friend%20how%20special%20they%20are&body={{rawurlencode(view('emails.boomerang',['user' => Auth::user()])->render() . "\n\n" . route('tagcloud', [$requiredModules['boomerang']->secret]))}}" class="button small" data-update-module>Click here to send again.</a></p>


                <p>Module Eight is fun and fabulous and once complete you will be able to download your beautiful Manifesto.</p>


                <div class="actions">
                    <a href="#" class="button" data-complete-module>I am ready for module eight</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">

                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <p>Your <a href="{{route('modules.view', ['you-to-you'])}}">next module</a> is ready and waiting for you.</p>
                @endif

                <p><a href="{{route('modules.forum',[$module->slug])}}">Head over to the Forum</a> and share your insights and vision for your future. When you declare your intention out loud it gives it weight and pulls you forward.</p>
            </div>
        </div>
    </div>
</div>