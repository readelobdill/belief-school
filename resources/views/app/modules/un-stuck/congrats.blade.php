<div class="inner">
    <div class="pre-complete congrats-container">

        <div class="inner">
        <h1 class="plain">Well done!</h1>
            <p>Would you like to share what you learnt in the Forum?</p>

            <p>How are you going with your commitment of No Sugar? If you have slipped up, start again today. Change is never a straight line.</p>

            <p>Click through to your <a href="{{route('dashboard')}}">Dashboard</a> to see the responses that have come through from Module One and read you Affirmations.</p>

            <div class="actions">
                <a href="#" class="button" data-complete-module>What's next?</a>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <h1 class="plain">Great job!</h1>
            <p>Your next module will unlock in 48 Hours.</p>
            <p>
                In the meantime <a href="{{route('dashboard')}}#module-{{$module->slug}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum to find support and chat to others about getting to know your amazing self.</a>
            </p>
        </div>
    </div>
</div>