<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">Well done, creating a plan brings focus and relief</h1>

                <p>Share what you learnt and the steps you plan to take in the <a href="{{route('modules.forum',[$module->slug])}}">Forum.</a></p>

                <p>How have you been going with your commitment of <span class="commitment__display">{{$requiredModules['welcome']->data[0]->challenge}}?</span> What have you noticed about your behaviour or patterns with this exercise?</p>

                <div class="actions">
                    <a href="#" class="button" data-complete-module>What's Next?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">

                <h1 class="plain">You are one step away from completing Belief School</h1>

                <p><b>This makes you extraordinary.</b></p>

                <p>Before you complete your journey, you can revisit <b>Module One</b> and send your email to as many people as you like. The more people who respond, the greater your understanding will be of the value you bring to the world.</p>

                <p><a href="mailto:?subject=A%20request%20from%20your%20friend&body={{rawurlencode(view('emails.boomerang',['user' => Auth::user()])->render() . "\n\n" . route('tagcloud', [$requiredModules['boomerang']->secret]))}}" class="button small" data-update-module>Click here to send again.</a></p>

                <p>Module Eight is fun and fabulous and once complete you will be able to download your beautiful Manifesto.</p>

                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <div class="actions">
                        <a href="{{route('modules.view', [$nextModule->slug])}}" class="button" title="I am ready for module eight">I am ready for module eight</a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>


