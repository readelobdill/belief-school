@extends('app/layout')

@section('content')
    <div class="module home-module" data-part="{{Input::get('part', 1)}}">
        <section class="background-video module-section" data-type="Intro" data-part="1">
            @include('app/home/background-video')
        </section>
        <section class="intro-video module-section" data-type="Video" data-part="2">
            @include('app/home/intro-video')
        </section>
        <section class="questions module-section" data-type="Questions" data-part="3">
            @include('app/home/questions')
        </section>
        <section class="details module-section" data-type="Text" data-part="4">
            @include('app/home/details')
        </section>
    </div>
@endsection