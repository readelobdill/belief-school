<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content daily">

                <h1 class="plain">Helping you make gratitude a daily practice</h1>

                    <h4><b>Become aware of your surroundings</b></h4>
                    <p>Notice the little things that make your life joyful. The sun on your face, the smell of fresh flowers – silently give thanks for the everyday things in our life.</p>

                    <h4><b>Set yourself up to win</b></h4>
                    <p>If this is new to you, start with one heartfelt thankyou a day. Put a reminder on your mirror or screen saver. Focus on the feeling you get when you express gratitude, this will embed the new habit.</p>

                    <h4><b>Be creative</b></h4>
                    <p>Leave post-it notes<br />
                        Create a gratitude jar and pop a thought in it each day<br />
                        Write thank-you texts at the airport or bus stop<br />
                        Start a gratitude chart with the kids<br />
                        Get a journal and focus on what you love<br />
                        Pray abundantly<br />
                    </p>

                    <h4><b>Put yourself in someone else’s shoes</b></h4>
                    <p>Imagine what it feels like to have someone express gratitude to you, act on that feeling.</p>

                    <h4><b>Start with those closest to you</b></h4>
                    <p>Express gratitude in your home, it is so easy to take our everyday for granted</p>

                    <p>Gratitude is a practice. Learn to incorporate it into your daily life, enriching your connection with those around you.</p>

                <div class="actions">
                    <a href="#" class="button" data-complete-module>I am ready for module 7</a>
                </div>

            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain"> Continue to record what <br />you are grateful for</h1>

                <p>Keep your Gratitude Diary going – write down what you are grateful for each day.</p>

                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
                @endif

                <p>Share what you are grateful for in the <a href="{{route('modules.forum',[$module->slug])}}">community forum.</a> Doing this publicly makes it even more powerful.</p>
            </div>
        </div>
    </div>
</div>