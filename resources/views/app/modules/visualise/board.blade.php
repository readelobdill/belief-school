<h1 class="title">
    Beautiful<br>
    you
</h1>

<div class="board">
    <div class="row-4">
        @include('app.modules.visualise.image', ['imageName' => 'image_1'])
        @include('app.modules.visualise.image', ['imageName' => 'image_2'])
        @include('app.modules.visualise.image', ['imageName' => 'image_3'])
        @include('app.modules.visualise.image', ['imageName' => 'image_4'])
    </div>
    <div class="mid-row">
        <div class="column">
            @include('app.modules.visualise.image', ['imageName' => 'image_5'])
            @include('app.modules.visualise.image', ['imageName' => 'image_6'])
        </div>
        @include('app.modules.visualise.image', ['imageName' => 'image_main'])
        <div class="column">
            @include('app.modules.visualise.image', ['imageName' => 'image_7'])
            @include('app.modules.visualise.image', ['imageName' => 'image_8'])
        </div>
    </div>
    <div class="row-4">
        @include('app.modules.visualise.image', ['imageName' => 'image_9'])
        @include('app.modules.visualise.image', ['imageName' => 'image_10'])
        @include('app.modules.visualise.image', ['imageName' => 'image_11'])
        @include('app.modules.visualise.image', ['imageName' => 'image_12'])
    </div>
    <div class="overlay">

    </div>
    <div class="modal">
        <span class="close">@include('app/partials/icons/close')</span>
        <h1 class="title">
            This is <br>
            your amazing life!
        </h1>
        <p>
            Print this out Frame it. Put it somewhere where you will look at it every day. Focus on the things that remind you how much value you bring to the world!
        </p>
    </div>
</div>