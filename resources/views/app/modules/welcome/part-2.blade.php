<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">
                    Great job! <br>
                    We know you can stick to <span class="resolution">{{isset($moduleUser->data) && isset($moduleUser->data[0]) ? $moduleUser->data[0]->challenge : ''}}.</span>
                    It's part of the journey.
                </h1>
                <div class="actions">
                    <a href="#" class="button" data-complete-module>I'm ready to start Module One</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">You're one step closer!</h1>
                <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
                <p>
                    Also, you can visit your <a href="{{route('dashboard')}}#module-{{$module->slug}}" title="Dashboard">Dashboard</a> anytime to keep up-to-date on your progress.
                </p>
            </div>
        </div>
    </div>
</div>