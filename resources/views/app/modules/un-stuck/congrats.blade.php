<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
            <h1 class="plain">Well done!</h1>
                <p>Would you like to share what you learnt in the <a href="{{route('modules.forum',[$module->slug])}}">Forum?</a></p>

                <p>How are you going with your commitment of <br />
                <span class="commitment__display"> {{$requiredModules['welcome']->data[0]->challenge}}?</span> <br /></p>

                <p>If you have slipped up, start again today. <br />Change is never a straight line.</p>

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
                    <p>Your <a href="{{route('modules.view', ['visualise'])}}">next module</a> is ready and waiting for you.</p>
                @endif

                <p>Click through to your <a href="{{route('dashboard')}}#module-{{$module->slug}}">Dashboard</a> to read your affirmations and keep an eye out for the qualities submitted by your friends.</p>

                <p>Check in the <a href="{{route('modules.forum',[$module->slug])}}">Forum</a> to find support and chat to others about getting to know your amazing self.</p>

            </div>
        </div>
    </div>
</div>