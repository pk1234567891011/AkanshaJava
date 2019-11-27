@extends('admin_template')
@section('content')
 <form method="post" action="">
 	{{csrf_field()}}
 	@if(count($errors)>0)
<div class="alert alert-danger">
<strong>Whoops!!!</strong> There are some problems with your inputs.</br>
<ul>
@foreach($errors->all() as $error)	
<li>{{ $error}}</li>
@endforeach
</ul>
</div>
@endif
<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
			<strong>Firstname :</strong>
			{!! Form::text('fname',null,['placeholder'=>'FirstName','class'=>'form-control'])!!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			<strong>Lastname :</strong>
			{!! Form::text('lname',null,['placeholder'=>'LastName','class'=>'form-control'])!!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			<strong>Email :</strong>
			{!! Form::text('email',null,['placeholder'=>'Email','class'=>'form-control'])!!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			<strong>Password :</strong>
			{!! Form::password('pass',null,['placeholder'=>'Password','class'=>'form-control'])!!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			<strong>Confirm Password :</strong>
			{!! Form::password('cpass',null,['placeholder'=>''password_confirmation'=>'required',
','class'=>'form-control'])!!}
		</div>
	</div>
	 <div class="col-xs-12"> 
		<div class="form-group">
			<strong>Status :</strong>
			<input type="radio" id="active" name="active" value="active">
            <label for="active">Active</label>
			<input type="radio" id="inactive" name="sactive" value="inactive">
            <label for="active">InActive</label>
		</div>
	</div>

	</div>
</form>
@endsection