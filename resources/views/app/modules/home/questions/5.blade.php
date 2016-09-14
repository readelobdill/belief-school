<div class="inner">
    <div class="content">
        <h1 class="title">Why do you want this?</h1>

        <p>This is important; understanding why you want the things you do, will play a big part in creating them.</p>

        <p>Dig a little deeper, once you have your initial response, ask yourself why and then why again. You may find with this question, that your first thought masks a deeper need.</p>

        <div class="controls">
            <form action="" data-validate>
                <div class="form-row">
                    <textarea name="why" id="why" cols="30" rows="10" maxlength="140" required data-parsley-maxlength="140" data-parsley-minlength="1">{{ isset($moduleUser) && isset($moduleUser->data->{'1'}) ? $moduleUser->data->{'1'}->{'why'} : '' }}</textarea>
                </div>
            </form>
        </div>
    <div class="next-question absol down-arrow">
        @include('app/partials/icons/down-arrow')
    </div>
    </div>
</div>