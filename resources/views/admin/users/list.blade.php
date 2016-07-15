@extends('admin.layout')


@section('page-title')
    Users <small>List</small>
@stop

@section('content')
    <div class="no-padding">
        <table class="table table-hover table-striped users-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Paid</th>
                <th>Type</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Module</th>
                <th>Time</th>
                <th>Group</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name }} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->paid}}</td>
                    <td>{{!empty($user->type) ? $user->type : 'normal'}}</td>
                    <td>
                        @if(isset($user->modules[0]) && $user->modules[0]->pivot->complete && isset($user->modules[0]->pivot->data->{'1'}))
                            {{$user->modules[0]->pivot->data->{'1'}->age}}
                        @endif
                    </td>
                    <td>
                        @if(isset($user->modules[0]) && $user->modules[0]->pivot->complete && isset($user->modules[0]->pivot->data->{'1'}))
                            {{$user->modules[0]->pivot->data->{'1'}->gender}}
                        @endif
                    </td>
                    <td>
                        @if($user->modules->count() > 0)
                            Module {{max(0,$user->modules->last()->order - 1)}}: {{$user->modules->last()->name}} ({{$user->modules->last()->pivot->complete ? 'complete' : 'not complete'}})
                        @endif
                    </td>
                    <td>
                        @if($user->modules->count() > 0)
                            @if($user->modules->last()->pivot->complete)
                                {{$user->modules->last()->pivot->completed_at->diffForHumans(null, true)}}
                            @else
                                {{$user->modules->last()->pivot->created_at->diffForHumans(null, true)}}
                            @endif
                        @endif

                    </td>
                    <td>{{$user->group->name}}</td>
                    <td><a href="{{route('admin.users.edit', [$user->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-cog"></i> Edit</a></td>
                    <td><a href="{{route('admin.users.delete', [$user->id])}}" class="btn btn-danger btn-sm delete-user"><i class="fa fa-trash-o"></i> Delete</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>


@stop