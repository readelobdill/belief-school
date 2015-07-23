@extends('app/layout')

@section('content')
    <div class="module you-to-you-module" data-part="{{Input::get('part', 1)}}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1">
            @include('app/modules/you-to-you/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/you-to-you/intro-video')
        </section>

        <section class="you-to-you module-section has-container has-text" data-type="YouToYou" data-part="3">
            @include('app/modules/you-to-you/you-to-you')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4">
            @include('app/modules/you-to-you/congrats')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4">
            @include('app/modules/you-to-you/congrats')
        </section>
    </div>
@endsection