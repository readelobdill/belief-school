@if(!empty($module))
    <div class="indicator">
        <a class="forum-icon" href="#">
            @include('app/partials/icons/forum')
            <span>Forums</span>
        </a>
        <div class="module-icon">
            @include('app/partials/icons/modules/'.$module->slug)
        </div>
    </div>
@endif