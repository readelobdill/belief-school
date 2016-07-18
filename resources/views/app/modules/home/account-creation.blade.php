<div class="inner">
    <div class="content">
        <h1 class="title">Would you like the confidence to create change?</h1>

        <p>If you’d like to explore what is holding you back from investing in yourself, register here. Registering opens the Belief School premodule, with no payment required. The purpose of this premodule is to help you clarify what you want and what is holding you back. Do not over think these answers, go with your first response—that is where the gold is.</p>

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
                <input type="email" name="email" required data-parsley-remote="{{route('account.check-email')}}" data-parlsey-remote-reverse="true" data-parsley-remote-message="Your email address is already associated to a Belief School account">
                <label>Email Address</label>
            </div>
            <div class="form-row">
                <input type="text" name="username" required data-parsley-remote="{{route('account.check-username')}}" data-parlsey-remote-reverse="true" data-parsley-remote-message="Your username is already associated to a Belief School account">
                <label>Username</label>
            </div>
            <div class="form-row">
                <input type="password" name="password" required minlength="8" id="password">
                <label>Password</label>
            </div>
            <div class="form-row">
                <input type="password" name="confirm-password" required minlength="8" data-parsley-equalto="#password" >
                <label>Confirm Password</label>
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