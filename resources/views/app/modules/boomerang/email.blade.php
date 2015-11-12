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

        <p>{{Auth::user()->first_name}} is completing an online program called Belief School. It is a personal development program helping {{$requiredModules['home']->data->{'1'}->gender === 'male' ? 'him' : 'her'}} build belief in {{$requiredModules['home']->data->{'1'}->gender === 'male' ? 'himself' : 'herself'}}. No, this is not spam, please text if you need to check.</p>


        <p>Your friend has stepped out of {{$requiredModules['home']->data->{'1'}->gender === 'male' ? 'his' : 'her'}} comfort zone and sent you this email because {{$requiredModules['home']->data->{'1'}->gender === 'male' ? 'he' : 'she'}} values your opinion and trusts that you will answer the simple question honestly and with {{$requiredModules['home']->data->{'1'}->gender === 'male' ? 'his' : 'her'}}  best interest at heart.</p>


        <p>Clicking on the link will take you to a page on our Belief School website, you’ll be asked to input three words that describe {{Auth::user()->first_name}}'s best qualities. The answers will be delivered to {{Auth::user()->first_name}} anonymously, mixed up with responses from friends, family and colleagues.</p>


        <p>This will only take one minute yet will have a BIG impact. Thanks for taking the time, it really does make a difference.</p>

        <p>Best regards <br /> Belief School</p>
    </div>
</div>