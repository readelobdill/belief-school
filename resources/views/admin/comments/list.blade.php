@extends('admin.layout')


@section('page-title')
    Comments <small> for {{$module->name}}</small>
@stop

@section('content')
    <div class="no-padding">
        {!! $commentList !!}
    </div>


@stop