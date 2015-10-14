@extends('app.public-layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
            <div class="content">
                <header>
                    <h1 class="title">
                       Thank you for helping {{$moduleUser->user->first_name}} <br />
                       on [[her/his]] journey
                    </h1>
                    <p class="center"><a href="{{route('about')}}">Want to learn more about Belief School?</a></p>
                </header>
            </div>
        </div>
    </div>
@endsection