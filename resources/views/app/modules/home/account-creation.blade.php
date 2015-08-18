<div class="inner">
    <div class="content">
        <p>Create a Belief School account and get started on your FREE Belief School journey</p>
        <p><a href="{{ route('about') }}">Or take me to the page of benefits first</a></p>

        <form action="{{route('users.create')}}" method="POST">
            <div class="form-row">
                <input type="text" name="first_name" required>
                <label>First Name</label>
            </div>
            <div class="form-row">
                <input type="text" name="last_name" required>
                <label>Last Name</label>
            </div>
            <div class="form-row">
                <input type="email" name="email" required data-parsley-remote="{{route('account.check-email')}}" data-parlsey-remote-reverse="true">
                <label>Email Address</label>
            </div>
            <div class="form-row">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="form-row">
                <input type="password" name="password" required minlength="8">
                <label>Password</label>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="actions">
                <button class="next-section">
                    @include('app/partials/icons/down-arrow')
                </button>
            </div>
        </form>

    </div>

</div>