<div class="inner">
    <div class="pre-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">
                    Some copy about thanks for paying and welcome to belief school
                </h1>
                <p>Lorum</p>
                <div class="actions">
                    <a href="{{route('modules.view', ['welcome'])}}" class="button">Welcome module link</a>
                </div>
            </div>
        </div>
    </div>
    <div class="post-complete congrats-container">
        <div class="inner">
            <div class="content">
                <h1 class="plain">Congratulations you are awesome!</h1>
                <p>Your next module will unlock in 48 Hours.</p>
                <p>
                    In the meantime <a href="{{route('dashboard')}}">keep an eye on your dashboard</a> for the qualities submitted by your friends and <a href="{{route('modules.forum',[$module->slug])}}">check in the forum to find support and chat to others about getting to know your amazing self.</a>
                </p>
            </div>
        </div>
    </div>
</div>