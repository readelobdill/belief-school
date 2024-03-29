@extends('app.layout')

@section('content')
    <div class="container forums">
        <div class="inner">
            <div class="forum-navigator">
                <h2><span>Forum</span></h2>
                <ul class="links">
                    <li class="module">
                        <a href="{{route('modules.view', [$module->slug])}}" title="{{$module->name}}"> Module {{$module->order - 1}} <span>- {{$module->name}}</span></a>
                    </li>
                    <li class="dashboard">
                        <a href="{{route('dashboard')}}" title="Dashboard" title="Dashboard">Dashboard</a>
                    </li>
                </ul>
            </div>

            <header>
                 <h1 class="title">
                    <span data-arc="150">&middot; Welcome to the &middot;</span>
                     @if($module->template == 'welcome')
                         Belief School
                     @else
                         {{$module->name}}
                     @endif

                    <p class="gets">Forum</p>
                </h1>
                <p class="center">Be part of the Belief School Community. Share what you've learnt, your joys and your challenges. This Forum is completely secure and only accessible to those going through the school and the Belief School Support Team.</p>
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
