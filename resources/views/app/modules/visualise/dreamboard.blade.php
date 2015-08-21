<div class="inner">
    <div class="content">
        <h1 class="title">
            Beautiful<br>
            you
        </h1>

        <div class="board">
            <div class="row-4">
                <div class="col">
                    @include('app.modules.visualise.image', ['imageName' => 'image_1'])
                    @include('app.modules.visualise.image', ['imageName' => 'image_2'])
                </div>
                <div class="col">
                    @include('app.modules.visualise.image', ['imageName' => 'image_3'])
                    @include('app.modules.visualise.image', ['imageName' => 'image_4'])
                </div>
            </div>
            <div class="mid-row">
                <div class="col">
                    @include('app.modules.visualise.image', ['imageName' => 'image_5'])
                    @include('app.modules.visualise.image', ['imageName' => 'image_6'])
                </div>
                @include('app.modules.visualise.image', ['imageName' => 'image_main'])
                <div class="col">
                    @include('app.modules.visualise.image', ['imageName' => 'image_7'])
                    @include('app.modules.visualise.image', ['imageName' => 'image_8'])
                </div>
            </div>
            <div class="row-4">
                <div class="col">
                    @include('app.modules.visualise.image', ['imageName' => 'image_9'])
                    @include('app.modules.visualise.image', ['imageName' => 'image_10'])
                </div>
                <div class="col">
                    @include('app.modules.visualise.image', ['imageName' => 'image_11'])
                    @include('app.modules.visualise.image', ['imageName' => 'image_12'])
                </div>
            </div>
        </div>

        <div class="actions">
            <a href="#" class="button {{$moduleUser->data && count(get_object_vars($moduleUser->data)) == 13 ? '' : 'is-disabled'}}" data-save-module>Save to dashboard </a>
        </div>
    </div>
</div>