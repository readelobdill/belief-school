<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
            <h1 class="plain">Well done!</h1>
                <p>Would you like to share what you learnt in the <a href="{{route('modules.forum',[$module->slug])}}">Forum?</a></p>

                <p>How are you going with your commitment of <span class="commitment__display"> {{$requiredModules['welcome']->data[0]->challenge}}</span>? If you have slipped up, start again today. Change is never a straight line.</p>

                <p>Click through to your <a href="{{route('dashboard')}}">Dashboard</a> to see the responses that have come through from Module One and read you Affirmations.</p>

                <div class="actions">
                    <a href="#" class="button" data-complete-module>What's next?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">Great job!</h1>
                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
                @endif
                <p>
                    In the meantime <a href="{{route('dashboard')}}#module-{{$module->slug}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum</a> to find support and chat to others about getting to know your amazing self.
                </p>
            </div>
        </div>
    </div>
</div>