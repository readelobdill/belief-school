@if(!empty($module))
    <div class="indicator">
        @if($module->order != 0 && $page !== 'forum')
        <div class="arrow arrow--back" data-back>
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="73px" height="80.7px" viewBox="0.5 24.7 73 80.7" style="enable-background:new 0.5 24.7 73 80.7;" xml:space="preserve">
            <path d="M44,31.6c0,0,21.8,21.8,27.6,27.6c0.8,0.8,0.8,2,0,2.8c-1.9,1.9-5.2,5.2-7.1,7.1c-0.8,0.8-2,0.8-2.8,0L44,51.4v51.2
                c0,1.1-0.9,2-2,2c-2.7,0-7.3,0-10,0c-1.1,0-2-0.9-2-2V51.4L12.3,69.1c-0.8,0.8-2,0.8-2.8,0c-1.9-1.9-5.2-5.2-7.1-7.1
                c-0.8-0.8-0.8-2,0-2.8L29,32.6c0,0,4.3-4.3,6.6-6.6c0.8-0.8,2-0.8,2.8,0L44,31.6L44,31.6L44,31.6z"/>
            </svg>
        </div>
        @endif

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

        <div class="module-icon page-icon module-{{$module->template}}">

        </div>
        @if($module->order != 0 && $page !== 'forum')
        <div class="arrow arrow--forward" data-forward>
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 width="73px" height="80.7px" viewBox="0.5 24.7 73 80.7" style="enable-background:new 0.5 24.7 73 80.7;" xml:space="preserve">
            <path d="M30,98.4c0,0-21.8-21.8-27.6-27.6c-0.8-0.8-0.8-2,0-2.8c1.9-1.9,5.2-5.2,7.1-7.1c0.8-0.8,2-0.8,2.8,0L30,78.6V27.4
                c0-1.1,0.9-2,2-2c2.7,0,7.3,0,10,0c1.1,0,2,0.9,2,2v51.2l17.7-17.7c0.8-0.8,2-0.8,2.8,0c1.9,1.9,5.2,5.2,7.1,7.1
                c0.8,0.8,0.8,2,0,2.8L45,97.4c0,0-4.3,4.3-6.6,6.6c-0.8,0.8-2,0.8-2.8,0L30,98.4L30,98.4L30,98.4z"/>
            </svg>
        </div>
        @endif
    </div>
@endif