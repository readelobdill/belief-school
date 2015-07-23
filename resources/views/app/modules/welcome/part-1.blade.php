<div class="inner">
    <div class="content">
        <h1 class="title">
            <span data-arc="100">&middot; Welcome to &middot;</span>
            Belief School
        </h1>
        <p class="bold">
            I am Paula Gosney and I am the founder of Belief School.  Belief School was born out of my life’s experiences and work.
        </p>
        <p>
            I believe in you. There is not a thing you could tell me that would shock me, deter me or have me doubt my belief that you are magnificent, that you are worthy and that you can live YOUR life.  You have already taken the most important step, you have said yes to a process of self-discovery.
        </p>
        <p>
            For you to get the most out of Belief School we need to get a few things straight.
        </p>
        <p>
            If you need help at anytime visit our <a href="#">friendly online community</a>.
        </p>
        <blockquote>
            Check out the details below and get started on your Belief School journey
        </blockquote>
        <div class="dots"></div>
        <ul class="accordion">
            <li>
                <h2>
                    Victim doesn't work
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    This is just the beginning of your own personal journey - writing out your limiting beliefs may seem daunting but we are about to turn those negative thoughts around with affirmation!
                </div>
            </li>
            <li>
                <h2>
                    We can show you how, we can encourage you, we can't do the push-ups for you.
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    answer
                </div>
            </li>
            <li>
                <h2>
                    Some mechanisms we have put in place to help you complete this program
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    answer
                </div>
            </li>
            <li>
                <h2>
                    What can I expect from Belief School
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    answer
                </div>
            </li>
            <li>
                <h2>
                    Belief School Forum
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    answer
                </div>
            </li>
        </ul>
        <div class="dots"></div>
        <h1 class="title">First Step</h1>
        <p>
            <strong>This exercise is your first step in Belief School and serves two purposes;</strong> the first to demonstrate to yourself that you can follow through, that when you say you will do something – YOU WILL DO IT.
        </p>
        <p>
            The second is to give your body a gift while you are doing this work. Nurturing your body will give you better clarity and peace.
        </p>
        <blockquote>
            Choose one of these, the one that resonates with you, the one that you are fully prepared to commit to for the journey through this course.
        </blockquote>

        <form class="welcome-first-steps" action="{{ route('modules.update', ['welcome']) }}">
            <ul class="checkbox-list">
                <li>
                    <input required type="radio" name="assert" id="choice-1" value="Walk, run, swim or cycle for 30min each day for the duration of this course"><label for="choice-1">Walk, run, swim or cycle for 30min each day for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-2" value="Do not drink coffee for the duration of this course"><label for="choice-2">Do not drink coffee for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-3" value="Do not smoke anything for the duration of this course"><label for="choice-3">Do not smoke anything for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-4" value="Finish your shower with 60 seconds of cold water (really cold) for the duration of this course"><label for="choice-4">Finish your shower with 60 seconds of cold water (really cold) for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-5" value="Do not eat processed sugar for the duration of this course"><label for="choice-5">Do not eat processed sugar for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-6" value="Do not eat gluten for the duration of this course"><label for="choice-6">Do not eat gluten for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-7" value="Do not eat dairy for the duration of this course"><label for="choice-7">Do not eat dairy for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-8" value="Drink 2 litres of water every day for the duration of this course"><label for="choice-8">Drink 2 litres of water every day for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-9" value="Do not eat meat for the duration of this course"><label for="choice-9">Do not eat meat for the duration of this course</label>
                </li>
                <li>
                    <input required type="radio" name="assert" id="choice-10" value="Go to bed and turn out the lights out by 10pm for the duration of this course"><label for="choice-10">Go to bed and turn out the lights out by 10pm for the duration of this course</label>
                </li>
            </ul>
            <div class="actions">
                <button class="button">I'm commiting to it! </button>
            </div>

        </form>

    </div>
</div>