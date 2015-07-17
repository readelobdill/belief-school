@extends('app/layout')

@section('content')
    <div class="module gratitude-module" data-part="{{Input::get('part', 1)}}">
        <section class="background-video module-section" data-type="Intro" data-part="1">
            @include('app/modules/gratitude/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/gratitude/intro-video')
        </section>

        <section class="i-am module-section has-container has-text" data-type="Text" data-part="3">
            @include('app/modules/gratitude/challenge')
        </section>
        <section class="affirmations module-section has-container has-text" data-type="Text" data-part="4">
            @include('app/modules/gratitude/response')
        </section>
    </div>
@endsection