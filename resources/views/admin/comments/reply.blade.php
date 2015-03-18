@extends('admin.layout')

@section('page-title')
    Reply to {{$comment->title}}
@stop

@section('content')
    <div class="row">
        <div class="box box-primary">
            <form role="form" action="{{route('admin.comments.reply-post', [$comment->id])}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" class="form-control" id="title" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class="form-control" id="body" required></textarea>
                    </div>

                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create Comment</button>
                </div>
            </form>
        </div>
    </div>
@stop