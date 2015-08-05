@extends('app.layout')

@section('content')

    <div class="container dashboard-module">
        <div class="inner">
            <div class="content">
                <header>
                    <h1 class="title">
                        Welcome to your<br>
                        Belief School Dashboard
                    </h1>
                    <p>
                        This dashboard is your Manifesto. Track your Belief School journey as you progress through the course and check in regularly.
                    </p>
                </header>
                <ul class="module-list">
                    @include('app.dashboard.modules.home', ['home' => $modules[0], 'welcome' => isset($modules[1]) ? $modules[1] : false])
                    @foreach($modules as $key => $mod)
                        @if($mod->slug === 'home' || $mod->slug === 'welcome')
                            <?php continue; ?>
                        @else
                            @if($mod->pivot && $mod->pivot->complete)
                                {{--Unlocked and completed--}}
                                <li class="module-{{ $mod->slug }} is-unlocked is-complete" data-type="{{$mod->slug}}">
                                    <div class="header">
                                        <h2>Module {{$mod->order - 1}} - {{$mod->name}}</h2>
                                        <div class="options">
                                            @include('app.dashboard.module-options.'.$mod->slug, ['module' => $mod])
                                        </div>
                                    </div>
                                    @include('app.dashboard.modules.'.$mod->slug, ['module' => $mod])
                                </li>
                            @elseif($mod->pivot && !$mod->pivot->complete)
                                {{--Unlocked and started but not finished.--}}
                                <li class="module-{{ $mod->slug }} is-not-complete is-unlocked">
                                    Module {{$mod->order - 1}} - {{$mod->name}}
                                </li>
                            @elseif($modules[$key-1]->pivot && $modules[$key-1]->pivot->complete)
                                @if($modules[$key-1]->pivot->completed_at->diffInHours() < config('belief.lockout'))
                                    {{-- Waiting for unlock --}}
                                    <li class="module-{{ $mod->slug }} is-locked">
                                        Module {{$mod->order - 1}}
                                        <div class="options">
                                            <span class="unlock-message">
                                                Module will unlock in {{config('belief.lockout') - $modules[$key-1]->pivot->completed_at->diffInHours()}} hours
                                            </span>
                                        </div>
                                    </li>
                                @else
                                    {{-- Unlocked but not started--}}
                                    <li class="module-{{ $mod->slug }} is-not-complete is-unlocked">
                                        Module {{$mod->order - 1}} - {{$mod->name}}
                                    </li>
                                @endif
                            @else
                                {{--Locked--}}
                                <li class="module-{{ $mod->slug }} is-locked">
                                    Module {{$mod->order - 1}}
                                </li>
                            @endif

                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection