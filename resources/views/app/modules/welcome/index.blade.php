@extends('app/layout')

@section('content')
    <div class="module welcome-module" data-skip="{{Input::get('skip', false) ? 1 : 0}}" data-step="{{ ($moduleUser ? $moduleUser->step : 0) }}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1" data-step="0">
            @include('app/modules/welcome/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/welcome/intro-video')
        </section>

        <section class="text-welcome module-section has-container has-text" data-type="TextWelcome" data-part="3" data-submit-step="0">
            @include('app/modules/welcome/part-1')
        </section>
        <section class="congrats-section module-section has-container" data-type="WelcomeCongrats" data-part="4" data-step="1">
            @include('app/modules/welcome/part-2')
        </section>
    </div>
@endsection