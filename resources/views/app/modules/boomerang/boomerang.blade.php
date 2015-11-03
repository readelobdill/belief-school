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

        <div class="email-client">
            <div class="header">
                <div class="close"></div>
                <div class="minimize"></div>
                <div class="maxamize"></div>
            </div>
            <div class="details">
                <div class="details-row">To</div>
                <div class="cc-row">Cc</div>
                <div class="subject-row">Subject</div>
            </div>
            <div class="message">
                <p>Dear Friend,</p>

                <p>{{Auth::user()->first_name}} is completing an online program called Belief School. It is a personal development program helping him/her build belief in themselves. No, this is not spam, please text if you need to check.</p>

                <p>Your friend has stepped out of his/her comfort zone and sent you this email because they value your opinion and trust that you will answer the simple question honestly and with their best interest at heart.</p>

                <p>Clicking on the link will take you to a page on our Belief School website, you’ll be asked to input three words that describe {{Auth::user()->first_name}}'s best qualities. The answers will be delivered to {{Auth::user()->first_name}} anonymously, mixed up with responses from friends, family and colleagues.</p>

                <p>This will only take 1 minute yet will have a BIG impact. Thanks for taking the time, it really does make a difference.</p>

                <p>Best regards <br /> Belief School</p>
            </div>
        </div>

        <div class="actions">
            <a href="mailto:?subject=A%20request%20from%20your%20friend&body={{rawurlencode(view('emails.boomerang',['user' => Auth::user()])->render() . "\n\n" . route('tagcloud', [$moduleUser->secret]))}}" class="button" data-update-module>Click here to open the email template</a>
        </div>

        <h2 class="title">Go on, be brave and send the emails.</h2>

        <p>Nothing terrible is going to happen, people will either respond or they won’t. The world will not end and your arm will not fall off. You can do this.
        </p>

    </div>
</div>