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
                <th>Comments</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($modules as $module)
                <tr data-id="{{$module->id}}">
                    <td>{{$module->name}}</td>
                    <td>{{$module->slug}}</td>
                    <td><a href="{{route('admin.modules.comments', [$module->id])}}" class="btn btn-info btn-sm"><i class="fa fa-comment"></i> Comments</a></td>
                    <td><a href="{{route('admin.modules.edit', [$module->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-cog"></i> Edit</a></td>
                    <td><a href="{{route('admin.modules.delete', [$module->id])}}" class="btn btn-danger btn-sm delete-module"><i class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@stop