@extends('app/layout')

@section('content')
    <div class="module home-module" data-skip="{{Input::get('skip', false)}}" data-step="{{ ($moduleUser ? $moduleUser->step : 0) }}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1" data-step="0">
            @include('app/modules/home/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="1">
            @include('app/modules/home/intro-video')
        </section>

        <section class="module-section has-container has-text" data-type="Text" data-part="2">
            @include('app/modules/home/welcome')
            @include('app/modules/home/what-is-bs')
            @include('app/modules/home/testimonials')
            @include('app/modules/home/chatter')
        </section>

        <section class="unpacked module-section has-container" data-type="Text" data-part="3">
            @include('app/modules/home/unpacked')
        </section>

        <section class="account-creation module-section has-container" data-type="AccountCreation" data-part="4">
            @include('app/modules/home/acquire-email-payment')
        </section>

        <section class="account-creation module-section has-container" data-type="AccountCreation" data-part="5">
            @include('app/modules/home/account-creation-payment')
        </section>
        <section class="questions module-section has-container" data-type="Questions" data-part="6" data-step="1">
            @include('app/modules/home/questions')
        </section>
        @if(Auth::check() && Auth::user()->paid)
            <section class="congrats-section module-section has-container" data-type="Congrats" data-part="7" data-step="2">
                @include('app/modules/home/congrats')
            </section>
        @else
            <section class="details module-section has-container has-text" data-type="Payment" data-part="8" data-step="2">
                @include('app/modules/home/details')
            </section>
        @endif
    </div>
@endsection