@include('app/modules/home/toolbar')
<div class="inner">
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
                <p>We understand this, one of the greatest commodities in life these days is time. Belief School is designed to go at your pace. You can complete the program in a couple of weeks or do it over months, if that works for you. You will have lifelong access to the modules and can continue to develop your Dashboard and Manifesto as you wish. Investing time in yourself is one of the most rewarding and productive steps you can take towards creating the life you want.</p>
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
                <p>It can be a little scary as we start to look at who we are. One of the uniquely beautiful things about Belief School is each and every module will leave you feeling good about yourself. That is our promise to you and why Paula created Belief School. Not to fix people, or to tell you that you need to be more, but to show you how incredibly special you already are.</p>
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
                 <p>Belief School was not thought up six months ago. Paula Gosney has been working with people for 9 years helping them create real practical outcomes. Each of these modules has been crafted out of hundreds of hours of study, individual coaching and group dynamics. Because Belief School meets you where you are at, and works with your unique situation, the content and outcomes are exactly what you need, right now.</p>
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
                 <p>Once you are registered and enrolled, you can login to our private, members-only section on my.beleifschool.com and start working right away.</p>
                 <p>Each module has the instructions you need, a training video and built-in templates for you to interactive with. Everything is 100% automated.</p>
                 <p>Our goal is to make your online learning experience as simple and impactful as possible.</p>
            </div>
        </li>
    </ul>
    <div class="actions next-page" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>