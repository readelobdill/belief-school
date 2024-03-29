@extends('admin.layout')

@section('page-title')
    Create User
@stop

@section('content')
    <div class="row">
        <div class="box box-primary">
            <form role="form" action="{{route('admin.users.create')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="box-body">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input name="first_name" class="form-control" id="first_name" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input name="last_name" class="form-control" id="last_name" type="text" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" id="email" class="form-control" type="email" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="paid" id="paid" />
                        <label for="paid">Paid</label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" id="password" class="form-control" type="password" required/>
                    </div>
                    <div class="form-group">
                        <label for="repeat-password">Repeat Password</label>
                        <input name="repeat-password" id="repeat-password" class="form-control" type="password" required/>
                    </div>
                    <div class="form-group">
                        <label for="group_id">Group</label>
                        <select name="group_id" id="group_id" class="form-control">
                            @foreach($groups as $group)
                                <option value="{{$group->id}}">{{$group->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
@stop