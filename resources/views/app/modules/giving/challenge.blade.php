<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>

        <h2 class="title">The pure joy of giving, <br />expecting nothing in return</h2>

        <p>When we give with no motive, no payback expected, many unseen forces come in to play.</p>

        <p>On a physical level, creating connection with other humans produces oxytocin, our love hormone. It supports growth, reduces stress, induces feelings of optimism and nurtures our self-esteem.</p>

        <p><b>There is no better way to create evidence for yourself of how valuable you are, than by contributing to those around you.</b></p>

        <p>The purpose of this exercise is to help you become aware of how you feel when you give.</p>

        <p>You must be willing to give expecting nothing in return. Do this and you create a ripple effect, and the world gives back in ways you cannot yet see; not always from the person you are helping, but because of who you are being.</p>

        <p>At the core of self-belief is knowing that you matter, that you are needed and appreciated.</p>

        <p>In the spaces below, commit to three acts of kindness or contribution; these must be chosen selflessly, expecting nothing in return. It may be a one-off deed or the beginning of something long term. It can be as simple as taking a meal to a friend, as public as standing on the side of the road collecting for a charity, or as close and personal as spending two hours building Lego with your son.</p>

        <h2 class="title">I commit to these three acts of kindness</h2>

        <form action="" class="limiting-beliefs">
            <div class="beliefs">
                <div class="belief">
                    <textarea name="challenge-1" id="challenge-1" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="challenge-1">1 .</label>
                </div>
                <div class="belief">
                    <textarea name="challenge-2" id="challenge-2" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="challenge-2">2 .</label>
                </div>
                <div class="belief">
                    <textarea name="challenge-3" id="challenge-3" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="challenge-3">3 .</label>
                </div>
            </div>
        </form>
        <div class="are-you-sure">
            <p>Do a quick double check of the content you have created for this module: once you click this button it will permanently save to your Dashboard.</p>
        </div>
        <div class="actions">
            <a href="#" class="button" title="Save it into your dashboard now!" data-save-module>Save it into your dashboard now!</a>
        </div>
    </div>
</div>