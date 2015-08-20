@extends('app.layout')

@section('content')
    <div class="container forums">
        <div class="inner">
            <div class="forum-navigator">
                <h2>Forum</h2>
                <ul class="links">
                    <li class="module">
                        <a href="{{route('modules.view', [$module->slug])}}">Module {{$module->order - 1}} - {{$module->name}}</a>
                    </li>
                    <li class="dashboard">
                        <a href="{{route('dashboard')}}">Dashboard</a>
                    </li>
                </ul>
            </div>

            <header>
                <h1 class="plain">Welcome to the Know Your Amazing Self Forum</h1>
                <p class="center">Get and give support in our friendly community environment, <strong>Feel free to share how you are feeling, challenges your faced and how you overcame them.</strong> This community is secure and only accessible to Paula Gosney and other people taking a journey... just like you.</p>

                <div class="dots"></div>
            </header>

            <section class="forum-section has-container module-section">
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
    </div>
@endsection
