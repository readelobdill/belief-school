@extends('app/layout')

@section('content')
    <div class="module home-module" data-part="{{Input::get('part', 1)}}">
        <section class="background-video module-section" data-type="Intro" data-part="1">
            @include('app/home/background-video')
        </section>

        <section class="intro-video module-section has-container" data-type="Video" data-part="2">
            @include('app/home/intro-video')
        </section>

        <section class="account-creation module-section has-container" data-type="AccountCreation" data-part="3">
            @include('app/home/account-creation')
        </section>
        <section class="questions module-section has-container" data-type="Questions" data-part="4">
            @include('app/home/questions')
        </section>
        <section class="details module-section has-container has-text" data-type="Text" data-part="5">
            @include('app/home/details')
        </section>
    </div>
@endsection