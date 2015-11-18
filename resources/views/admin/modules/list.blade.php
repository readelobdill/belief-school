@extends('admin.layout')


@section('page-title')
    Modules <small>List</small>
@stop

@section('content')
    <div class="no-padding">
        <table class="table table-hover table-striped modules-table" data-update-url="{{route('admin.modules.update-order')}}">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>BG Video</th>
                <th>Vimeo ID</th>
                <th>Comments</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modules as $module)
                <tr data-id="{{$module->id}}">
                    <td>{{$module->name}}</td>
                    <td>{{$module->slug}}</td>
                    <td>{{$module->video}}</td>
                    <td><a target="_blank" href="https://vimeo.com/{{$module->intro_video}}">{{$module->intro_video}}</a></td>
                    <td>
                        @if($module->template !== 'home')
                            <a href="{{route('modules.forum', [$module->slug])}}" class="btn btn-info btn-sm"><i class="fa fa-comment"></i> Comments</a>
                        @endif
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@stop