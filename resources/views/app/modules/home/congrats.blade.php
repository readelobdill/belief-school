<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <h1 class="plain">
               Congratulations for choosing to invest time and money in your personal development.
            </h1>
            <p>We are excited for you, and inspired by you!</p>
            <div class="actions">
                <a href="{{route('modules.view', ['welcome'])}}" class="button">Let's get started</a>
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
            {{-- <div class="dots"></div>
            <div class="actions">
                <a href="#" class="button is-locked">What's next?</a>
            </div> --}}
        </div>
    </div>
</div>