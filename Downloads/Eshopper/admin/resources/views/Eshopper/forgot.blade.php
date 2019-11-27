@extends('frontend.without_login_home')
@section('content')
@if($message=Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
@if(Session::has('flash_message_error'))
<div class="alert alert-error">
	<p>{!! session('flash_message_error') !!}</p>
</div>
@endif
@if(isset(Auth::user()->email))
    <script>window.location="/login-register/successlogin";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif
   <!-- <script src="{{ asset ('/jss/js/jquery.js')}}"></script> 
	<script src="{{ asset ('/jss/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset ('/jss/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset ('/jss/js/price-range.js')}}"></script>
    <script src="{{ asset ('/jss/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset ('/jss/js/jquery.validate.js')}}"></script>
    <script src="{{ asset ('/jss/js/main.js')}}"></script>
<section id="form">form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Forgot Password?</h2>
						<form id="forgotPasswordForm" name="forgotPasswordForm" method="POST" action="{{url('forgot-password')}}" >
						{{ csrf_field() }}
							<input id="email" name="email" type="email" placeholder="Email Address" required/>
							
							<button type="submit" class="btn btn-default">Submit</button>
							
						</form>
					</div><!--/login form-->
				</div>
				<!-- <div class="col-sm-1"> 
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form">sign up form
						<h2>New User Signup!</h2>
						<form id="register" name="register" action="{{url('login-register')}}" method="POST">
						{{ csrf_field() }}
							<input id="name" name="name" type="text" placeholder="Name" required/>
							<input id="email" name="email" type="email" placeholder="Email Address" required/>
							<input id="password" name="password" type="password" placeholder="Password" required/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div>/sign up form-->
					
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	@endsection