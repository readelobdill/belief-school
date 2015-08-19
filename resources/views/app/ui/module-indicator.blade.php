@if(!empty($module))
    <div class="indicator">
        @if($page === 'forum')
            <a class="forum-icon" href="{{ route('modules.view', [$module->slug]) }}">
                <span>Module</span>
            </a>
        @else
            <a class="forum-icon" href="{{ route('modules.forum', [$module->slug]) }}">
                @include('app/partials/icons/forum')
                <span>Forums</span>
            </a>
        @endif

        <div class="module-icon page-icon module-{{$module->slug}}">

        </div>
    </div>
@endif