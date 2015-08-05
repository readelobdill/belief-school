@extends('app/layout')

@section('content')
    <div class="module">
        <section class="forum-section has-container module-section has-text">
            <div class="inner">
                <div class="content">
                    @include('app.forum.form')
                    @if($comments->isEmpty())
                        <ul class="comments-list"></ul>
                    @else
                        {!! $commentRenderer->renderAll() !!}
                    @endif

                </div>

            </div>
        </section>
    </div>


@endsection
