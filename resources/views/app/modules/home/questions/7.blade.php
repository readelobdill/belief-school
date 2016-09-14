<div class="inner">
    <div class="content">
        <h1 class="title">
            Why don't you have it?
        </h1>

        <p>Don't over think this too much; what is the first thing that popped into your head when you read the question? Come on, be honest—no one is watching. That first thought is often at the heart of what is holding you back.</p>

        <p>If you are not sure, scribble some ideas down, be brutal with yourself; self-awareness is an essential step towards creating change.</p>

        <div class="controls">
            <form action="" data-validate>
                <div class="form-row">
                    <textarea name="why_not" id="why_not" cols="30" rows="10" required maxlength="140">{{ isset($moduleUser) && isset($moduleUser->data->{'1'}) ? $moduleUser->data->{'1'}->{'why_not'} : '' }}</textarea>
                </div>
            </form>
        </div>
        <div class="next-question absol down-arrow">
            @include('app/partials/icons/down-arrow')
        </div>
    </div>
</div>