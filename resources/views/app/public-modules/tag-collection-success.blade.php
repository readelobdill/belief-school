@extends('app.public-layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
            <header>
                <h1 class="title">
                   Thank you for sharing <br /> your love for {{$moduleUser->user->first_name}}
                </h1>
            </header>
        </div>
    </div>
@endsection