<div class="inner">
    <div class="content">
        <h1 class="title">Congratulations on choosing to invest in you.</h1>

        <p>You are worth it!</p>

        <form action="{{route('users.check-existing')}}" method="POST" class="acquire-email">
            <div class="form-row">
                <input type="email" name="email" required data-parsley-remote="{{route('account.check-email')}}" data-parlsey-remote-reverse="true" data-parsley-remote-message="Your email address is already associated to a Belief School account">
                <label>Email Address</label>
            </div>

            <div class="actions">
                <button class="next-section">
                    @include('app/partials/icons/down-arrow')
                </button>
            </div>
        </form>
    </div>
</div>