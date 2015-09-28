<div class="inner">
    <div class="content">
        <h1 class="title module-page-title">
           <span data-arc="100">&middot; Module {{$module->order -1}}  &middot;</span>
            {{ $module->name }}
        </h1>

        <p>This is one of our favourite exercises in Belief School. It’s all about taking the time to see and appreciate what you already have in your life. To focus on the love and support you have around you.</p>
        <p>The task for this week is to create a visual display, past and present. People who lift you up and love you unconditionally. Things that inspire you and remind you of the richness in your life.</p>
        <p>Your task for this module is to fill the template with images from the three categories below. When this is complete you will have a digital collage that will fill you with joy, helping you focused on the love around you and the value you bring to this world.</p>

        <h1 class="plain">I Am Enough</h1>

        <p class="center"><b>The centre image is a picture of you.</b></p>
        <p>Think of time when you felt so sure of who you were, you were excited and certain about your life. You’ll know the image when you see it, as you’ll get that great feeling inside. It doesn’t matter if you are 15 or 55, and it certainly doesn’t matter whether it is a perfect shot, it is about the feelings this image creates for you.</p>

        <ul class="accordion single">
            <li>
                <h2>
                    Struggling to find a photo?
                    <div class="toggle">
                        @include('app/partials/icons/collapse')
                        @include('app/partials/icons/expand')
                    </div>
                </h2>
                <div class="answer">
                    <p>If you really can’t find a photo you feel captures your true heart, take one this week. </p>
                    <p>Before you do, fill your heart with happiness, wonder and excitement – sing, dance, walk down memory lane; whatever it takes for you to see yourself shinning in your eyes.</p>
                </div>
            </li>
        </ul>

        <h1 class="plain">Create</h2>

        <p>Creating a visual board that celebrates you is a BIG part of building your belief in yourself, so invest the time. Find images from these three categories.</p>

        <div class="categories">
            <div class="category">
                <i>
                    @include('app/partials/icons/mod-3-cat-1')
                </i>
                <h3>The love around you</h3>
                <p>
                    Pictures of people (and pets) that you love dearly in this world and who love you. These people may have passed but still give you a profound sense of acceptance and love. Look for photographs that reflect these feelings, maybe a special time, a look or smile.
                </p>
            </div>
            <div class="category">
                <i>
                    @include('app/partials/icons/mod-3-cat-2')
                </i>
                <h3>Your life so far</h3>
                <p>
                    Pictures of things you have achieved that make you feel proud or remind you of a very special time. Maybe take a photo of a uni degree, a love letter, a memento. Things that give you a feeling of pride, personal accomplishment and self-love.
                </p>
            </div>
            <div class="category">
                <i>
                    @include('app/partials/icons/mod-3-cat-3')
                </i>
                <h3>What Inspires</h3>
                <p>
                    Pictures of people or things that inspire you deeply. Anything that pulls you forward in a significant emotional way. A word of caution, do not add things that you want, if when you look at them you think about “not having” them. These images must inspire!
                </p>
            </div>
        </div>

        <p class="center"><b>This digital collage is for you, do not for one second take into account what others may think. Do not edit your image selection for anyone.</b></p>
        <p class="center"><b>This is your journey.</b></p>

        <p class="call-to-action">
            Start uploading images
        </p>
        <div class="actions">
            <div class="down-arrow" data-next-section >
                @include('app/partials/icons/down-arrow')
            </div>
        </div>


    </div>
</div>