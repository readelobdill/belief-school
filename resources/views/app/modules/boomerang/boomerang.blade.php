<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>

        <p>How we see ourselves is not always accurate. We are often hard on ourselves, focusing on our short comings, not celebrating the beautiful qualities others see in us. If we are unaware of our strengths, we miss the opportunity to play to them in the pursuit of happiness and success.</p>

        <p>
            <strong>“When I did this exercise many years ago it changed my life. Having the courage to be vulnerable, I was given the most wonderful gift.”</strong> <br>
            – Paula Gosney
        </p>

        <blockquote>
            To know your amazing self, you need to know the beautiful qualities others see in you.
        </blockquote>

        <div class="dots"></div>

        <h1 class="plain">Your Task</h1>

        <p>Send the email below to as wide a group of people as possible. Aim for 25. They can be friends, family, team mates or work colleagues. They don’t all need to be your best buddies, just good people.</p>

        <p>(Don't worry, you can edit the email to say whatever you want, although we’re pretty good at this and have chosen these words carefully to create the best outcome for you.)</p>

         <p><b><i>Send this email individually if you’d prefer.</i></b></p>


        @include('app.modules.'.$module->template.'.email')


        <div class="actions">
            <a href="mailto:?subject=A%20request%20from%20your%20friend&body={{rawurlencode(view('emails.boomerang',['user' => Auth::user(), 'gender' => $requiredModules['home']->data->{'1'}->gender])->render() . "\n\n" . route('tagcloud', [$moduleUser->secret]))}}" class="button" data-update-module>Click here to open the email template</a>
        </div>

        <h2 class="title">Go on, be brave and send the emails.</h2>

        <p>Nothing terrible is going to happen, people will either respond or they won’t. The world will not end and your arm will not fall off. You can do this.
        </p>

    </div>
</div>