@extends('admin.layout')

@section('page-title')
    Edit Module
@stop

@section('content')
    <div class="row">
        <div class="box box-primary">
            <form role="form" action="{{route('admin.modules.edit', [$module->id])}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" id="name" type="text" value="{{$module->name}}" required/>
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input name="type" class="form-control" id="type" type="text" value="{{$module->type}}" required/>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update Module</button>
                </div>
            </form>
        </div>
    </div>
@stop