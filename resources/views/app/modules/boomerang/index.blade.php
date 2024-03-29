@extends('app/layout')

@section('content')
    <div class="module boomerang-module" data-step="{{ ($moduleUser ? $moduleUser->step : 0) }}" data-is-complete="{{ ($moduleUser ? $moduleUser->complete : 0) }}" data-skip="{{Input::get('skip', false) ? 1 : 0}}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1" data-step="0">
            @include('app/modules/boomerang/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/boomerang/intro-video')
        </section>

        <section class="boomerang module-section has-container has-text" data-type="Boomerang" data-part="3" data-submit-step="0">
            @include('app/modules/boomerang/boomerang')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4" data-step="1">
            @include('app/modules/boomerang/congrats')
        </section>
    </div>
@endsection