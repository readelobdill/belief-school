@if(!empty($module))
    <div class="indicator">
        <a class="forum-icon" href="{{ route('modules.forum', [$module->slug]) }}">
            @include('app/partials/icons/forum')
            <span>Forums</span>
        </a>
        <div class="module-icon page-icon module-{{$module->slug}}">

        </div>
    </div>
@endif