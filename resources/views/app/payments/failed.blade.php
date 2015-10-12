@extends('app.layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
        <header>
            <h2 class="title">[Sorry, your transaction was not succesful]</h2>
        </header>
            <section class="payment-failure">
                <div class="inner">
                    <div class="content">

                        [Your credit card can not be authenticated: 2000 : The Authorisation was Declined by the bank.]
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection