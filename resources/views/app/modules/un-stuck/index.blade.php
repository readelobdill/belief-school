@extends('app/layout')

@section('content')
    <div class="module un-stuck-module" data-part="{{Input::get('part', 1)}}" data-update-url="{{route('modules.update', [$module->slug])}}" data-complete-url="{{route('modules.complete', [$module->slug])}}">
        <section class="background-video module-section" data-type="Intro" data-part="1">
            @include('app/modules/un-stuck/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/un-stuck/intro-video')
        </section>

        <section class="i-am module-section has-container has-text" data-type="Challenge" data-part="3">
            @include('app/modules/un-stuck/challenge')
        </section>
        <section class="affirmations module-section has-container has-text" data-type="Response" data-part="4">
            @include('app/modules/un-stuck/response')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4">
            @include('app/modules/un-stuck/congrats')
        </section>
    </div>
@endsection