<aside class="menu">
    <nav class="navigation">
        <h2>Navigation</h2>
        <ul>
            <li class="ico-intro"><a href="">Introduction</a></li>
            @if(Auth::check())
                <li class="ico-account"><a href="{{route('account')}}">Your account</a></li>
            @endif
            <li class="ico-about"><a href="">About Belief School</a></li>
            <li class="ico-contact"><a href="">Contact us</a></li>
            @if(Auth::check())
                <li class="ico-dash"><a href="{{route('dashboard')}}">Dashboard</a></li>
            @endif
        </ul>
    </nav>
    <nav class="modules-navigation">
        <h2>Modules</h2>
        <ul>
            @foreach($modules as $key => $module)
                @if($module->slug === 'home' || $module->isUnlocked($modules[$key-1]))
                    <li class="ico-mod{{ ( $module->slug === 'home' ?  1 : $module->order-1) }}">
                        <a  href="{{route('modules.view', [$module->slug])}}">{{$module->name}}</a>
                    </li>
                @else
                    <li class="{{(Auth::check() && Auth::user()->paid ? 'ico-unlocked' : 'ico-locked')}}">
                        Module {{$module->order - 1}}
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</aside>