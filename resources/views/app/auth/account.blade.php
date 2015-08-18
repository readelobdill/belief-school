@extends('app.layout')

@section('content')
    <div class="container account">
        <div class="inner">
                <header>
                    <h1 class="title">
                        Edit your account
                    </h1>
                </header>

            <section class="account-section">
                <div class="inner">
                    <div class="content">
                        <form action="{{route('account.submit')}}" method="POST">
                            <div class="form-row">
                                <input type="text" name="first_name" class="has-content" required value="{{$user->first_name}}">
                                <label>First Name</label>
                            </div>
                            <div class="form-row">
                                <input type="text" name="last_name" class="has-content" required value="{{$user->last_name}}">
                                <label>Last Name</label>
                            </div>
                            <div class="form-row">
                                <input type="email" name="email" class="has-content" required value="{{$user->email}}" data-parsley-remote="{{route('account.check-email')}}" data-parlsey-remote-reverse="true">
                                <label>Email Address</label>
                            </div>
                            <div class="form-row">
                                <input type="text" name="username" class="has-content" required value="{{$user->username}}">
                                <label>Username</label>
                            </div>
                            <div class="form-row">
                                <input type="password" name="password" minlength="8">
                                <label>Password</label>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="actions">
                                <button class="button">Save Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection