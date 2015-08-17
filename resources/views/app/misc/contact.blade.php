@extends('app/layout')

@section('content')

    <div class="container contact">
        <div class="inner">
            <div class="content">
                <header>
                    <h1 class="title">
                        Contact us
                    </h1>
                </header>

                <h1 class="plain">Need some help? Have questions?</h1>

                <p>Belief School transforms lives; crafted from hundreds of hours of working with people one on one and sitting at the feet of extraordinary teachers. Each empowering interactive module gives you evidence of your greatness. Confidence that you are capable of living the life you choose. From this place of self-realisation and self-esteem, personal belief explodes and all things are possible.</p>

                <div class="get-in-contact">
                    <div class="content-block">

                            <p class="center">
                                <strong>If you'd like to get in touch contact:</strong> <br />
                                <a href="mailto:paula@beliefschool.com">paula@beliefschool.com</a>
                            </p>

                            <p class="center">
                                <strong>Postal Address:</strong> <br />
                                123 Business Street <br />
                                Business Suburb <br />
                                Auckland; New Zealand
                            </p>

                    </div>
                </div>

                <div class="main-copy">

                    <h1 class="plain">Benefits of Belief School</h1>

                    <div class="content-block">
                        {{-- <div class="col"> --}}
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolvore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                            <blockquote>
                                Pariatur excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia. Deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.
                            </blockquote>
                            <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi</p>
                      {{--   </div>
                        <div class="col"> --}}
                            <p>forem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                            <p class="mini-quote">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>

                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed.</p>
                        {{-- </div> --}}
                    </div>
                    <div class="dots"></div>
                </div>

                <div class="terms-container">
                    <h1 class="plain">Further Details</h1>
                    <p>
                    Our <a href="{{route('privacy-terms') }}">Terms &amp; Conditions</a> and <a href="{{route('privacy-terms') }}">Privacy Policy</a> are important to us and you! Please take the time to review the information.</p>
                </div>

            </div>
        </div>
    </div>

@endsection