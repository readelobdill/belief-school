@extends('app.layout')

@section('content')

    <div class="container">
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
                    @include('app.dashboard.modules.home', ['module' => $module])
                    @foreach($modules as $module)
                        @if($module->slug === 'home' || $module->slug === 'welcome')
                            <?php continue; ?>
                        @else
                            <li class="module-{{ $module->slug }}">
                                <div class="header">
                                    <h2>Module {{$module->step + 1}} - {{$module->name}}</h2>
                                    <div class="options">
                                        @include('app.dasboard.module-options.'.$module->slug, ['module' => $module])
                                    </div>
                                </div>
                                @include('app.dashboard.modules.'.$module->slug, ['module' => $module])
                            </li>

                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection