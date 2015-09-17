<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>

        <p>
            If you have stuck with this program and played hard out with each of the exercises you will have been on a bit of a roller coaster of emotions. Check your arms and legs, are they still there, no knife wounds, no missing bits!!
        </p>

        <p class="bold">You have now had a taste of the six steps to Self Belief:</p>
        {{-- <blockquote class="multiple"> --}}
            <ol class="multiple-sustain">
                <li>Celebrating your strengths</li>
                <li>Creating self-affirming words – focusing on what you want</li>
                <li>Surrounding yourself with the things that lift you up and draw you forward</li>
                <li>Facing your fears – discovering the power of courage</li>
                <li>Giving more</li>
                <li>Being Grateful</li>
            </ol>
        {{-- </blockquote> --}}

        <div class="dots"></div>

        <p class="center">
            <strong>Throughout your Belief School journey you chose to demonstrate to yourself that you can follow through.</strong>
        </p>

        <blockquote class="center you-chose">
            <span>You chose:</span>
            <em>“{{ $requiredModules['welcome']->data[0]->challenge }}”</em>
        </blockquote>

        <p class="center">
            How did it make you feel to stick with your chosen option throughout your journey?
        </p>

        <form action="">
            <div class="form-row">
                <textarea name="i_felt" placeholder="I felt..." name="feel" required maxlength="280"></textarea>
            </div>
            <div class="actions">
                <button class="button">Save to Dashboard!</button>
            </div>
        </form>
    </div>
</div>