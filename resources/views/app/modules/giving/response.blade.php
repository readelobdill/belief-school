<div class="inner">
    <div class="content">
        <h1 class="title">Notice how you feel, when you give.</h1>

        <p>Great job, you now get to make the world a better place.</p>

        <p>While you are doing your good deeds, we want you to focus on the feelings you have when you give. It is your feelings that speak to your subconscious and build new beliefs.</p>

        <p>Take some photos if you can, we’d love to see them in the <a href="{{route('modules.forum', [$module->slug])}}">Forum</a></p>

        <p>In the spaces below, write out how you felt. This will be saved to your Dashboard and become part of your Manifesto at the end of the program.</p>

        <form action="" class="positive-affirmations">
            <div class="positive-affirmations-fields">
                <div class="belief">
                    <label class="the-belief" for="response-1">
                        <span class="number">1 .</span>
                        <strong>After</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-1'} : '' }}"</p>
                    </label>

                    <div class="the-affirmation">
                        <div class="i-felt"><strong>I felt&hellip;</strong></div>
                        <textarea name="response-1" id="response-1" required maxlength="140">{{ isset($moduleUser) && isset($moduleUser->data[1]) ? $moduleUser->data[1]->{'response-1'} : '' }}</textarea>
                        <label class="number" for="response-1">1 .</label>
                    </div>
                </div>
                <div class="belief">
                    <label class="the-belief" for="response-2">
                        <span class="number">2 .</span>
                        <strong>After</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-2'} : '' }}"</p>
                    </label>

                    <div class="the-affirmation">
                        <div class="i-felt"><strong>I felt&hellip;</strong></div>
                        <textarea name="response-2" id="response-2" required maxlength="140">{{ isset($moduleUser) && isset($moduleUser->data[1]) ? $moduleUser->data[1]->{'response-2'} : '' }}</textarea>
                        <label class="number" for="response-2">2 .</label>
                    </div>
                </div>
                <div class="belief">
                    <label class="the-belief" for="response-3">
                        <span class="number">3 .</span>
                        <strong>After</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-3'} : '' }}"</p>
                    </label>

                    <div class="the-affirmation">
                        <div class="i-felt"><strong>I felt&hellip;</strong></div>
                        <textarea name="response-3" id="response-3" required maxlength="140">{{ isset($moduleUser) && isset($moduleUser->data[1]) ? $moduleUser->data[1]->{'response-3'} : '' }}</textarea>
                        <label class="number" for="response-3">3 .</label>
                    </div>
                </div>
            </div>
            <div class="are-you-sure">
                <p>Do a quick double check of the content you have created for this module; once you click this button it will permanently save to your Dashboard.</p>
            </div>
            <div class="actions">
                <button class="button">Save to Dashboard</button>
            </div>

        </form>
    </div>
</div>
