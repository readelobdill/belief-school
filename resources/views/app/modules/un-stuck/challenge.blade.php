<div class="inner">
    <div class="content">
        <h1 class="title">
            Get Un-Stuck
        </h1>

        <p>
            When you first came through Belief School you identified the reason why you did not have the one thing you wanted in your life right now .
        </p>

        <blockquote>
            This was <em>“{{ $requiredModule->data->{'1'}->why_not }}”</em>
        </blockquote>

        <p class="bold">
            It doesn’t matter what that answer was, it is either not true or an obstacle that can be overcome.
        </p>

        <p>
            Whatever those limiting beliefs are we are going to show you how to turn that negative chatter off and start to control the programing that is going on in your mind so it serves you rather than keeps you stuck.
        </p>

        <div class="dots"></div>

        <h1 class="title">
            I am
        </h1>

        <p class="center">
            Write out below three limiting beliefs you have. The ones you are always playing over and over in your mind.
        </p>

        <form action="" class="limiting-beliefs">
            <div class="beliefs">
                <div class="belief">
                    <textarea name="challenge-1" id="belief-1" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="belief-1">1 .</label>
                </div>
                <div class="belief">
                    <textarea name="challenge-2" id="belief-2" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="belief-2">2 .</label>
                </div>
                <div class="belief">
                    <textarea name="challenge-3" id="belief-3" required maxlength="140"></textarea>
                    <button class="icon" type="button" tabindex="-1">
                        @include('app/partials/icons/edit')
                        @include('app/partials/icons/tick')
                    </button>
                    <label class="number" for="belief-3">3 .</label>
                </div>
            </div>
            <div class="actions">
                <button type="submit" class="down-arrow">
                    @include('app/partials/icons/down-arrow')
                </button>
            </div>
        </form>


    </div>
</div>