@extends('admin.admin_template')
@section('content')
 <form action="{{url('coupon', [$coupon->id])}}" method="POST">
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
			 <label for="Code">Code:</label>
            <input type="text" class="form-control" name="code" value="{{$coupon->code}}">
		</div>
    </div>
    <div class="col-xs-12">
		<div class="form-group">
			 <label for="Percent off">Percent Off:</label>
            <input type="text" class="form-control" name="percent_off" value="{{$coupon->percent_off}}">
		</div>
    </div>
    <div class="col-xs-12">
		<div class="form-group">
			 <label for="no.of usese">No .of uses:</label>
            <input type="text" class="form-control" name="no_of_uses" value="{{$coupon->no_of_uses}}">
		</div>
    </div>
	<div class="col-xs-12">
		<a class="btn btn-xs btn-success" href="{{route('coupon.index')}}">Back</a>
		<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
	</div>
</div>
</div>
</form>
@endsection
