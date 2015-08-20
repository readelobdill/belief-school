@extends('app.public-layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
            <header>
                <h1 class="title">
                    Write a few words about {{$moduleUser->user->first_name}}
                </h1>
            </header>

            <section class="tag-cloud">
                <div class="inner">
                    <div class="content">
                        Thank you
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection