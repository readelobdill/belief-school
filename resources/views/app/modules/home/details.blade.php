<div class="inner">
    <div class="content">
       <h1 class="title">
           <span data-arc="150">&middot; Whatever the reason &middot;</span>
           We don't<br>
           believe you
       </h1>

        <p>We hear you, we just know you are more creative, stronger and resilient than you allow yourself to believe.</p>

        <p>You can be, do, have anything in this one precious life. The only thing standing between you and your heart’s desire is your belief in yourself.</p>

        <p>We can almost guarantee what you answered to the last question, is an obstacle (we’re not saying it’s not real) but we are pretty sure it can be overcome or, through a better understanding of yourself—changed.</p>

        <blockquote>
            Personal development is an investment in your future. Unlock your potential; you are enough and you are worth it!
        </blockquote>
    </div>



    @if(isset($options['tutored_sessions_enabled']) && $options['tutored_sessions_enabled']->value === '1')
        <div class="course-container-heading">Which program is right for you?</div>
        <div class="course-container {{isset($options['tutored_sessions_enabled']) && $options['tutored_sessions_enabled']->value === '0' ? 'hidden' : ''}}">
            <div class="course-container__column">
                <h5 class="course-container__title">Belief School Automated</h5>

                <ul>
                    <li>Full Access to Belief School’s beautifully crafted program. Eight interactive modules and exercise</li>
                    <li>A self discipline exercise, helping you build your inner strength</li>
                    <li>Unlock and download your Belief School Manifesto on completion of the course</li>
                    <li>Access to the Belief School Community Forum</li>
                    <li>This is the perfect program for those who like to go at their own pace</li>
                </ul>
                <div class="actions">
                    <a href="{{route('payment',[App\Models\User::NORMAL])}}" class="button">Start Belief School</a>
                </div>
            </div>
            <div class="course-container__column">
                <h5 class="course-container__title">Belief School Coached</h5>
                <ul>
                    <li>Full Access to the entire Belief School automated program</li>
                    <li>Work directly with Paula Gosney</li>
                    <li>Twice weekly live webinars with Paula Gosney. Also recorded and available for you</li>
                    <li>A private Facebook group just for this course</li>
                    <li>Opportunities to connect within the course group</li>
                    <li>Weekly Q&amp;A sessions</li>
                    <li>Additional tools and insights to support your journey</li>
                    <li>A great option for those who like a little more accountability and a deeper understanding of why they do the things they do</li>
                </ul>
                <div class="actions">
                    <a href="{{route('payment', [App\Models\User::COACHED])}}" class="button">Start Belief School Coached</a>
                </div>
            </div>

        </div>
    @endif

    <div class="content">

        <p>Do you want to develop your self-belief?</p>

        <p>Do you want to stop fear making decisions for you?</p>

        <p>Do you want the confidence to create change?</p>

        <div class="actions">
            <a href="{{route('payment', [App\Models\User::NORMAL])}}" class="button" >Yes please enroll me in the Belief School Program</a>
        </div>
   </div>
</div>