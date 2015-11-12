Dear Friend,

{{Auth::user()->first_name}} is completing an online program called Belief School. It is a personal development program helping {{isset($gender) && $gender === 'male' ? 'him' : 'her'}} build belief in {{isset($gender) && $gender === 'male' ? 'himself' : 'herself'}}. No, this is not spam, please text if you need to check.


Your friend has stepped out of {{isset($gender) && $gender === 'male' ? 'his' : 'her'}} comfort zone and sent you this email because {{isset($gender) && $gender === 'male' ? 'he' : 'her'}} values your opinion and trusts that you will answer the simple question honestly and with {{isset($gender) && $gender === 'male' ? 'his' : 'her'}} best interest at heart.


Clicking on the link will take you to a page on our Belief School website, you’ll be asked to input three words that describe {{Auth::user()->first_name}}'s best qualities. The answers will be delivered to {{Auth::user()->first_name}} anonymously, mixed up with responses from friends, family and colleagues.


This will only take one minute yet will have a BIG impact. Thanks for taking the time, it really does make a difference.


Best regards
Belief School