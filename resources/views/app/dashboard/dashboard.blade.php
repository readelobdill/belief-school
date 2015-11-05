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
                        Your dashboard tracks your Belief School journey as you progress through the course, check in regularly to enjoy the great work you are doing.
                    </p>
                    <p class="center">
                        The content of the dashboard becomes your manifesto. At the completion of Belief School you will be able to download it and cherish this beautiful reminder of your journey.
                    </p>
                    <p class="center">
                        <a class="button small {{$modules->last()->pivot && $modules->last()->pivot->complete ? '' : 'is-disabled'}}" {{$modules->last()->pivot && $modules->last()->pivot->complete ? 'data-print' : ''}}>Download manifesto</a>
                    </p>
                </header>

                <div role="print" class="manifesto-cover"></div>

                <ul class="module-list">
                    @include('app.dashboard.modules.home', ['home' => $modules[0], 'welcome' => isset($modules[1]) ? $modules[1] : false])
                        @foreach($modules as $key => $mod)
                            @if($mod->template === 'home' || $mod->template === 'welcome')
                                <?php continue; ?>
                            @else
                            @if($mod->pivot && $mod->pivot->complete)

                                {{-- Unlocked and completed --}}
                                <li id="module-{{$mod->slug}}" class="module-{{ $mod->template }} is-unlocked is-complete {{(!isset($modules[$key+1]) || (isset($modules[$key+1]) && (!$modules[$key+1]->pivot || !$modules[$key+1]->pivot->complete)) ? 'is-open' : '')}}" data-type="{{$mod->template}}">

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
                                                @include('app.dashboard.module-options.'.$mod->template, ['module' => $mod])
                                            </div>
                                        </div>
                                    </div>

                                    @include('app.dashboard.modules.'.$mod->template, ['module' => $mod, 'style' => 'web'])
                                </li>

                            @elseif($mod->pivot && !$mod->pivot->complete)
                                {{-- Unlocked and started but not finished. --}}
                                <li class="module-{{ $mod->template }} is-not-complete is-unlocked">
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
                                @if($modules[$key-1]->pivot->created_at->diffInHours() < config('belief.lockout'))

                                    {{-- Waiting for unlock --}}
                                    <li class="module-{{ $mod->template }} is-locked">
                                        <div class="header">
                                            <div class="inner">
                                                <h2>Module {{$mod->order - 1}}</h2>

                                                <ul class="actions">
                                                    <li class="unlock-countdown">Module will unlock in {{$modules[$key-1]->pivot->created_at->addHours(config('belief.lockout'))->diffForHumans(null, true)}}</li>
                                                    <li class="arrow"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>

                                @else

                                    {{-- Unlocked but not started--}}
                                    <li class="module-{{ $mod->template }} is-not-complete is-unlocked">
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
                                <li class="module-{{ $mod->template }} is-locked">
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

                <div class="end-page" role="print"></div>
            </div>
        </div>
    </div>
</div>
@endsection
