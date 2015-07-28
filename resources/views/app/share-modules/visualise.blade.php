@extends('app.public-layout')
@section('content')
<div class="content">
    <h1 class="title">
        Beautiful<br>
        you
    </h1>

    <div class="board">
        <div class="row-4">
            @include('app.modules.visualise.image', ['imageName' => 'image_1', 'moduleUser' => $module->pivot])
            @include('app.modules.visualise.image', ['imageName' => 'image_2', 'moduleUser' => $module->pivot])
            @include('app.modules.visualise.image', ['imageName' => 'image_3', 'moduleUser' => $module->pivot])
            @include('app.modules.visualise.image', ['imageName' => 'image_4', 'moduleUser' => $module->pivot])
        </div>
        <div class="mid-row">
            <div class="column">
                @include('app.modules.visualise.image', ['imageName' => 'image_5', 'moduleUser' => $module->pivot])
                @include('app.modules.visualise.image', ['imageName' => 'image_6', 'moduleUser' => $module->pivot])
            </div>
            @include('app.modules.visualise.image', ['imageName' => 'image_main', 'moduleUser' => $module->pivot])
            <div class="column">
                @include('app.modules.visualise.image', ['imageName' => 'image_7', 'moduleUser' => $module->pivot])
                @include('app.modules.visualise.image', ['imageName' => 'image_8', 'moduleUser' => $module->pivot])
            </div>
        </div>
        <div class="row-4">
            @include('app.modules.visualise.image', ['imageName' => 'image_9', 'moduleUser' => $module->pivot])
            @include('app.modules.visualise.image', ['imageName' => 'image_10', 'moduleUser' => $module->pivot])
            @include('app.modules.visualise.image', ['imageName' => 'image_11', 'moduleUser' => $module->pivot])
            @include('app.modules.visualise.image', ['imageName' => 'image_12', 'moduleUser' => $module->pivot])
        </div>


    </div>
</div>
@endsection