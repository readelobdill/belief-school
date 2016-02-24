@extends('admin.layout')


@section('page-title')
    Dashboard
@stop

@section('content')

    <div class="well">
        <h4>Site Options</h4>
        <form action="{{route('dashboard.update-options')}}" method="post">
            {!! csrf_field() !!}
            <div class="form-group">
                <input type="checkbox" name="tutored_sessions_enabled" id="tutored_sessions_enabled" value="1" {{isset($options['tutored_sessions_enabled']) && $options['tutored_sessions_enabled']->value === '1' ? 'checked' : '' }}>
                <label for="tutored_sessions_enabled">Belief School Coached</label>
            </div>

            <button class="btn btn-info" type="submit">Update</button>
        </form>
    </div>

@stop