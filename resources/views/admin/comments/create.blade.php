@extends('admin.layout')

@section('page-title')
    Create Comment
@stop

@section('content')
    <div class="row">
        <div class="box box-primary">
            <form role="form" action="{{route('admin.comments.save')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" class="form-control" id="title" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <input name="body" class="form-control" id="body" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label for="module_id">Group</label>
                        <select name="module_id" id="module_id" class="form-control">
                            @foreach($modules as $module)
                                <option value="{{$module->id}}">{{$module->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create Comment</button>
                </div>
            </form>
        </div>
    </div>
@stop