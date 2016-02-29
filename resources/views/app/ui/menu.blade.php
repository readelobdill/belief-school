<aside class="menu">
    <nav class="navigation">
        <h2>Navigation</h2>
        <ul>
            <li class="ico-intro"><a href="" data-remodal-target="introduction" title="Introduction">Introduction</a></li>
            <li class="ico-dash requires-auth {{(!Auth::check() ? 'is-hidden-g' : '')}}"><a href="{{route('dashboard')}}" title="Dashboard">Dashboard</a></li>
            <li class="ico-account requires-auth {{(!Auth::check() ? 'is-hidden-g' : '')}}"><a href="{{route('account')}}" title="My Account">My account</a></li>
            <li class="ico-about"><a href="{{ route('about') }}" title="About Belief School">About Belief School</a></li>
            <li class="ico-about"><a href="{{ route('about-paula-gosney') }}" title="About Paula Gosney">About Paula Gosney</a></li>
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
                    @if($module->pivot && $module->pivot->complete)
                        <li class="ico-{{ ( $module->template) }} completed-module">
                            {{$module->name}}
                        </li>
                    @else
                        <li class="ico-{{ ( $module->template) }} current-module">
                            <a  href="{{route('modules.view', [$module->slug])}}">{{$module->name}}</a>
                        </li>
                    @endif

               @else
                    <li class="{{(Auth::check() && Auth::user()->paid ? 'ico-unlocked' : 'ico-locked')}}">
                        Module {{$module->order - 1}}
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</aside>