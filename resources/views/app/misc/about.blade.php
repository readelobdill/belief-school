@extends('app/layout')

@section('content')

    <div class="container about">
        <div class="inner">
            <div class="content">
                <header>
                    <h1 class="title">
                        Learn <br />
                        more about<br />
                        Belief School
                    </h1>
                </header>

                <div class="testimonials-container">
                    <div class="head-icon"></div>

                    <div class="content-block">
                        <div class="testimonial">
                            <div class="name">
                                John Doe
                            </div>
                            <div class="quote">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="name">
                                John Doe
                            </div>
                            <div class="quote">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>

                        <div class="testimonial">
                            <div class="name">
                                John Doe
                            </div>
                            <div class="quote">
                                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                    </div>{{-- end content block--}}
                </div>

                <div class="main-copy">

                    <h1 class="plain">Benefits of Belief School</h1>

                    <div class="content-block">
                        <div class="col">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolvore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <blockquote>
                                Pariatur excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia. Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.
                            </blockquote>
                            <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi</p>
                        </div>
                        <div class="col">
                            <p>forem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                            <p class="mini-quote">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed.</p>
                        </div>
                    </div>
                    <div class="dots"></div>
                </div>

            </div>
        </div>

        <div class="red-block">
            <div class="content-block">
                <div class="col">
                    <div class="main-quote">

                        Are you interested in laying<br />
                        down a foundation of self-belief <br />
                        so you can create the outcomes <br />
                        you want in your life?

                    </div>
                </div>
                <div class="col">
                    <p><strong>Whatever project you are about to embark on, big or small - Belief School will give you the confidence to create change in your life.</strong></p>

                    <p>Our program will take you through eight practical exercises that you can complete at your own pace, giving you a clear understanding of how you operate in the world, the greatness within you and leaving you with a tool box of daily routines and processes that will have a profound effect on all aspects of your life,</p>
                </div>
            </div>
        </div>

        <div class="inner">
            <div class="content">

                <div class="pricing-container">
                     <h1 class="title">
                        <span data-arc="100">&middot; Pricing Details &middot;</span>
                        <div class="price">$99{{-- <span>NZD</span> --}}</div>
                        <p class="gets">Gets you...</p>
                    </h1>

                    <div class="content-block">
                        <div class="price-block">
                            <div class="icon"></div>
                            <p>Lifetime Belief School access to your Manifesto (come back and reflect on your journey and get support at anytime!)</p>
                        </div>
                        <div class="price-block">
                            <div class="icon shield"></div>
                            <p>8 Modules to complete at your own pace</p>
                        </div>
                        <div class="price-block">
                            <div class="icon message"></div>
                            <p>A supportive forum environment to help you move through your Belief School Journey</p>
                        </div>
                    </div>
                </div>

                <div class="terms-container">
                    <h1 class="plain">Further Details</h1>

                    <p>Our <a href="">Terms &amp; Conditions</a> and <a href="">Privacy Policy</a> are important to us and you! Please take the time to review the information.</p>
                </div>

                <p class="center"><button class="button">I want to find my amazing self</button></p>
            </div>
        </div>
    </div>

@endsection