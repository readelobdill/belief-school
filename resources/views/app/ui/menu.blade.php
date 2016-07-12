<aside class="menu">
    <nav class="navigation">
        <h2>Navigation</h2>
        <ul>
            @if(Auth::check())
                <li class="ico-intro"><a href="" data-remodal-target="introduction" title="Introduction">Introduction</a></li>
            @else
                <li class="ico-intro"><a a href="{{ route('home', ['skip' => 1])}}" title="Introduction">Introduction</a></li>
            @endif
            <li class="ico-dash requires-auth {{(!Auth::check() ? 'is-hidden-g' : '')}}"><a href="{{route('dashboard')}}" title="Dashboard">Dashboard</a></li>
            <li class="ico-account requires-auth {{(!Auth::check() ? 'is-hidden-g' : '')}}"><a href="{{route('account')}}" title="My Account">My account</a></li>
            <li class="ico-about"><a href="{{ route('home', ['skip' => 3])}}" title="Belief School Unpacked">Belief School Unpacked</a></li>
            <li class="ico-about"><a href="{{ route('about-paula-gosney') }}" title="About Paula Gosney">About Paula Gosney</a></li>
            <li class="ico-about"><a href="{{ route('right-for-me')}}" title="Is Belief School Right for me?">Is Belief School Right for me?</a></li>
<!--             <li class="ico-unlocked {{(Auth::check() ? 'is-hidden-g' : '')}}">
                <a href="{{ route('home', ['skip' => 4])}}">Enrol</a>
            </li> -->
            <li class="ico-contact"><a href="{{ route('contact') }}" title="Contact Us">Contact us</a></li>
            <li class="ico-terms"><a href="{{route('privacy-terms') }}" title="Terms of Use/Privacy Policy">Terms of Use/Privacy Policy</a></li>
            <li class="ico-faq requires-auth {{(!Auth::check() ? 'is-hidden-g' : '')}}"><a href="{{route('faq') }}" title="Frequently Asked Questions">FAQ</a></li>
            <li class="ico-unlocked menu-auth-mobile login {{(!Auth::check() ? 'is-hidden-g' : '')}}">
                <a href="{{route('auth.logout')}}">Logout</a>
            </li>
            <li class="ico-locked menu-auth-mobile login {{(Auth::check() ? 'is-hidden-g' : '')}}">
                <a href="{{route('auth.login')}}">Login</a>
            </li>
        </ul>
    </nav>
    <nav class="modules-navigation">
        <h2>Modules</h2>
        <ul>
            @foreach($modules as $key => $module)
                @if($module->template === 'home' || $module->isUnlocked($modules[$key-1]))
                    <li class="ico-{{ ( $module->template) }} {{strpos(Request::path(), $module->slug) ? 'current-module' : ''}}">
                        <a href="{{route('modules.view', [$module->slug])}}">{{$module->name}}</a>
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