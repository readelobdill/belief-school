<div class="inner">
    <div class="content">
        <h2>So Proud of You</h2>
        <p>On the other side of fear is courage. There is no downside to courage. When you act courageously, even if the outcome isn’t perfect you will feel powerful. You get to see who you really are and discover that you are much stronger than you thought.</p>
        <p>This is where you leave the comfort of your screen and you take action in the big wide world. This is the ONLY way change will happen.  We Promise you, do these three things, do them with courage, feel the fear and do them anyway, you will change your world.</p>
        <p>Many of you are going to stop right here – is that going to be you?</p>
        <p><strong>I didn’t think so! No one can do these press ups for you. Choose courage, choose you.</strong></p>
        <p>Take some pictures of your bravery if you can, we’d love to see them in the Forum!</p>

        <ul class="accordion">
            <li>
                <h2>
                    The sneakiness of comfort
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    <p>Our comfort zone can show up in many ways. It’s sneaky, and its job is to keep us exactly where we are – safe and comfy.</p>
                    <p>It can show up as:</p>
                    <ul>
                        <li>I don’t have time to do three things, I’ll just do one</li>
                        <li>I’ll just make something up and come back to this later</li>
                        <li>There’s nothing I’m really frightened off, this doesn’t apply to me</li>
                        <li>It’s too hard, I quite, but I won’t really say I’m quitting, I’ll just let it go</li>
                        <li>I don’t have time this week, I’ll get to it next week</li>
                    </ul>
                    And many more just like this. If you want to build your belief in yourself, do not listen to this voice. Recognise it for what it is and complete this exercise, full out, for you, nothing less.

                </div>
            </li>
        </ul>

        <p>In the spaces below write out how you felt as you faced your fear and did it anyway!</p>
        <p>It is these feelings that will be saved to your Dashboard and will be your resource to call on in the future.</p>
        <p>Stuck? Jump into the <a href="{{route('modules.forum', [$module->slug])}}">forum</a> for encouragement.</p>
        <form action="" class="positive-affirmations">
            <div class="positive-affirmations-fields">
                <div class="belief">
                    <label class="the-belief" for="response-1">
                        <span class="number">1 .</span>
                        <strong>I said</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-1'} : '' }}"</p>
                        <strong>Once I did this I felt&hellip;</strong>
                    </label>
                    <div class="the-affirmation">
                        <textarea name="response-1" id="response-1" required></textarea>
                        <label class="number" for="response-1">1 .</label>

                    </div>
                </div>
                <div class="belief">
                    <label class="the-belief" for="response-2">
                        <span class="number">2 .</span>
                        <strong>I said</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-2'} : '' }}"</p>
                        <strong>Once I did this I felt&hellip;</strong>
                    </label>
                    <div class="the-affirmation">
                        <textarea name="response-2" id="response-2" required></textarea>
                        <label class="number" for="response-2">2 .</label>

                    </div>
                </div>
                <div class="belief">
                    <label class="the-belief" for="response-3">
                        <span class="number">3 .</span>
                        <strong>I said</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-3'} : '' }}"</p>
                        <strong>Once I did this I felt&hellip;</strong>
                    </label>
                    <div class="the-affirmation">
                        <textarea name="response-3" id="response-3" required></textarea>
                        <label class="number" for="response-3">3 .</label>

                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="button">Save to Dashboard</button>
            </div>

        </form>
    </div>
</div>