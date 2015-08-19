<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>

        <p>Over the last 7 weeks you will have started to learn how <strong>truly amazing you are!</strong></p>
        <p>Now I want you to write yourself a letter<span class="plain">or</span> record a video from you to you.</p>

        <p>This Video is going to be very private and very special. There is not to be one negative word in this, not one, but or maybe, not one little self-put down, it is to cover the following:</p>

        <div class="video-details">
            <div class="detail">
                <span class="number">1 .</span>
                <p>
                    You are to tell yourself all the things you love about yourself, the qualities that you are most proud of.
                </p>
            </div>
            <div class="detail">
                <span class="number">2 .</span>
                <p>
                    You are to talk about your vision, the life you dream of, the things you want in your life and how they are going to make you feel when you have them.
                </p>
            </div>
            <div class="detail">
                <span class="number">3 .</span>
                <p>
                    You are going to end it by telling yourself that you believe in you!
                </p>
            </div>
        </div>

        <p class="center margin-top">
            <a href="{{route('modules.forum',[$module->slug])}}" target="_blank" class="button small-dashboard">Need help?</a>
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
            <a href="" class="button" data-save-module>Save to dashboard</a>
        </div>

    </div>
</div>