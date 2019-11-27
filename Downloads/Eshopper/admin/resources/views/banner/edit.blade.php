@extends('admin.admin_template')
@section('content')
 <form action="{{url('banner', [$banner->id])}}" method="POST"  enctype="multipart/form-data">
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
			@if("{{ $banner->banner_path }}")
                      <img src="{{ $banner->banner_path }}" width="200px" height="100px">
                  @else
                      <p>no image</p>
                @endif
              <!-- <img src="{{ URL::to('/') }}{{ $banner->banner_path }}" class="img-thumbnail" /> -->
               <label for="image">Upload Image:</label>
            <input type="file" class="form-control" name="image" style="padding: 0px 5px" value ="{{ $banner->banner_path }}" >
         <!-- <input type="hidden" name="hidden_image" value="{{ $banner->banner_path }}" /> -->
		</div>
	</div>
	<div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio"  name="status" value="active"  {{ $banner->status =="active" ? 'checked' : '' }}>
            <label for="Active">Active</label>
            <input type="radio"  name="status" value="inactive"  {{ $banner->status =="inactive" ? 'checked' : '' }}>
            <label for="InActive">InActive</label>
        </div>
	<div class="col-xs-12">
		<a class="btn btn-xs btn-success" href="{{route('banner.index')}}">Back</a>
		<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
	</div>
</div>
</div>
</form>
@endsection
