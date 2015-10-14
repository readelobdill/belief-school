<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">Action obliterates fear, it is the only thing that does.</h1>

                <p>When that familiar feeling of fear starts to creep in, trying to control you and keep you small, remember this exercise, what you did and how you felt when you chose courage.</p>

                <div class="actions">
                    <a href="#" class="button" data-complete-module>What's next?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">You just made it through the trickiest exercise in Belief School. <br />We are seriously impressed!</h1>
                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
                @endif

                <p>Reach out in the <a href="{{route('modules.forum',[$module->slug])}}">Forum</a> to someone who might be stuck, give them some of the courage you used to get here.</p>

                <p>Take a moment, scroll through your <a href="{{route('dashboard')}}#module-{{$module->slug}}">Dashboard</a> and soak up all you have done and how special you are.</p>

                <p>How are you going with your commitment to <span class="commitment__display">{{$requiredModules['welcome']->data[0]->challenge}}?</span> You are in the process of building your self-discipline, if you’re on track, keep at it, if you have stumbled, start again today. ☺</p>
            </div>
        </div>
    </div>
</div>