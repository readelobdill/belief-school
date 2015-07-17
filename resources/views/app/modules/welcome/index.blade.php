@extends('app/layout')

@section('content')
    <div class="module welcome-module" data-part="{{Input::get('part', 1)}}">
        <section class="background-video module-section" data-type="Intro" data-part="1">
            @include('app/modules/welcome/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/modules/welcome/intro-video')
        </section>

        <section class="text-welcome module-section has-container has-text" data-type="TextWelcome" data-part="3">
            @include('app/modules/welcome/part-1')
        </section>
        <section class="congrats-section module-section has-container" data-type="Congrats" data-part="4">
            @include('app/modules/welcome/part-2')
        </section>
    </div>
@endsection