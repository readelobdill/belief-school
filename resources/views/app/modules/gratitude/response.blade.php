<div class="inner">
    <div class="content">
        <h1 class="title">
            Send a letter of<br />
            Gratitude
        </h1>

        <p>Nice, you have taken the first step towards consciously incorporating gratitude into your life. We recommend starting a gratitude diary, writing out ten every day.</p>

        <p>The next part of this exercise is to express gratitude to someone else. A simple, unexpected note of appreciation can have a big impact. It costs nothing but gives much.</p>

        <p>Think of someone you’d like to express your thanks to. Write a card or open your email browser and send an email now.</p>

        <ul class="accordion single">
            <li>
                <h2>
                    Need some help with what to say
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    <p>Unless you were taught to express yourself in this way, it may not come naturally. Don’t worry if it feels a little uncomfortable – we’ll help you get started.</p>

                    <p>Try and make it about “them” as much as possible and be specific if you can, this makes it more meaningful.</p>

                    <h3>A gratitude letter (or text) may look something like this:</h3>

                    <p class="mini-quote">
                        <em>Dear Suzie<br>
                        I wanted to drop you a note to tell you how grateful I am for your friendship. I don’t tell you often, but you make such a difference in my life. You never make me feel stink if I can’t make something, and you are always so supportive of my ideas and adventures. I appreciate having you in my life so much and love that my kids get to see what real friendship is.<br>
                        Love me</em>
                    </p>
                </div>
            </li>
        </ul>

        <p class="margin-top"><b>Brilliant</b>, you just made someone’s day a little more special.</p>

        <p class="center">How did you feel expressing your gratitude?</p>

        <form action="">
            <div class="form-row">
                <textarea name="letter" required placeholder="Write here..." maxlength="280">{{ isset($moduleUser) && isset($moduleUser->data[1]) ? $moduleUser->data[1]->{'letter'} : '' }}</textarea>
            </div>

            <div class="are-you-sure">
                <p>Once you click this button your content will be saved to the Dashboard. You can edit this by clicking on the module in the side menu.</p>
            </div>

            <div class="actions">
                <button class="button">Save to my Dashboard</button>
            </div>
        </form>
    </div>
</div>