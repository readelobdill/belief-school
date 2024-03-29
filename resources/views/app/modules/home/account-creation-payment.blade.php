<div class="inner account-creation">
    <div class="content">
        <h1 class="title">Congratulations on choosing to invest in you.</h1>

        <p>You are worth it!</p>

        <form action="{{route('users.create')}}" method="POST" class="to-payment">
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

            <p>Enrol now with a one-off payment of $135 NZD</p>

            <div class="actions">
                <button class="button yes">YES</button>
            </div>
        </form>



    </div>

</div>