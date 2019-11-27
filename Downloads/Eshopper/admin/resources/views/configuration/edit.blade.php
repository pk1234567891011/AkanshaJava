@extends('admin.admin_template')
@section('content')
 <form action="{{url('configuration', [$configuration->id])}}" method="POST">
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
			 <label for="configuration_key">Configuration Key:</label>
            <input type="text" class="form-control" name="conf_key" value="{{$configuration->conf_key}}">
		</div>
    </div>
    <div class="col-xs-12">
		<div class="form-group">
			 <label for="configuration_value">Configuration Value:</label>
            <input type="text" class="form-control" name="conf_value" value="{{$configuration->conf_value}}">
		</div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio"  name="status" value="active"  {{ $configuration->status =="active" ? 'checked' : '' }}>
            <label for="Active">Active</label>
            <input type="radio"  name="status" value="inactive"  {{ $configuration->status =="inactive" ? 'checked' : '' }}>
            <label for="InActive">InActive</label>
        </div>
	<div class="col-xs-12">
		<a class="btn btn-xs btn-success" href="{{route('configuration.index')}}">Back</a>
		<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
	</div>
</div>
</div>
</form>
@endsection
