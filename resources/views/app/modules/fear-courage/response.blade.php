<div class="inner">
    <div class="content">
        <h1 class="title">Well done!</h1>

        <blockquote>
            On the other side of fear is courage. Courage is one of those characteristics that are right up there with Humility, Joy and kindness. There is no downside to courage.
        </blockquote>

        <h1 class="plain">
            Get It Out&hellip;
        </h1>

        <p>
            Once you've faced your fears you're going to be feeling A LOT.
        </p>

        <p class="center">
            Write out how feel after you faced each of the three fears below&hellip;
        </p>

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