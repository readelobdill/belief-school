<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">

                <h1 class="plain">Helping you make gratitude a daily practise</h1>

                <ol class="numlist--simple">
                    <li><b>Become aware of your surroundings</b>
                        Notice the little things that make your life joyful. The sun on your face, the smell of fresh flowers – silently give thanks for the everyday things in our life.
                    </li>

                    <li><b>Set yourself up to win</b>
                        If this is new to you, start with one heartfelt thankyou a day. Put a reminder on your mirror or screen saver. Focus on the feeling you get when you express gratitude, this will embed the new habit.
                    </li>

                    <li><b>Be creative</b>
                        - Leave post-it notes
                        - Create a gratitude jar and pop a thought in it each day
                        - Write thank-you texts at the airport or bus stop
                        - Start a gratitude chart with the kids
                        - Get a journal and focus on what you love
                        - Pray abundantly
                    </li>

                    <li><b>Put yourself in someone else’s shoes</b>
                        Imagine what it feels like to have someone express gratitude to you, act on that feeling.
                    </li>

                    <li><b>Start with those closest to you</b>
                        Express gratitude in your home, it is so easy to take our everyday for granted
                    </li>
                </ol>

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
                <h1 class="plain"> Continue to record what <br />you are grateful for...</h1>

                <p>Keep your Gratitude Diary going - try to write down what you are grateful for at least once a day, even if you only write one thing.</p>
                <p>Come back to your Belief School Dashboard to see the original 10 things you are grateful for if you are struggling to find inspiration</p>

                @if($moduleUser->created_at->diffInHours() < config('belief.lockout'))
                    <p>Your next module will unlock in {{$moduleUser->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}.</p>
                @else
                    <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
                @endif

                <p>Take a look at <a href="{{route('dashboard')}}#module-{{$module->slug}}">your dashboard</a> and see the progress on your amazing Belief School journey or share what you are grateful for in our supportive <a href="{{route('modules.forum',[$module->slug])}}">community forum.</a></p>
            </div>
        </div>
    </div>
</div>