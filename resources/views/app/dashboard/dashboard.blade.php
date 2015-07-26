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
                    @foreach($modules as $module)
                        @if($module->slug === 'home' || $module->slug === 'welcome')
                            <?php continue; ?>
                        @else
                            @if($module->pivot && $module->pivot->complete)
                                <li class="module-{{ $module->slug }} is-unlocked is-complete" data-type="{{$module->slug}}">
                                    <div class="header">
                                        <h2>Module {{$module->order - 1}} - {{$module->name}}</h2>
                                        <div class="options">
                                            @include('app.dashboard.module-options.'.$module->slug, ['module' => $module])
                                        </div>
                                    </div>
                                    @include('app.dashboard.modules.'.$module->slug, ['module' => $module])
                                </li>
                            @elseif($module->pivot && !$module->pivot->complete)
                                <li class="module-{{ $module->slug }} is-not-complete is-unlocked"></li>
                            @else
                                <li class="module-{{ $module->slug }} is-locked"></li>
                            @endif

                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection