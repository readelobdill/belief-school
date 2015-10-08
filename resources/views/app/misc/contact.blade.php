
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

                <h1 class="plain">Need some help?</h1>

                <p>If you have any questions or concerns about Belief School, or you want to tell us about your amazing Belief School journey please email us. There are no silly question and all your stories are appreciated. We read every message and will do our best to respond within 48 hours. </p>

                <div class="get-in-contact">
                    <div class="content-block">

                            <p class="center">
                                <b>Get in touch with us here: </b> <br />
                                <a href="mailto:paula@beliefschool.com">paula@beliefschool.com</a>
                            </p>

                            <p class="center">
                                <b>Registered office/address for service : </b> <br />
                                Belief School Limited<br />
                                c/o Deloitte <br />
                                18 Anzac Street, Suite 2, Level 2 <br />
                                Takapuna <br />
                                Auckland, 0622 <br />
                                New Zealand
                            </p>





                    </div>
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