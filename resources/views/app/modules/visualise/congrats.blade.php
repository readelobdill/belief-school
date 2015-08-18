<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <h1 class="plain">
                This is your amazing life!
            </h1>
            <p>Print this out. Frame it. Put it somewhere where you will look at it every day.  Focus on the things that remind you how much value you bring to the world!</p>

            <div class="social">
                <a href="#" class="facebook">@include('app/partials/icons/facebook')Share on Facebook</a>
                <a href="#" class="pinterest">@include('app/partials/icons/pinterest')Share on Pinterest</a>
                <a href="#" class="download">@include('app/partials/icons/download')Download as PDF</a>
            </div>
            <div class="dots"></div>
            <div class="actions">
                <a href="#" class="button" data-complete-module>What's next?</a>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <h1 class="plain">Congratulations you are awesome!</h1>
            <p>Your next module will unlock in 48 Hours.</p>
            <p>
                In the meantime <a href="{{route('dashboard')}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum to find support and chat to others about getting to know your amazing self.</a>
            </p>
        </div>
    </div>
</div>