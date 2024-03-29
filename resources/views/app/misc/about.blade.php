@extends('app/layout')

@section('content')

    <div class="container about">
        <div class="inner">
            <div class="content">
                <header>
                     <h1 class="title">
                        <span data-arc="150">&middot; Belief School &middot;</span>
                        Transforms Lives
                    </h1>
                </header>

                <h1 class="plain">Insightful interactive online modules <br />give you the evidence you need to create the life you want.</h2>

                <div class="testimonials-container">
                    <div class="head-icon"></div>

                    <div class="content-block">
                        <div class="testimonial">
                            <div class="name">
                                Michelle Heatherley
                            </div>
                            <div class="quote">
                                I completed Belief School at a crossroads in my life, I was trying to accomplish something extremely unfamiliar, struggling with my insecurities. Belief School helped me realise how special I am, focusing me on what I wanted, that anything was possible when I believed in myself. Each section was simple and easy to follow. By the end I felt empowered, and confident to move forward! I truly think everybody, at any age can benefit from this awesome program.
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="name">
                                Tiffany Matthews
                            </div>
                            <div class="quote">
                                Belief School came into my life at the perfect time. I started my own business and had recently become a mum, managing both was proving to be a struggle. The success I knew I was capable of wasn’t being actualised.  Through Belief School I learned that it was my belief in myself holding me back. My income increased, I re-connected with people I hadn’t spoken to in years, and I realised what I was capable of. Belief School was the catalyst for conquering my fear of animals, something I had carried with me most of my life.
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="name">
                                Dale Wheeler
                            </div>
                            <div class="quote">
                                Belief School was an amazing experience for me. It challenged me to look at my thought processes, and gave me the tools to create change. I would challenge any man to go through Belief School. Be willing to try something new, challenge yourself in a safe environment, where you are not being criticised, or judged for attempting to figure out how you think. I found it a humbling, and VERY worthwhile experience that surprised me. I recommend EVERY man do Belief School.
                            </div>
                        </div>
                    </div>{{-- end content block--}}
                </div>

                <div class="main-copy">

                    <h1 class="plain">What Belief School can do for you.</h1>

                    <div class="content-block">
                        <div class="col">
                            <p>Transformation comes from taking action. Every part of Belief School is designed to help you build belief in yourself. As you progress through the program you will see evidence of the great things that already exist in your world, your strengths, your compassion, the love and support around you.</p>
                            <blockquote>
                                Personal belief is a furnace you build from the inside, fuel it, stoke it and the energy you create will light fires in all areas of your extraordinary life.
                            </blockquote>
                        </div>

                        <div class="col">
                            <p>Whatever project or journey you are about to embark on, Belief School gives you the confidence to create change. It may be a goal you are driven to achieve, or you find yourself stuck creating the same unwanted outcomes, over and over. Or, you may have no idea what you want.</p>

                            <p>Our eight-module program will take you through eight practical exercises, that will transform you.</p>

                            <p>You will start to create a picture of how you operate in the world and the greatness within you. Upon completion, you’ll have a tool box of daily routines and processes that will profoundly affect all aspects of your life.</p>
                        </div>
                    </div>
                </div>
                <div class="main-copy why-you-need">
                    <h1 class="plain">Why you need to do this?</h1>
                    <div class="why-you-need__node">
                        <div class="icon person"></div>
                        <p>Your belief in yourself is the only thing standing between you and the life you want.</p>
                    </div>
                    <div class="why-you-need__node">
                        <div class="icon clarity"></div>
                        <p>Belief School is part of a journey of self-discovery, helping you understand who you are and why you do the things you do.</p>
                    </div>
                    <div class="why-you-need__node">
                        <div class="icon shield"></div>
                        <p>On completion you will have tools and resources to guide you as you create the life you want.</p>
                    </div>
                    <div class="why-you-need__node">
                        <div class="icon bulb"></div>
                        <p>You don’t know what you don’t know – but we do.</p>
                    </div>
                    <div class="why-you-need__node">
                        <div class="icon heart"></div>
                        <p>It will change your life – <a class="low-key" href="{{route('privacy-terms') }}#guarantee">guaranteed.</a></p>
                    </div>
                </div>
            </div>
        </div>

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

        <div class="inner">
            <div class="content">

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

                <div class="pricing-container">
                    <h1 class="title">
                        <span data-arc="120">&middot; Your investment in you &middot;</span>
                        <div class="price">$135 <span>NZD</span></div>
                    </h1>

                    @if(!Auth::check() || !Auth::user()->paid)
                        <p class="center"><a href="{{ route('home', ['skip' => 4])}}" class="button small" title="Enrol Now">Enrol Now</a></p>
                    @endif

                    <div class="content-block spacer">
                        <h1 class="plain">What you get</h1>

                        <div class="what-you-get">
                            <div class="what-you-get__node">
                                <div class="icon gem"></div>
                                <p>A self-discipline exercise, <b>setting you up for success</b> and helping you build your self-discipline muscle.</p>
                            </div>
                            <div class="what-you-get__node">
                                <div class="icon sheild"></div>
                                <p><b>Eight unique, beautifully crafted modules</b>, each with an interactive exercise that is simple to complete (not always easy ☺), but doable for everyone.</p>
                            </div>
                            <div class="what-you-get__node">
                                <div class="icon book"></div>
                                <p>Your <b>Belief School Manifesto</b>. This is our gift to you. A beautiful collection of all that you have learnt and created about yourself, to share and refer to whenever you need to be reminded how fabulous you are.</p>
                            </div>
                            <div class="what-you-get__node">
                                <div class="icon forum"></div>
                                <p>Access to the <b>Belief School community</b><br /> through our <b>Forum</b>. <br />Paula Gosney the founder, and her team, will be available to you throughout your journey, for guidance and support.</p>
                            </div>
                        </div>
                    </div>

                     <div class="content-block">
                        <p>Many of us want to create change, but when left to our own devices life can get in the way. Our initial enthusiasm may wane, or we come up against a challenge, so we stall.</p>

                        <p>When applied, the principles and exercises in Belief School are life changing. If you need help to stay on track, this option is for you.</p>
                    </div>
                </div>
                @if(isset($options['tutored_sessions_enabled']) && $options['tutored_sessions_enabled']->value === '1')
                <div class="pricing-container">

                <h1 class="title">
                    <span data-arc="120">&middot; Belief School <b>Coached</b> &middot;</span>
                </h1>

                    <div class="content-block">
                        <div class="col">
                            <p>Twice a year, over an eight week period, Paula Gosney works closely with a group who are looking for <b>greater accountability and additional support</b> as they work through Belief School, on their journey of self-discovery.</p>

                            <p>Over the last decade, Paula has spent hundreds of hours working with people one-on-one, helping them catch sight of their own potential.  She is deeply passionate about helping you see how capable, creative and valuable you are.</p>
                        </div>
                        <div class="col">
                            <p>This special coached program is an opportunity for you to work through Belief School with the creator, gaining more in-depth insights into the value of personal development and how you can apply this to yourself. You will be part of a dynamic group who will support and encourage you.</p>
                        </div>
                    </div>

                    <div class="content-block spacer">

                         <h1 class="title">
                            <div class="price">$270 <span>NZD</span></div>
                        </h1>

                        @if(!Auth::check() || !Auth::user()->paid)
                            <p class="center"><a href="{{ route('home', ['skip' => 4])}}" class="button small" title="Enrol Now">Enrol Now</a></p>
                        @endif

                        <center><p>Program commences <b>April 11th</b></p></center>

                        <h1 class="plain">What you get</h1>

                        <p>Full access to the complete automated Belief School Program described above.  In addition to support you:</p>

                        <div class="what-you-get coached">
                            <div class="what-you-get__node">
                                <div class="icon sheild"></div>
                                <p><b>Live webinars</b> <br />Twice weekly live webinars with Paula Gosney. One at the beginning of the week to work through the module, its purpose and the outcomes for you to create that week. The second on Thursday to answer questions, give support and help if you’re stuck. These sessions are recorded, if you can’t make it, they’ll be sent to you.</p>
                            </div>

                            <div class="what-you-get__node">
                                <div class="icon gem"></div>
                                <p><b>Work with Paula Gosney</b> <br />Have access to Paula’s wealth of knowledge, years of coaching experience and burning desire to help you see your brilliant self.</p>
                            </div>

                            <div class="what-you-get__node">
                                <div class="icon facebook"></div>
                                <p><b>Closed Facebook</b> <br />A group set up only for those on this specific program, facilitated by the Belief School Team, with Paula Gosney actively involved.</p>
                            </div>

                            <div class="what-you-get__node">
                                <div class="icon forum"></div>
                                <p><b>Weekly Q&amp;A</b> <br />A live session with Paula Gosney after each webinar, giving you the opportunity to get your questions answered and find solutions if you are stuck.</p>
                            </div>

                            <div class="what-you-get__node">
                                <div class="icon book"></div>
                                <p><b>Additional tools</b> and not yet released recordings to support your journey. <br /></p>
                            </div>
                        </div>
                    </div>

                    <p>Need more information, please email us here: <a href="mailto:contact@beliefschool.com"> contact@beliefschool.com</a></p>
                </div>
                @endif

                <h1 class="plain">Is any of this chatter, getting in your way?</h1>

                <ul class="accordion">
                    <li>
                        <h2>
                            I’m worried about the commitment.
                            <div class="toggle">
                                @include('app/partials/icons/collapse')
                                @include('app/partials/icons/expand')
                            </div>
                        </h2>
                        <div class="answer">
                            <p>We understand this, the greatest commodity in life these days is time. Belief School is designed to go at your pace, you can take as long as you like. However, as you see the results of each module, you’ll be excited to do the next. When something is creating value, we make it a priority – we find the time.</p>
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
                            <p>It can be a little scary as we start to look at who we are. One of the uniquely beautiful things about Belief School is each and every module will leave you feeling good about yourself. That is our promise to you and why Paula created Belief School. Not to fix people, or to tell you that you need to be more, to show you how special you already are.</p>
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
                            <p>Some digital programs can be very dry without the human connection. We have thought about this and have built in the community, recognition and accountability we all need to pull us towards the outcomes we want.</p>
                        </div>
                    </li>

                    <li>
                        <h2>
                            Further Details.
                            <div class="toggle">
                                @include('app/partials/icons/collapse')
                                @include('app/partials/icons/expand')
                            </div>
                        </h2>
                        <div class="answer">
                             <p>Our <a href="{{route('privacy-terms') }}" title="Terms &amp; Conditions">Terms &amp; Conditions</a> and <a href="{{route('privacy-terms') }}#privacy" title="Privacy Policy">Privacy Policy</a> are important to us and you! Please take the time to review this information.</p>
                        </div>
                    </li>
                </ul>
                @if(!Auth::check() || !Auth::user()->paid)
                    <p class="center"><a href="{{ route('home', ['skip' => 4])}}" class="button" title="I want to find my amazing self">I want to find my amazing self</a></p>
                @endif
            </div>
        </div>
    </div>

@endsection
