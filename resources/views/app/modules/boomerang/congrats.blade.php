<div class="inner">
        <div class="pre-complete congrats-container">
            <div class="inner">
                <h1 class="plain">
                    Great job! Asking for feedback takes courage; you are going to learn a lot about courage over the course of your Belief School journey,
                </h1>

                <p class="annotation">
                    Having trouble opening email?<br>
                    Copy/paste link below into own email instead<br>
                    <a href="{{route('tagcloud', [$moduleUser->secret])}}">{{route('tagcloud', [$moduleUser->secret])}}</a>
                </p>

                <p>All of the answers will be collated and appear in your Dashboard once your recipients begin to send their answers, to you so you can start to build a picture of the awesomness you bring to the world.</p>
                <div class="dots"></div>
                <div class="actions">
                    <a href="#" class="button" data-complete-module>What's next?</a>
                </div>
            </div>
        </div>
        <div class="post-complete congrats-container">
            <div class="inner">
                <h1 class="plain">Congratulations you are awesome!</h1>
                <p>Your next module will unlock in 48 Hours.</p>
                <p>
                    In the meantime <a href="{{route('dashboard')}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum to find support and chat to others about getting to know your amazing self.</a>
                </p>
                {{-- <div class="dots"></div>
                <div class="actions">
                    <a href="#" class="button is-locked">What's next?</a>
                </div> --}}
            </div>
        </div>
</div>