<div class="inner">
    <div class="content">
        <h1 class="title">
            Are you<br>
            Male/Female?
        </h1>
        <div class="controls">
            <form data-validate >
                <input type="radio" name="gender" value="female" id="female-choice" required data-parsley-trigger="change" {{ isset($moduleUser) && isset($moduleUser->data->{'1'}) && $moduleUser->data->{'1'}->{'gender'} === 'female' ? 'checked' : '' }}>
                <label for="female-choice">
                    <span>Female</span>
                </label>

                <input type="radio" name="gender" value="male" id="male-choice" required data-parsley-trigger="change" {{ isset($moduleUser) && isset($moduleUser->data->{'1'}) && $moduleUser->data->{'1'}->{'gender'} === 'male' ? 'checked' : '' }}>
                <label for="male-choice">
                    <span>Male</span>
                </label>
            </form>
        </div>
        <div class="next-question absol down-arrow">
            @include('app/partials/icons/down-arrow')
        </div>
    </div>
</div>

