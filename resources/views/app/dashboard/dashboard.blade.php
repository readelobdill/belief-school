@extends('app/layout')

@section('content')

 <div class="module dash-background">

    <div class="container dashboard-module">
        <div class="inner">
            <div class="content">
                <header>
                    <h1 class="title">
                        Welcome to your<br>
                        Belief School Dashboard
                    </h1>
                    <p class="center">
                        This dashboard is your Manifesto. Track your Belief School journey as you progress through the course and check in regularly.
                    </p>
                    <p class="center">
                        <a class="button small" data-print>Download manifesto</a>
                    </p>
                </header>

                <header role="print">
                    <h1 class="title">
                        This is your <br />Manifesto
                    </h1>
                    <p class="center">
                        This can be the cover page text.
                    </p>
                </header>

                <ul class="module-list">
                    @include('app.dashboard.modules.home', ['home' => $modules[0], 'welcome' => isset($modules[1]) ? $modules[1] : false])
                        @foreach($modules as $key => $mod)
                            @if($mod->slug === 'home' || $mod->slug === 'welcome')
                                <?php continue; ?>
                            @else
                            @if($mod->pivot && $mod->pivot->complete)

                                {{-- Unlocked and completed --}}
                                <li id="module-{{$mod->slug}}" class="module-{{ $mod->slug }} is-unlocked is-complete {{(!isset($modules[$key+1]) || (isset($modules[$key+1]) && (!$modules[$key+1]->pivot || !$modules[$key+1]->pivot->complete)) ? 'is-open' : '')}}" data-type="{{$mod->slug}}">

                                    <div class="header">
                                        <div class="inner">
                                            <h2>Module {{$mod->order - 1}} - {{$mod->name}}</h2>
                                            <ul class="actions">
                                                <li class="forum">
                                                    <a class="forum-icon" href="{{ route('modules.forum', [$mod->slug]) }}">
                                                        <span>Forum</span>
                                                    </a>
                                                </li>
                                                <li class="arrow"></li>
                                            </ul>
                                            <div class="options">
                                                @include('app.dashboard.module-options.'.$mod->slug, ['module' => $mod])
                                            </div>
                                        </div>
                                    </div>

                                    @include('app.dashboard.modules.'.$mod->slug, ['module' => $mod])
                                </li>

                            @elseif($mod->pivot && !$mod->pivot->complete)

                                {{-- Unlocked and started but not finished. --}}
                                <li class="module-{{ $mod->slug }} is-not-complete is-unlocked">
                                    <div class="header is-locked">
                                        <div class="inner">
                                            <h2><a href="{{route('modules.view', [$mod->slug] )}}">Module {{$mod->order - 1}} - {{$mod->name}}</a></h2>
                                            <ul class="actions">
                                                <li class="forum">
                                                    <a class="forum-icon" href="{{ route('modules.forum', [$mod->slug]) }}">
                                                        <span>Forum</span>
                                                    </a>
                                                </li>
                                                <li class="arrow"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            @elseif($modules[$key-1]->pivot && $modules[$key-1]->pivot->complete)
                                @if($modules[$key-1]->pivot->completed_at->diffInHours() < config('belief.lockout'))

                                    {{-- Waiting for unlock --}}
                                    <li class="module-{{ $mod->slug }} is-locked">
                                        <div class="header">
                                            <div class="inner">
                                                <h2>Module {{$mod->order - 1}}</h2>
                                            </div>
                                            <ul class="actions">
                                                <li class="unlock-countdown">
                                                    <div class="inner">
                                                        Module will unlock in {{config('belief.lockout') - $modules[$key-1]->pivot->completed_at->diffInHours()}} hours
                                                    </div>
                                                </li>
                                                <li class="arrow"></li>
                                            </ul>
                                        </div>
                                    </li>

                                @else

                                    {{-- Unlocked but not started--}}
                                    <li class="module-{{ $mod->slug }} is-not-complete is-unlocked">
                                        <div class="header is-locked">
                                            <div class="inner">
                                                <h2><a href="{{route('modules.view', [$mod->slug] )}}">Module {{$mod->order - 1}} - {{$mod->name}}</a></h2>

                                                <ul class="actions">
                                                    <li class="forum">
                                                        <a class="forum-icon" href="{{ route('modules.forum', [$mod->slug]) }}">
                                                            <span>Forum</span>
                                                        </a>
                                                    </li>
                                                    <li class="arrow"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                @endif
                            @else

                                {{-- Locked --}}
                                <li class="module-{{ $mod->slug }} is-locked">
                                    <div class="header">
                                        <div class="inner">
                                            <h2>Module {{$mod->order - 1}}</h2>

                                            <ul class="actions">
                                                <li class="unlock-countdown">
                                                    <div class="inner"></div>
                                                </li>
                                                <li class="arrow"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            @endif

                        @endif
                    @endforeach
                </ul>

                <div class="end-page" role="print">
                    <h1 class="title">
                        End
                    </h1>
                    <p class="center">
                        This is the end page text.
                    </p>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection