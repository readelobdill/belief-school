<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">
                    There is no better feeling than the one we get when we make someone else's life better.
                </h1>
                <p>Choose to make this a daily habit.</p>
                <p>You'll have some lovely stories from this module, please share them in the <a href="{{route('modules.view', $module->slug)}}">Forum</a>, they will be a gift for everyone.</p>
                <div class="actions">
                    <a href="#" class="button" data-complete-module>What's next?</a>
                </div>
            </div>
        </div>
    </div>

    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">
                    Congratulations.<br>
                    The world is a better place thanks to you.
                </h1>
                <p>Click through to your <a href="{{route('dashboard')}}#module-{{$module->slug}}">Dashboard</a> to enjoy your journey.</p>

                <p>Your <a href="{{route('modules.view', [$nextModule->slug])}}">next module</a> is ready and waiting for you.</p>
            </div>
        </div>
    </div>
</div>



