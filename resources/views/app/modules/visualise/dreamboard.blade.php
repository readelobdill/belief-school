<div class="inner {{isset($moduleUser->data->background) ? $moduleUser->data->background : 'black'}}">
    <div class="content">
        <!--<form class="image-outline-selector">
          <input type="radio" name="outline-shape" class="rectangle" value="rectangle" checked/>
          <input type="radio" name="outline-shape" class="circle" value="circle"/>
          <input type="radio" name="outline-shape" class="hexagon" value="hexagon"/>
        </form> -->

        <div class="background-image-selector">
            <button class="previous icon-arrow"></button>
            <span>Background</span>
            <button class="next icon-arrow"></button>
        </div>

        <div class="board">
            <div class="row-4">
                @include('app.modules.visualise.image', ['imageName' => 'image_1'])
                @include('app.modules.visualise.image', ['imageName' => 'image_2'])
                @include('app.modules.visualise.image', ['imageName' => 'image_3'])
                @include('app.modules.visualise.image', ['imageName' => 'image_4'])
            </div>
            <div class="mid-row">
                @include('app.modules.visualise.image', ['imageName' => 'image_5'])
                @include('app.modules.visualise.image', ['imageName' => 'image_6'])
                @include('app.modules.visualise.main-image', ['imageName' => 'image_main'])
                @include('app.modules.visualise.image', ['imageName' => 'image_7'])
                @include('app.modules.visualise.image', ['imageName' => 'image_8'])
            </div>
            <div class="row-4">
                @include('app.modules.visualise.image', ['imageName' => 'image_9'])
                @include('app.modules.visualise.image', ['imageName' => 'image_10'])
                @include('app.modules.visualise.image', ['imageName' => 'image_11'])
                @include('app.modules.visualise.image', ['imageName' => 'image_12'])
            </div>
        </div>

        <div class="actions">
            <a href="#" class="button {{$moduleUser->data && count(get_object_vars($moduleUser->data)) >= 13 ? '' : 'is-disabled'}}" data-save-module>Save to dashboard </a>
        </div>
    </div>
</div>