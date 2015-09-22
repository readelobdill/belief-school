<div class="inner">
        <div class="pre-complete congrats-container">
            <div class="inner">
                <div class="content">
                    <h1 class="plain">
                        You Rock Star!<br>
                        Asking for feedback takes courage.<br>
                        When we act courageously we create possibilities.
                    </h1>

                    <p class="annotation">Having trouble opening the email template?<br />
                        Copy and paste the recommended copy and this link into your own email and send.<br />
                        <strong>{{route('tagcloud', [$moduleUser->secret])}}</strong>
                    </p>

                    <p>As your responses come in they will appear on your <a href="{{route('dashboard')}}">Dashboard</a>, building a wonderful picture of the greatness others see in you.</p>
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
                        <p>Your <a href="{{route('modules.view', ['un-stuck'])}}">next module</a> is ready and waiting for you.</p>
                    @endif
                    <p>
                        Keep an eye on your <a href="{{route('dashboard')}}#module-{{$module->slug}}">Dashboard</a> to see the responses.
                    </p>
                    <p>
                        Chat in the <a href="{{route('modules.forum',[$module->slug])}}">Forum</a> about how that felt, maybe encourage someone else to take this first step.
                    </p>
                </div>
            </div>
        </div>
</div>