<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <p>
                    Gratitude is a practice. Learn to incorporate it into your daily life, enriching your connection with those around you.
                </p>

                <div class="actions">
                    <a href="#" class="button" data-complete-module>I am ready for module 7</a>
                </div>

                <ul class="accordion single">
                    <li>
                        <h2>
                            Helping you make gratitude a daily practise
                            <div class="toggle">
                                @include('app/partials/icons/collapse')
                                @include('app/partials/icons/expand')
                            </div>
                        </h2>
                        <div class="answer">
                             <p>
                                <strong>1. Become aware of your surroundings</strong><br>
                                Notice the little things that make your life joyful. The sun on your face, the smell of fresh flowers – silently give thanks for the everyday things in our life.
                            </p>

                            <p>
                                <strong>2. Set yourself up to win</strong><br>
                                If this is new to you start with one heartfelt thankyou a day. Put a reminder on your mirror or screen saver. Focus on the feeling you get when you express gratitude, this will embed the new habit.
                            </p>

                            <p>
                                <strong>3. Be creative</strong><br>
                                   - Leave post it notes<br>
                                   - Create a gratitude jar, and pop a thought in it each day<br>
                                   - Write thankyou texts when you are sitting at the airport or bus stop<br>
                                   - Start a gratitude chart with the kids<br>
                                   - Get a journal and start focusing on what you love<br>
                                   - Pray abundantly
                            </p>

                            <p>
                                <strong>4. Put yourself in someone else’s shoes</strong><br>
                                Imagine what it feels like to have someone express gratitude to you, act on that feeling.
                            </p>

                            <p><strong>5. Start with those closest to you</strong><br>
                                Express gratitude in your home for the things it is so easy to take for granted
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain"> Continue to record what <br />you are grateful for...</h1>

                <p>Keep your Gratitude Diary going - try to write down what you are grateful for at least once a day, even if you only write one thing.</p>
                <p>Come back to your Belief School Dashboard to see the original 10 things you are grateful for if you are struggling to find inspiration</p>

                <p><b>Your next module will unlock in 48 Hours.</b></p>

                <p>Take a look at <a href="{{route('dashboard')}}#module-{{$module->slug}}">your dashboard</a> and see the progress on your amazing Belief School journey or share what you are grateful for in our supportive <a href="{{route('modules.forum',[$module->slug])}}">community forum.</a></p>
            </div>
        </div>
    </div>
</div>