@extends('app/layout')

@section('content')

    <div class="container faq">
        <div class="inner">
            <div class="content">
                <header>
                    <h1 class="title">
                        Belief School FAQ
                    </h1>
                </header>

                <h1 class="plain">Building confidence through self-belief</h1>

                <div class="content-block">
                    <div class="col">
                        <p>Belief school gives you the confidence to live the life you choose. Our unique proposition is that we create an environment that supports and encourages you to take action and complete tasks. These tasks let you see how you show up in your world, how unique and special you already are.
                        </p>
                    </div>
                    <div class="col">
                        <p>Building confidence is an inside job, you have got to do the press ups. We will help you in whatever way we can – that’s our passion, that’s our mission!</p>
                    </div>
                </div>

                <div class="content-block">
                    <h1 class="plain">Commonly Asked Questions</h1>

                    <div class="col">
                        <ul class="faq__nav-links">
                            <li><a href="#6">Can I go back to previous parts of a module that I’m currently working on?</a></li>
                            <li><a href="#7">Can I go back and edit previous modules that’ve already completed?</a></li>
                            <li><a href="#8">Can I access Forums for modules that I have completed?</a></li>
                            <li><a href="#9">What will I get at the end of the course?</a></li>
                            <li><a href="#10">Once I’m done, where to from here?</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <ul class="faq__nav-links">
                            <li><a href="#1">What support will I have throughout the program?</a></li>
                            <li><a href="#2">I’m having trouble logging in, how do I reset my password?</a></li>
                            <li><a href="#3">As I work through the modules can anyone see what I write?</a></li>
                            <li><a href="#4">When I log in, I can’t access all of the modules, help!</a></li>
                            <li><a href="#5">I’m halfway through a module - what happens if I log out?</a></li>
                        </ul>
                    </div>
                </div>

                <div class="main-copy">
                    <div id="1" class="faq__question-container">
                        <h4 class="faq__question">What support will I have throughout the program?</h4>
                        <div class="faq__answer">
                            <p>We want you to feel supported and encouraged, so this is how we are here for you.</p>

                            <h4>The Forum</h4>
                            <p>Our Forum is the first place you should go to if you need support and encouragement. As Belief School grows, so will the Forum. This is a safe and fun community where you can share your successes and your fears. Paula Gosney is very active in the Forum and will do her best to answer your questions and acknowledge your achievements.</p>

                            <p>Remember: no soliciting or selling, the mention of any brand names will be removed.</p>

                            <h4>Our super cool closed Facebook group</h4>
                            <p>We all know and love Facebook. This group is for high fives, gentle nudges forward and to show off some of what you have done and created. Use this page to connect!</p>
                            <p>The welcome email that you receive from us when you sign up has more details about joining this group. Let us know here <a href="mailto:contact@beliefschool.com" target="_blank">contact@beliefschool.com</a> if you haven’t received this email.</p>

                            <p><h4>Contact us</h4>
                            You can also drop us a note, we are here to help. Please be aware that we are not trained psychologists, we will do our best to give you generic tools and tips on how to move forward. However, we will avoid giving you advice on how to solve a personal problem.</p>
                        </div>
                    </div>

                    <div id="2" class="faq__question-container">
                        <h4 class="faq__question">I’m having trouble logging in, how do I reset my password?</h4>
                        <div class="faq__answer">
                            <p>Follow this <a href="https://my.beliefschool.com/forgot-password" target="_blank">link.</a></p>
                        </div>
                    </div>

                    <div id="3" class="faq__question-container">
                        <h4 class="faq__question">As I work through the modules can anyone see what I write?</h4>
                        <div class="faq__answer">
                            <p>No, the personal information you input for each module cannot be seen by anyone – not even us! The only information that other people can see is what you post in the Forums and what you <u>choose</u> to share via email or social media.</p>
                        </div>
                    </div>

                    <div id="4" class="faq__question-container">
                        <h4 class="faq__question">When I log in, I can’t access all of the modules, help!</h4>
                        <div class="faq__answer">
                            <p>The next module will unlock in sequential order as you complete each task and input your outcomes – no skipping ahead ☺. We have designed it this way because each module works with a Belief School principle and builds on the previous one. Work your way from start to finish, keep your momentum up and make time for Belief School each day.</p>
                        </div>
                    </div>

                    <div id="5" class="faq__question-container">
                        <h4 class="faq__question">I’m halfway through a module - what happens if I log out?</h4>
                        <div class="faq__answer">
                            <p>Make sure you click the “save &amp; log out” button in the top right corner of the screen. Your progress will be saved and when you next log in, you’ll come right back to where you left off.</p>
                        </div>
                    </div>

                    <div id="6" class="faq__question-container">
                        <h4 class="faq__question">Can I go back to previous parts of a module that I’m currently working on?</h4>
                        <div class="faq__answer">
                            <p>Yes you can go back to the video and the instructions and you can edit your responses for the module you are working on. Once you have completed this module, you may like to double check for typos, etc, as it will be saved to your Dashboard and Manifesto once it’s complete.</p>
                        </div>
                    </div>

                    <div id="7" class="faq__question-container">
                        <h4 class="faq__question">Can I go back and edit previous modules that I’ve already completed?</h4>
                        <div class="faq__answer">
                            <p>We have always felt that your first response to a task is extremely valuable and we want you to cherish this. At this stage we have chosen not to allow you to edit completed modules.</p>
                        </div>
                    </div>

                    <div id="8" class="faq__question-container">
                        <h4 class="faq__question">Can I access Forums for modules that I have completed?</h4>
                        <div class="faq__answer">
                            <p>Absolutely. As you unlock new modules, you are welcome to go back and contribute to any of the Forums in modules you have already worked through. To access a Forum, head to your Dashboard and click the Forum icon that corresponds to the module you want to check in on. Your experience is of great value to others; we encourage you to contribute.</p>
                        </div>
                    </div>

                    <div id="9" class="faq__question-container">
                        <h4 class="faq__question">What will I get at the end of the course?</h4>
                        <div class="faq__answer">
                            <p>Upon completion, you’ll have worked through each of the Belief School Principles that help build your belief in yourself. Applying these principles in your life on a regular basis will create profound change.</p>

                            <p>As you progress through the program, we collect your learnings and experiences on your Dashboard. Once Module Eight is complete, this will be converted into your beautiful Manifesto which is downloadable and printable.</p>

                            <p>Print it out, plaster it on your walls, or save parts of it to your phone and computer! Your Manifesto is a true reflection of who you are, and the value and beauty you bring to the world.</p>
                        </div>
                    </div>

                    <div id="10" class="faq__question-container">
                        <h4 class="faq__question">Once I’m done, where to from here?</h4>
                        <div class="faq__answer">
                            <p>Throughout 2016 and into 2017 we will be releasing all of these exciting initiatives to help you see your beautiful self!</p>

                            <ul class="faq__list">
                                <li>Members site</li>
                                <li>Ebooks on each of the Belief School Principles complete with exercises Belief School for Teens</li>
                                <li>Belief School Advanced</li>
                                <li>Belief School Hardcover Book/Journal</li>
                                <li>Paula Gosney’s Biography – From Haystacks to Heroin.</li>
                            </ul>

                            <p>Paula Gosney offers an eight-week coached program twice a year. She is fun, insightful and wise. If you are looking for greater insights into how you operate or you need more accountability to work through Belief School, the coached program with Paula may be perfect for you.</p>

                            <p>We’re hoping we have answered most of your questions here, if not, flick us an email at <a href="mailto:contact@beliefschool.com" target="_blank">contact@beliefschool.com</a> and we’ll help you out.</p>
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
        </div>
    </div>


@endsection
