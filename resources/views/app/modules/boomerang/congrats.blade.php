<div class="inner">
        <div class="pre-complete congrats-container">
            <div class="inner">
                <div class="content">
                    <h1 class="plain">
                        Great job! Asking for feedback takes courage; you are going to learn a lot about courage over the course of your Belief School journey,
                    </h1>

                    <p class="annotation">Having trouble opening the email?<br />
                    Copy/paste link below into own email instead<br />
                    <strong>{{route('tagcloud', [$moduleUser->secret])}}</strong>
                    </p>

                    <p>All of the answers will be collated and appear in your Dashboard once your recipients begin to send their answers, to you so you can start to build a picture of the awesomness you bring to the world.</p>
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
                    <p>Your next module will unlock in 48 Hours.</p>
                    <p>
                        In the meantime <a href="{{route('dashboard')}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum to find support and chat to others about getting to know your amazing self.</a>
                    </p>
                </div>
            </div>
        </div>
</div>