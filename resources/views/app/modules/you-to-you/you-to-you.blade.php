<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>
        <h2>Do you know how exceptional you are?</h2>
        <p>We don’t say this lightly. You chose to start Belief School. And, you FINISHED IT.</p>
        <p><strong>Who you have been throughout this program, is all you ever need to be throughout life.</strong></p>
        <p><strong>Brave, dedicated, compassionate and willing to learn.</strong></p>
        <p>You have given yourself a great gift of knowledge and experience. At the beginning of this program we talked about self-discipline, you have shown to yourself that you have the discipline you need to create your best life.</p>
        <p>If you apply this same commitment and willingness to learn, and you take the risks that you have done through each of the Belief School modules, You Can Do Anything.</p>
        <p>Do you get it, this is it. This is what it takes.</p>
        <ul>
            <li>Understanding your <strong>Strengths</strong></li>
            <li>Using <strong>Affirming Words</strong> when you speak about yourself</li>
            <li>Calling on the <strong>Love</strong> and <strong>Resources</strong> around you</li>
            <li>Using <strong>Courage</strong> to not let fear define you</li>
            <li><strong>Contributing</strong> to the world</li>
            <li>Being <strong>Grateful</strong> for all that you have</li>
        </ul>
        <p class="center"><strong>We are so proud of you!</strong></p>
        <p class="center"><strong>And we want you to be proud of yourself.</strong></p>

        <p>Right now you have your last exercise to complete. We want you to do it now while the emotion is high. This is really important so put your heart and soul into it.</p>
        <p>Record a message from you, to you. This does not have to be slick or beautiful. It does have to be heartfelt and real.</p>
        <p>No one ever has to see this if you want to keep this private, so leave nothing out.</p>
        <p>We promise you there are times ahead when this message to yourself will be one of the greatest gifts you give yourself.</p>
        <p>Look into the camera (not the screen) and NO negative self talk at all.</p>
        <p>Tell yourself how much you love you. How much you believe in you. Tell yourself all the things you love about yourself. Celebrate the lovely words people have used to describe you. Tell yourself you are enough and that you can have anything you want in this one precious life.</p>

        <p class="center margin-top">
            <a href="{{route('modules.forum',[$module->slug])}}" target="_blank" class="button small">Need help?</a>
        </p>

        <div class="video">
            <div class="upload">
                <div class="upload-icon">
                    @include('app/partials/icons/upload-video')
                </div>
                Upload your video
                <form action="" class="upload-video">
                    <input type="file" name="video">
                </form>
            </div>
        </div>

        <h1 class="plain">If you can't record it somehow then write a heartfelt letter to yourself:</h1>

        <form action="" class="letter">
            <textarea id="" cols="30" rows="10" name="letter" maxlength="500"></textarea>
        </form>

        <div class="actions">
            <a href="" class="button" data-save-module>Save to dashboard <span class="percentage"></span></a>
        </div>

    </div>
</div>