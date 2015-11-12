@extends('app.layout')

@section('content')
	<div class="container non-mod-page">
		<div class="inner">
			<header>
				<h1 class="title">
					Reset password
				</h1>
			</header>

			<section class="login">
				<div class="inner">
					<div class="content">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> Something went wrong<br><br>

							</div>
						@endif

						<form method="POST" action="{{route('auth.post-reset')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="token" value="{{ $token }}">

							<div class="form-row">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								<label>Email Address</label>
							</div>

							<div class="form-row">
								<input type="password" class="form-control" name="password">
								<label>Password</label>
							</div>

							<div class="form-row">
								<input type="password" class="form-control" name="password_confirmation">
								<label>Confirm Password</label>
							</div>





							<div class="form-row">
								<p class="center"><button type="submit" class="button small" style="margin-right: 15px;">Reset Password</button></p>


							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
@endsection

