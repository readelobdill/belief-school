<div class="inner">
    <div class="content">
        <h1 class="title">
            Understanding the importance of your thoughts
        </h1>

        <p>Earlier on, you said the reason you didn’t have the one thing you wanted in your life was because <em>“{{ $requiredModules['home']->data->{'1'}->why_not }}”</em></p>
        <p>Whatever the answer, we are pretty sure it’s an obstacle that can be overcome. The first step to creating change is becoming aware of what we say to ourselves about ourselves. We need to change our limiting beliefs.</p>

        <ul class="accordion single">
            <li>
                <h2>
                    Not quite sure what a limiting belief is?
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    <p>These are beliefs that we hold about ourselves to describe who we are. They will have either been given to us by someone else, or we have created them based on what we have experience in our life so far. A belief can be positive like, “I am a great dancer”, or limiting like:</p>
                    <ul class="u-quote-list">
                        <li>“I am too old”</li>
                        <li>“Men don’t do that”</li>
                        <li>“I can’t, I’m shy”</li>
                    </ul>

                    <p><strong>Just because you think it, doesn’t mean it is true.</strong></p>

                </div>
            </li>
        </ul>

        <p>Take a moment and think about some of the statements you use to describe yourself that may be holding you back.  Write in your journal to explore this, or go to the Forum for more clarity. </p>
        <p class="center"><b>Choose three and write them here:</b></p>

        <form action="" class="limiting-beliefs">
            <div class="beliefs">
                <div class="belief">
                    <textarea name="challenge-1" id="belief-1" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="belief-1">1 .</label>
                </div>
                <div class="belief">
                    <textarea name="challenge-2" id="belief-2" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="belief-2">2 .</label>
                </div>
                <div class="belief">
                    <textarea name="challenge-3" id="belief-3" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="belief-3">3 .</label>
                </div>
            </div>
            <div class="actions">
                <button type="submit" class="down-arrow">
                    @include('app/partials/icons/down-arrow')
                </button>
            </div>
        </form>


    </div>
</div>