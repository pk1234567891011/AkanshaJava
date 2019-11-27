@extends('admin.admin_template')
@section('content')
 <form action="{{url('users', [$users->id])}}" method="POST">
       <input type="hidden" name="_method" value="PUT">
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
			 <label for="firstname">Firstname:</label>
            <input type="text" class="form-control" name="firstname" value="{{$users->firstname}}">
		</div>
	</div>
	<br>
	<br>
	<div class="col-xs-12">
		<div class="form-group">
			 <label for="lasttname">Lastname:</label>
            <input type="text" class="form-control" name="lastname" value="{{$users->lastname}}">
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			 <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$users->email}}">
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			 <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" value="{{$users->password}}">
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			 <label for="confirmpassword">Confirm-Password:</label>
            <input type="password" class="form-control" name="confirmpassword" value="{{$users->password}}">
		</div>
	</div>
	<div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio"  name="status" value="active"  {{ $users->status =="active" ? 'checked' : '' }}>
            <label for="Active">Active</label>
            <input type="radio"  name="status" value="inactive"  {{ $users->status =="inactive" ? 'checked' : '' }}>
            <label for="InActive">InActive</label>
        </div>
    </div>
	 <div class="col-xs-12">
	<div class="form-group">
	<label for="select">Select Category:</label>
                      <select class="form-control" id="post" name="role_id">
                      <option value="">Select Category</option>
	                 @foreach($roles as $role)
                      <option value="{{ $role->role_id}}" @if($users->role_id==$role->role_id)
                      	selected @endif>{{ $role->role_name }}</option>

                      @endforeach
                      </select>

                  </div>
              </div>
          </div>
	<div class="col-xs-12">
<div class="form-group">

	<div class="col-xs-12">
		<a class="btn btn-xs btn-success" href="{{route('users.index')}}">Back</a>
		<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
	</div>
</div>
</div>
</form>
@endsection
