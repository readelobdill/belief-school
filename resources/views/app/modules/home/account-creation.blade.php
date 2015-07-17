<div class="inner">
    <div class="content">
        <p>Create a Belief School account and get started on your
            FREE Belief School journey
        </p>

            <p><a href="#">Or take me to the page of benefits first</a></p>


        <form action="{{route('users.create')}}" method="POST">
            <div class="form-row"><input type="text" name="first_name" placeholder="First name" required></div>
            <div class="form-row"><input type="text" name="last_name" placeholder="Last name" required></div>
            <div class="form-row"><input type="email" name="email" placeholder="Email address" required></div>
            <div class="form-row"><input type="text" name="username" placeholder="Username" required></div>
            <div class="form-row"><input type="password" name="password" placeholder="Password" required minlength="8"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">





        </form>

    </div>
    <div class="next-section" data-next-section>
        @include('app/partials/icons/down-arrow')
    </div>
</div>