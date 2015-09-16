<div class="inner">
        <div class="pre-complete congrats-container">
            <div class="inner">
                <h1 class="plain">
                    You Rock Star!<br>
                    Asking for feedback takes courage.<br>
                    When we act courageously we create possibilities.
                </h1>

                <p class="annotation">Having trouble opening the email template?<br />
                    Copy and paste the recommended copy and this link into your own email and send.<br />
                    <strong>{{route('tagcloud', [$moduleUser->secret])}}</strong>
                </p>

                <p>As your responses come in they will appear on your <a href="{{route('dashboard')}}">Dashboard</a>, building a wonderful picture of the greatness others see in you.</p>
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
                    Keep an eye on your <a href="{{route('dashboard')}}#module-{{$module->slug}}">Dashboard</a> to see the responses.
                </p> 
                <p>
                    Chat in the <a href="{{route('modules.forum',[$module->slug])}}">Forum</a> about how that felt, maybe encourage someone else to take this first step.
                </p>
                {{-- <div class="dots"></div>
                <div class="actions">
                    <a href="#" class="button is-locked">What's next?</a>
                </div> --}}
            </div>
        </div>
</div>