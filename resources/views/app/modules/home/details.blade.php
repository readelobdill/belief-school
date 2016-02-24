<div class="inner">
    <div class="content">
       <h1 class="title">
           <span data-arc="150">&middot; Whatever the reason &middot;</span>
           We don't<br>
           believe you
       </h1>

        <p>You can be, do, have anything in this one precious life. The only thing standing between you and your heart’s desire is your belief in yourself.</p>

        <p>We can almost guarantee what you answered to the last question, is an obstacle (we’re not saying it’s not real) but we are pretty sure it can be overcome or, through a better understanding of yourself – changed.</p>

        <blockquote>
            Are you interested in laying down a foundation of self-belief to create the outcomes you want in your life?
        </blockquote>

    </div>

    <div class="course-container {{isset($options['tutored_sessions_enabled']) && $options['tutored_sessions_enabled']->value === '0' ? 'hidden' : ''}}">
        <div class="course-container__column">
            <h5 class="course-container__title">Belief School</h5>

            <ul>
                <li>Full Access to Belief School</li>
                <li>Self-discipline exercises</li>
                <li>Unlock a Belief School Manifesto on completion of the course</li>
                <li>Access to the Belief School Community Forum</li>
            </ul>
            <div class="actions">
                <a href="{{route('payment',[App\Models\User::NORMAL])}}" class="button">Start Belief School</a>
            </div>
        </div>
        @if(isset($options['tutored_sessions_enabled']) && $options['tutored_sessions_enabled']->value === '1')
        <div class="course-container__column">
            <h5 class="course-container__title">Belief School Coached</h5>
            <ul>
                <li>Work with Paula Gosney</li>
                <li>Twice weekly live webinars with Paula Gosney</li>
                <li>Closed community Facebook group</li>
                <li>Weekly Q&amp;A sessions</li>
                <li>Additional tools and insights to support your journey</li>
            </ul>
            <div class="actions">
                <a href="{{route('payment', [App\Models\User::COACHED])}}" class="button">Belief School Coached</a>
            </div>
        </div>
        @endif
    </div>

    <div class="content">

        <p>You can buy a gazillion programs, sign up the best coaches in the world, even win Lotto but, if you don’t believe in yourself and your self-worth, your life will stay the same.</p>

        <div class="actions">
            <a href="{{ route('about') }}" class="button small">Do you need to know more before you say yes?</a>
        </div>
   </div>
</div>