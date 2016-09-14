<div class="inner">
    <div class="content">
        <h1 class="title">
            How will you feel when you have this?
        </h1>
        <p>You are doing great!</p>
        <p>Now, close your eyes and imagine in the perfect world, how you will <b>FEEL</b> when you have achieved this.
Allow yourself to experience in vivid detail, the emotions you will feel when you have created this outcome.
We call this going to the feeling place, it is the intensity of your emotions that enhance the wiring in your brain.
Write those feelings down here.</p>
        <div class="controls">
            <form action="" data-validate>
                <div class="form-row">
                    <textarea name="how" id="how" cols="30" rows="10" required maxlength="140">{{ isset($moduleUser) && isset($moduleUser->data->{'1'}) ? $moduleUser->data->{'1'}->{'how'} : '' }}</textarea>
                </div>
            </form>
        </div>
    <div class="next-question absol down-arrow">
        @include('app/partials/icons/down-arrow')
    </div>
    </div>
</div>