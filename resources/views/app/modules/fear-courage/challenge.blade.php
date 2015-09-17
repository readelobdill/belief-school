<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>

        <h2>Courage is our Favourite Word</h2>
        <p>We all feel fear, we’re meant to, sensible fear keeps us safe. But there are two kinds of fear and the other kind is imagined fear. It sucks the fun, the joy and the creativity out of life.</p>
        <blockquote>Facing your fears big or small, day by day, builds your belief in yourself. It is this knee scraping that gives you Depth, Empathy and the ability to Lead Others.</blockquote>
        <p>If your life is ruled by fear you won’t be living up to your true potential. If your choices are based on what others think, or whether you are afraid of success or failure, life will be limited to the small safe zone you occupy.</p>
        <p>Stretching for things that you are not sure you will reach, smashes open your world and creates possibilities.</p>
        <p>We can bang on about facing fear all day, it is meaningless unless we do it. This week is action week. This week you are going to grab a big handful of courage and do some things you’re afraid of.</p>
        <p>Fear is super personal, what is scary for one, is a walk in the park for another. For you it may be picking up the phone, cutting your hair or signing up for a sports event. Or as monumental as forgiving someone who has done you wrong, quitting your job or holding a big hairy spider.</p>
        <p>It doesn’t matter how big or small, the only thing that matters is you have not done these things because of some kind of fear.</p>
        <p>Commit to your three acts of courage in the boxes below.</p>


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
        </form>

        <div class="actions">
            <a href="#" class="button" data-save-module>Save it into your dashboard now!</a>
        </div>


    </div>
</div>