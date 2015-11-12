<div class="inner">
        <div class="pre-complete congrats-container">
            <div class="inner">
                <div class="content">
                    <h1 class="plain">
                        You Rock Star!<br>
                        Asking for feedback takes courage.<br>
                        When we act courageously we create possibilities.
                    </h1>

                    <ul class="accordion single">
                        <li>
                            <h2>
                                Having trouble opening the email template?
                                <div class="toggle">
                                    @include('app/partials/icons/collapse')
                                    @include('app/partials/icons/expand')
                                </div>
                            </h2>
                            <div class="answer left">
                                <p>Copy and paste the recommended copy below and this link into your own email and send.</p>

                                <p class="copy-link"><strong>{{route('tagcloud', [$moduleUser->secret])}}</strong></p>

                                <div class="email-client">
                                    <div class="header">
                                        <div class="close"></div>
                                        <div class="minimize"></div>
                                        <div class="maxamize"></div>
                                    </div>
                                    <div class="details">
                                        <div class="details-row">To</div>
                                        <div class="cc-row">Cc</div>
                                        <div class="subject-row">Subject</div>
                                    </div>
                                    <div class="message">
                                        <p>Dear Friend,</p>

                                        <p>{{Auth::user()->first_name}} is completing an online program called Belief School. It is a personal development program helping him/her build belief in themselves. No, this is not spam, please text if you need to check.</p>

                                        <p>Your friend has stepped out of his/her comfort zone and sent you this email because they value your opinion and trust that you will answer the simple question honestly and with their best interest at heart.</p>

                                        <p>Clicking on the link will take you to a page on our Belief School website, you’ll be asked to input three words that describe {{Auth::user()->first_name}}'s best qualities. The answers will be delivered to {{Auth::user()->first_name}} anonymously, mixed up with responses from friends, family and colleagues.</p>

                                        <p>This will only take 1 minute yet will have a BIG impact. Thanks for taking the time, it really does make a difference.</p>

                                        <p>Best regards <br /> Belief School</p>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <p>As your responses come in they will appear on your <a href="{{route('dashboard')}}" title="Dashboard">Dashboard</a>, building a wonderful picture of the greatness others see in you.</p>
                    <div class="actions">
                        <a href="#" class="button" title="What's next?" data-complete-module>What's next?</a>
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
                        <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}" title="Next Module">next module</a> is ready and waiting for you.</p>
                    @endif
                    <p>Keep an eye on your <a href="{{route('dashboard')}}#module-{{$module->slug}}" title="Dashboard">Dashboard</a> to see the responses.</p>
                    <p>Chat in the <a href="{{route('modules.forum',[$module->slug])}}" title="Forum">Forum</a> about your experience; encourage someone else to take this first step.</p>
                </div>
            </div>
        </div>
</div>