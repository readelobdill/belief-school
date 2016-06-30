<div class="inner chatter ">
    <header>
        <h1 class="title">
            Is any of this chatter, getting in the way?
        </h1>
    </header>

    <ul class="accordion">
        <li>
            <h2>
                I’m concerned about the commitment?
                <div class="toggle">
                    @include('app/partials/icons/collapse')
                    @include('app/partials/icons/expand')
                </div>
            </h2>
            <div class="answer">
                <p>We understand this; one of the greatest commodities in life is time. Belief School is designed to go at your pace. You can complete the program in a couple of weeks or do it over months. You will have lifelong access to the modules and can continue to develop your Dashboard and Manifesto as you wish. Investing time in yourself is one of the most rewarding and productive steps you can take towards creating the life you want.</p>
            </div>
        </li>

        <li>
            <h2>
                Personal development scares me.
                <div class="toggle">
                    @include('app/partials/icons/collapse')
                    @include('app/partials/icons/expand')
                </div>
            </h2>
            <div class="answer">
                <p>It can be a little scary as we start to look at who we are. One of the uniquely beautiful things about Belief School is each and every module will leave you feeling good about yourself. That is our promise to you and why Paula created Belief School. Not to fix you, or to tell you that you need to be more, but to show you how incredibly special you already are.</p>
            </div>
        </li>

        <li>
            <h2>
                I’m not sure if digital is right for me.
                <div class="toggle">
                    @include('app/partials/icons/collapse')
                    @include('app/partials/icons/expand')
                </div>
            </h2>
            <div class="answer">
                <p>Some digital programs can be dry and lack the human connection we need. We have thought about this and have built in the community, recognition and accountability needed to pull you towards the outcomes you want.</p>
            </div>
        </li>

        <li>
            <h2>
                There are lots of courses, how do I know this one is right for me?
                <div class="toggle">
                    @include('app/partials/icons/collapse')
                    @include('app/partials/icons/expand')
                </div>
            </h2>
            <div class="answer">
                 <p>Belief School was not thought up six months ago. Paula Gosney has been working with people for 9 years helping them create real, practical outcomes. Each of these modules has been crafted out of hundreds of hours of study, individual coaching and group dynamics.</p>

                 <p class="red-block">Because Belief School meets you where you’re at and works with your unique situation the content and outcomes are exactly what you need right now.</p>
            </div>
        </li>

        <li>
            <h2>
                How am I going to learn?
                <div class="toggle">
                    @include('app/partials/icons/collapse')
                    @include('app/partials/icons/expand')
                </div>
            </h2>
            <div class="answer">
                 <p>Once you are registered and enrolled, you can log in to our private, members-only section on my.beleifschool.com and start working right away.</p>
                 <p>Each module has the instructions you need, a training video and built-in templates for you to interact with. Everything is 100% automated.</p>
                 <p class="red-block">Our goal is to make your online learning experience as simple and impactful as possible.</p>
            </div>
        </li>
    </ul>

    <div class="actions more-detail">
        <a href="{{ route('home', ['skip' => 3])}}"><button class="button">Course Detail</button></a>
    </div>
</div>

<div class="container about inner">
    <div class="red-block">
        <h1 class="plain">What Belief School Is:</h1>
        <div class="content-block">
            <div class="col">
                <p><b>Simple.</b> A small amount of theory and a quick video to set you up for the task ahead.</p>
                <p><b>Game Changing.</b> You are having the experience, it is your reality and cannot be denied.</p>
                <p><b>Fun.</b> You’ll laugh a little and possibly cry a little, as you discover how special you are.</p>
            </div>
            <div class="col">
                <p><b>Supportive.</b> Do this with a group, a team, or journey alone and reach out to the Belief School community. There will ALWAYS be someone to help you, recognise who you are, and give you a kick in the pants if you need it.
                </p>
                <p><b>Tried and True.</b> Each of these modules has been crafted out of hundreds of hours of study and from working with people one-on-one, we know how this goes.</p>
            </div>
        </div>
    </div>
    <div class="main-copy">
        <h1 class="plain">Belief School is not:</h1>

        <div class="content-block">
            <div class="col">
                <p>Like any other program on the planet. We are pretty confident this is one of a kind.</p>
                <p>Full of loads of theory and reading. New awareness and change can happen in an instant when we are presented with new evidence.</p>
            </div>
            <div class="col">
                <p>Always easy. You can cruise through these modules not putting in much effort and even then you will create value for yourself. Or you can be brave and play full out – this is where the gold is.</p>
            </div>
        </div>
    </div>
    <p class="center"><a href="{{ route('home', ['skip' => 4])}}" class="button" title="I want to find my amazing self">I want to find my amazing self</a></p>
</div>