<div class="inner">
    <div class="content">
        <h1 class="plain">Turning the Negative Chatter Off</h1>

        <p>Good job getting them down, they don’t need to be perfect. This is an exercise teaching you how to recognise the negative chatter and turn it into thoughts that will serve you.</p>

        <h2 class="title">Affirmations</h2>

        <p>Affirmations are powerful, you may believe they’re a bit kooky but, if you think about the logic behind them they make perfect sense. Our thoughts create our actions, our actions reinforce our beliefs, which define our choices and create our lives.</p>

        <p><b>The purpose of this exercise is to show you how to turn your limiting beliefs into words that will open up more possibilities for you.</b></p>

        <p>You do this by crafting a positive statement in response to the limiting belief. This must be 100% positive and stated in the present, like it has already been achieved.</p>

        <ul class="accordion single">
            <li>
                <h2 class="title">
                    Examples of Limiting Beliefs turned into Affirmations
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">

                    <ul class="list--simple colors">
                        <li>“I’m hopeless with my kids, I always lose it.”</li>
                        <li>“I am amazing with my kids my first response is gentle.”</li>
                        <li>“I’m uncomfortable at parties”</li>
                        <li>“I love going to parties and always enjoy meeting new people”</li>
                    </ul>

                    <p class="left">No negativity at all, no buts, maybes or saying I’m going to try! If you are thinking about a goal, maybe a business deal or a sports event, you would write something like this:</p>

                    <ul class="list--simple">
                    <li>I am so happy – it’s July 16th, I won my tournament, it feels awesome and I am proud of myself.</li>

                    <div class="margin-top">
                        <p class="left"> <a href="http://beliefschool.com/how-to-find-blue-elephants/" target="_blank">Read more</a> on how this works here.</p>
                    </div>
                </div>
            </li>
        </ul>

        <h2 class="title">Guidelines for creating Powerful Affirming Statements</h2>
        <ol class="quote-list">
            <li>Start with positive words such as, I am, I do, I can, I have</li>
            <li>Say it as often as you can, say it out loud and with feeling</li>
            <li>Allow yourself to feel the emotion of your success</li>
            <li>Create a visual picture in your mind</li>
            <li>Stick them in visible places, on your mirror, the fridge, as your screen saver</li>
            <li>When you catch yourself dwelling on a limiting belief, immediately change it to the positive affirmation</li>
            <li>Feel proud of this work, you are in the process of reprogramming your mind</li>
        </ol>

        <h2 class="title">Important Truth</h2>
        <blockquote class="center">
           <strong>You create what you focus on.<br />
            If you are focusing on the lack of something, you will create more of this.</strong>
        </blockquote>

        <ul class="accordion single">
            <li>
                <h2>
                    How to keep negative thoughts out of your head:
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    <ol class="numlist--simple">
                        <li>Surround your visual and audio space with things that give you joy and motivate you. Images that inspire you and fill you with happiness. Fill your world with music, podcasts and reading material that is makes you feel good. When your mind is idle these are the things that will trigger thoughts and emotions – you get to choose what they are.</li>
                        <li>When negative thoughts or limiting beliefs start to crowd in, immediately start doing something that occupies your mind. This may be exercise, music, knitting, reading, washing the dog, or simply shooting hoops.</li>
                        <li>Our minds are great at solving problems, but when they are left idle, they can start causing trouble – give your mind a job, then it is less likely to dwell on negative thoughts.</li>
                        <li>Breath. Put your hands on your belly and slowly breathe into your tummy, pushing your hands out. As you breathe in think of a word that inspires you, as you breathe out allow your body to slowly relax.</li>
                        <li>When you are down or feeling negative do not go online and trawl through social media (unless you are looking at happy stuff), stare at negative television, or read the depressing news. Put your mind to work, you will instantly feel better.</li>
                        <li>Stick your positive affirmations where you can see them.</li>
                        <li>Meditate. We love the app Headspace, to get you started if you don’t know how.</li>
                    </ol>
                </div>
            </li>
        </ul>

        <form action="" class="positive-affirmations">
            <div class="positive-affirmations-fields">
                <div class="belief">
                    <label class="the-belief" for="response-1">
                        <span class="number">1 .</span>
                        <strong>Turn</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-1'} : '' }}"</p>
                    </label>

                    <div class="the-affirmation">
                        <div class="i-felt"><strong>into a powerful affirmation</strong></div>
                        <textarea name="response-1" id="response-1" required  maxlength="140"></textarea>
                        <label class="number" for="response-1">1 .</label>
                    </div>
                </div>
                <div class="belief">
                    <label class="the-belief" for="response-2">
                        <span class="number">2 .</span>
                        <strong>Turn</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-2'} : '' }}"</p>
                    </label>

                    <div class="the-affirmation">
                        <div class="i-felt"><strong>into a powerful affirmation</strong></div>
                        <textarea name="response-2" id="response-2" required maxlength="140"></textarea>
                        <label class="number" for="response-2">2 .</label>
                    </div>
                </div>
                <div class="belief">
                    <label class="the-belief" for="response-3">
                        <span class="number">3 .</span>
                        <strong>Turn</strong>
                        <p class="limiting-belief-text" >"{{ isset($moduleUser) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->{'challenge-3'} : '' }}"</p>
                    </label>

                    <div class="the-affirmation">
                        <div class="i-felt"><strong>into a powerful affirmation</strong></div>
                        <textarea name="response-3" id="response-3" required maxlength="140"></textarea>
                        <label class="number" for="response-3">3 .</label>
                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="button">Save to dashboard</button>
            </div>

        </form>
    </div>
</div>