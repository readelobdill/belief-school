@if(!empty($module))
    <div class="indicator">
        <a class="forum-icon" href="{{ route('modules.forum', [$module->slug]) }}">
            @include('app/partials/icons/forum')
            <span>Forums</span>
        </a>
        <div class="module-icon">
            @include('app/partials/icons/modules/'.$module->slug)
        </div>
    </div>
@endif