<div class="inner">
        <div class="pre-complete congrats-container">
            <div class="inner">
                <div class="content">
                    <h1 class="plain">
                        You Rock Star!<br>
                        Asking for feedback takes courage.<br>
                        When we act courageously we create possibilities.
                    </h1>

                    <p>Having trouble opening the email template?</p>

                    <p>Copy and paste the recommended copy below and this link into your own email and send.</p>
                    <p class="annotation"><strong>{{route('tagcloud', [$moduleUser->secret])}}</strong></p>

                    <div class="message">
                        <p>Dear Friend,</p>

                        <p>{{Auth::user()->first_name}} is completing an online program called Belief School. It is a personal development program helping them build belief in themselves. No, this is not spam, please text if you need to check.</p>

                        <p>{{Auth::user()->first_name}} has stepped out of their comfort zone and sent you this email because they value your opinion and trust that you will answer the simple question honestly and with their best interest at heart.</p>

                        <p>Clicking on the link will take you to a page on our Belief School website, you’ll be asked to input three words that describe {{Auth::user()->first_name}}’s best qualities. The answers will be delivered to {{Auth::user()->first_name}} anonymously, mixed up with responses from friends, family and colleagues.</p>

                        <p><b>This will only take 1 minute yet will have a BIG impact.</b> Thanks for taking the time, it really does make a difference.</p>

                        <p>Best regards <br>Belief School <br></p>
                    </div>

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
                        <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
                    @endif
                    <p>Keep an eye on your <a href="{{route('dashboard')}}#module-{{$module->slug}}">Dashboard</a> to see the responses.</p>
                    <p>Chat in the <a href="{{route('modules.forum',[$module->slug])}}">Forum</a> about your experience; encourage someone else to take this first step.</p>
                </div>
            </div>
        </div>
</div>