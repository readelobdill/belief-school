<div class="inner">
    <div class="content">
        <h1 class="plain">Would you like the confidence to create change?</h1>

        Hello..

        <p>Excited? Intrigued? Fill in your details below and work through our FREE Creating Clarity worksheet to discover if Belief School is right for you.</p>

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
            <div class="form-row">
                <input type="password" name="confirrm-password" required minlength="8">
                <label>Confirm Password</label>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="actions">
                <button class="next-section">
                    @include('app/partials/icons/down-arrow')
                </button>
            </div>
        </form>

       <p><a href="{{ route('about') }}">More information about Belief School please.</a></p>


    </div>

</div>