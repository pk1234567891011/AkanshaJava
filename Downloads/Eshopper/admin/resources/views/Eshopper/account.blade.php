@extends('frontend.home')
@section('content')
@if(Session::has('flash_message_success'))
<div class="alert alert-success">
	<p>{!! session('flash_message_success') !!}</p>
</div>
@endif
			<div class="row">
				<div class="col-sm-7 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Update Account</h2>
            			<a  href="{{route('address.create')}}">Add address</a>
						<table class="table table-bordered" style="font-size:11px">
	                        <tr>
		                        <th >Name</th>
		                        <th >Address</th>
                                <th >City</th>
                                <th >State</th>
                                <th >Country</th>
                                <th >Pincode</th>
                                <th >Mobile</th>
		                        <th width="200px">ACTION</th>
	                        </tr>
							@foreach($add as $address)
							<tr>
								<td>{{$userInfo->firstname}}</td> 
								<td>{{$address->address}}</td>
								<td>{{$address->city}}</td>
								<td>{{$address->state}}</td>
								<td>{{$address->country}}</td>
								<td>{{$address->pincode}}</td>
								<td>{{$address->mobile}}</td>
								<td>
            						<a class="btn btn-xs btn-info" href="{{route('address.edit',$address->id)}}">edit</a>
           							{!! Form::open(['method'=>'DELETE','route'=>['address.destroy',$address->id],'style'=>'display:inline'])!!}
            						{!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            						{!! Form::close()!!}
        						</td>
							</tr>
							@endforeach
							
                        </table>
						{!! $paginate->links() !!}
                    </div>
				</div>
				<div class="col-sm-1">
					<h6 class="or">OR</h6>
				</div>
				<div class="col-sm-3">
					<div class="signup-form"><!--sign up form-->
						<h2>Update Password</h2>
						<form id="passwordForm" name="passwordForm" method="POST" action="{{url('/update-user-pwd')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="password" id="current_pwd" name="current_pwd" placeholder="Current Password" required>
							<span id="chkPwd"></span>
							<input type="password" id="new_pwd" name="new_pwd" placeholder="New Password" required>
							<input type="password" id="confirm_pwd" name="confirm_pwd" placeholder="Confirm Password" required>
							<button type="submit" class="btn btn-default">Update</button>
						</form>
					</div>
				</div>
			</div>
			<script src="{{ asset ('jss/js/jquery.js')}}"></script>
	<script src="{{ asset ('jss/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset ('jss/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset ('jss/js/price-range.js')}}"></script>
    <script src="{{ asset ('jss/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset ('jss/js/main.js')}}"></script>
    <script src="{{ asset ('jss/js/jquery.validate.js')}}"></script>
    <script src="{{ asset ('jss/js/main.js')}}"></script>
	@endsection
