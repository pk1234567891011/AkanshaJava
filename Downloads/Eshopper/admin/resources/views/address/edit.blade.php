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
                        <form action="{{url('address', [$address->id])}}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
 	                    {{csrf_field()}}
                         <input type="text" name="name" id="name" placeholder="name" value="{{$userInfo->firstname}}">
                            <input type="text" name="address" id="address" placeholder="address" value="{{$address->address}}">
                            <input type="text" name="city" id="city" placeholder="city" value="{{$address->city}}">
						    <input type="text" name="state" id="state" placeholder="state" value="{{$address->state}}">
                            <select id="country" name="country">
    	                        <option value="">Select Country</option>
		                            @foreach($countries as $cont)
    	                            <option value="{{ $cont->country_name}}" @if($address->country== $cont->country_name)
    	                            selected @endif>{{ $cont->country_name }}
    	                        </option>
    	                            @endforeach
                            </select>
						    <input type="text" name="pincode" style="margin-top:10px" id="pincode" placeholder="pincode" value="{{$address->pincode}}">
						    <input type="text" name="mobile" id="mobile" placeholder="mobile" value="{{$address->mobile}}">
                            <a class="btn btn-xs btn-success" href="{{url('account')}}">Back</a>
						    <button type="submit" class="btn btn-default">Add</button>
							
						</form>
					</div><!--/login form-->
				</div>
					
				
			</div>
		</div>
@endsection
