@extends('app.public-layout')

@section('content')
    <div class="container non-mod-page">
        <div class="inner">
            <header>
                <h1 class="title">
                   Thank you for writing a words about {{$moduleUser->user->first_name}}
                </h1>
            </header>

            <section class="tag-cloud">
                <div class="inner">
                    <div class="content">
                        It is appreciated.
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection