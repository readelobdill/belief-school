@extends('app/layout')

@section('content')

    <div class="container right-for-me faq">
        <!-- @include('app/modules/home/toolbar') -->
        <div class="inner">
            <div class="content">
                <header>
                     <h1 class="title">
                        <span data-arc="150">&middot; Is Belief School &middot;</span>
                        right for me?
                    </h1>
                </header>

                <h1 class="plain">Yes</h1>

                <div class="content-block">
                    <p>Belief School is right for everyone! It’s impossible to go through Belief School and not feel good about yourself. All of us, no matter what is happening in our life, get enormous value from personal development and self-awareness.
                    </p>
                </div>

                <div class="content-block">
                    <div class="col">
                        <ul class="faq__nav-links">
                            <li><a href="#6">How much is Belief School?</a></li>
                            <li><a href="#7">Our money back guarantee</a></li>
                            <li><a href="#8">Who started Belief School and why? </a></li>
                            <li><a href="#9">What are the terms and conditions of Belief School?</a></li>
                            <li><a href="#10">What is the privacy policy of Belief School?</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <ul class="faq__nav-links">
                            <li><a href="#1">How much time do I need to set aside to complete the program?</a></li>
                            <li><a href="#2">I’m going through quite a bit of ‘stuff’ right now, should I wait till I am at a more settled time of my life?</a></li>
                            <li><a href="#3">What support do I get during the programme?</a></li>
                            <li><a href="#4">I’m wondering if I should do this with someone.</a></li>
                            <li><a href="#5">What results can I expect from doing Belief School?</a></li>
                        </ul>
                    </div>
                </div>

                <div class="main-copy">
                    <div id="1" class="faq__question-container">
                        <h4 class="faq__question">How much time do I need to set aside to complete the program?</h4>
                        <div class="faq__answer">
                            <p>This really depends on you, how you work and process things. We have intentionally kept the theory as tight as possible. We know in Belief School that your greatest learning comes from taking action and this is where the focus is. On average you will need to allocated 1-2 hours per module.</p>
                        </div>
                    </div>

                    <div id="2" class="faq__question-container">
                        <h4 class="faq__question">I’m going through quite a bit of ‘stuff’ right now, should I wait till I am at a more settled time of my life?</h4>
                        <div class="faq__answer">
                            <p></p>
                        </div>
                    </div>

                    <div id="3" class="faq__question-container">
                        <h4 class="faq__question">What support do I get during the programme?</h4>
                        <div class="faq__answer">
                            <p>You can have as much or as little support as you want. If you are someone who likes to work autonomously, then you can work your way through the course at your own pace in your own space.</p>
                            <p>If you enjoy connecting with others on the same journey, you can do this through our Forum; set up for support and discussion. You’ll also be invited to our Closed Facebook Community upon enrolment; this is the place where all the fun happens!</p>
                            <p>Paula Gosney and the Belief School Team are always available to you, whether it be through the channels mentioned above, or directly at: <a href="mailto:contact@beliefschool.com">contact@beliefschool.com.</a></p>
                        </div>
                    </div>

                    <div id="4" class="faq__question-container">
                        <h4 class="faq__question">I’m wondering if I should do this with someone.</h4>
                        <div class="faq__answer">
                            <p>This is the perfect program to do with a friend, or group if you like that dynamic. Whether you do this with a team or bunch of pals, or you journey alone, there will ALWAYS be someone to help you, recognise what you are achieving and support you along the way.</p>
                        </div>
                    </div>

                    <div id="5" class="faq__question-container">
                        <h4 class="faq__question">What results can I expect from doing Belief School?</h4>
                        <div class="faq__answer">
                            <p>The outcomes are very personal and will be totally unique to you. There always seems to be one module in particular that creates an incredible, however this module is different for everyone.</p>
                            <p>You will leave your Belief School experience feeling really good about yourself, you’ll have practises and principles to support you in your decision making and you will have a lot more self-awareness around how you show up, and the impact this has on how you feel about yourself.</p>
                            <p>You will have discovered so many of the unique, authentic qualities you have that may have been hidden from you.</p>
                        </div>
                    </div>

                    <div id="6" class="faq__question-container">
                        <h4 class="faq__question">How much is Belief School?</h4>
                        <div class="faq__answer">
                            <p></p>
                        </div>
                    </div>

                    <div id="7" class="faq__question-container">
                        <h4 class="faq__question">Our money back guarantee</h4>
                        <div class="faq__answer">
                            <p>We want you to be happy and satisfied, if for some reason you are not (which we would do everything in our power to ensure that doesn’t happen), for your peace of mind, we offer a 7-day Money Back Guarantee on Belief School. If you do not believe the course created the outcomes promoted, on giving notice to us within 7 days of completing the course, we will refund you the full amount paid for the course.  In order to be eligible for the money back guarantee you must have completed all modules in the relevant course. This 7-day Money Back Guarantee applies notwithstanding the exclusion and limitations in these terms and is in addition to consumer's rights under the Consumer Guarantees Act 1993.</p>
                        </div>
                    </div>

                    <div id="8" class="faq__question-container">
                        <h4 class="faq__question">Who started Belief School and why? </h4>
                        <div class="faq__answer">
                            <p></p>
                        </div>
                    </div>

                    <div id="9" class="faq__question-container">
                        <h4 class="faq__question">What are the terms and conditions of Belief School?</h4>
                        <div class="faq__answer">
                            <p></p>
                        </div>
                    </div>

                    <div id="10" class="faq__question-container">
                        <h4 class="faq__question">What is the privacy policy of Belief School?</h4>
                        <div class="faq__answer">
                            <p></p>
                        </div>
                    </div>

                   <!--  <div class="faq__question-container">
                        <h4 class="faq__question"></h4>
                        <div class="faq__answer">
                            <p></p>
                        </div>
                    </div> -->
                </div>
            </div>
            <p class="center"><a href="{{ route('home', ['skip' => 5])}}" class="button small" title="Enrol Now">Enrol Now</a></p>
        </div>
    </div>


@endsection
