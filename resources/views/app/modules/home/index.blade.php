@extends('app/layout')

@section('content')
    <div class="module home-module" data-skip="{{Input::get('skip', false)}}" data-step="{{ ($moduleUser ? $moduleUser->step : 0) }}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1" data-step="0">
            @include('app/modules/home/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/home/intro-video')
        </section>

        <section class="welcome-text module-section has-container has-text" data-type="Text" data-part="3">
            @include('app/modules/home/welcome')
        </section>

        <section class="what-is-bs module-section has-container has-text" data-type="Text" data-part="4">
            @include('app/modules/home/what-is-bs')
        </section>

        <section class="testimonials module-section has-container" data-type="Text" data-part="5">
            @include('app/modules/home/testimonials')
        </section>

        <section class="chatter module-section has-container" data-type="Text" data-part="5">
            @include('app/modules/home/chatter')
        </section>

        <section class="unpacked module-section has-container" data-type="Text" data-part="6">
            @include('app/modules/home/unpacked')
        </section>

        <section class="account-creation module-section has-container" data-type="AccountCreation" data-part="7">
            @include('app/modules/home/account-creation')
        </section>
        <section class="questions module-section has-container" data-type="Questions" data-part="8" data-step="1">
            @include('app/modules/home/questions')
        </section>
        <section class="details module-section has-container has-text" data-type="Payment" data-part="9" data-step="2">
            @include('app/modules/home/details')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4" data-step="3">
            @include('app/modules/home/congrats')
        </section>
    </div>
@endsection