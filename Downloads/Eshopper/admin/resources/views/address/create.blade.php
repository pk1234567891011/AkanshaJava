@extends('frontend.home')
@section('content')
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
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Address</h2>
						<form id="address" name="address" method="POST" action="{{url('address')}}" >
						{{ csrf_field() }}
                            <input type="text" name="address" id="address" placeholder="address">
                            <input type="text" name="city" id="city" placeholder="city">
							<input type="text" name="state" id="state" placeholder="state">
                            <select id="country" name="country">
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                            @endforeach
                            </select>
							<input type="text" name="pincode" style="margin-top:10px" id="pincode" placeholder="pincode">
							<input type="text" name="mobile" id="mobile" placeholder="mobile">
                            <a class="btn btn-xs btn-success" href="{{url('account')}}">Back</a>
							<button type="submit" class="btn btn-default">Add</button>
							
						</form>
					</div><!--/login form-->
				</div>
					
				</div>
			</div>
		</div>
	
	@endsection