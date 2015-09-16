@extends('app.layout')

@section('content')
	<div class="container non-mod-page">
		<div class="inner">
			<header>
				<h1 class="title">
					Forgot Password?
				</h1>
			</header>

			<section class="login">
				<div class="inner">
					<div class="content">
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong>Your email or password is incorrect<br><br>

							</div>
						@endif

						<form method="POST" action="{{route('auth.forgot-password')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-row">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
								<label>Email Address</label>
							</div>


							<div class="form-row">
								<p class="center"><button type="submit" class="button small" style="margin-right: 15px;">Send password reset link</button></p>


							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
@endsection



{{--

<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>


--}}