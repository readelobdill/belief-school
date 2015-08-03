@extends('app/layout')

@section('content')
    <div class="module gratitude-module" data-is-complete="{{ ($moduleUser ? $moduleUser->complete : 0) }}" data-part="{{Input::get('part', 1)}}" data-step="{{ ($moduleUser ? $moduleUser->step : 0) }}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1" data-step="0">
            @include('app/modules/gratitude/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/gratitude/intro-video')
        </section>

        <section class="i-am module-section has-container has-text" data-type="Form" data-part="3">
            @include('app/modules/gratitude/challenge')
        </section>
        <section class="affirmations module-section has-container has-text" data-type="Form" data-part="4" data-step="1">
            @include('app/modules/gratitude/response')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4" data-step="2">
            @include('app/modules/gratitude/congrats')
        </section>
    </div>
@endsection