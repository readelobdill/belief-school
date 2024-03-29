@extends('app/layout')

@section('content')
    <div class="module you-to-you-module" data-is-complete="{{ ($moduleUser ? $moduleUser->complete : 0) }}" data-skip="{{Input::get('skip', false) ? 1 : 0}}" data-step="{{ ($moduleUser ? $moduleUser->step : 0) }}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1" data-step="0">
            @include('app/modules/you-to-you/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/you-to-you/intro-video')
        </section>

        <section class="you-to-you module-section has-container has-text" data-type="YouToYou" data-part="3">
            @include('app/modules/you-to-you/you-to-you')
        </section>
        <section class="congrats-section module-section has-container" data-type="FinalCongrats" data-part="4" data-step="1">
            @include('app/modules/you-to-you/congrats')
        </section>
    </div>
@endsection