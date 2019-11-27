@extends('admin.admin_template')
@section('content')
 <form action="{{url('category', [$category->id])}}" method="POST">
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
			 <label for="category">Category Name:</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
		</div>
	</div>
	<br>
	<br>
	<div class="col-xs-12">
		<select class="form-control m-bot15" name="parent_id">
			@foreach($cate as $categorys)
            <option value="{{$categorys->id}}">{{ $categorys->parent_name}}</option>
            @endforeach
          @foreach($cat as $categorys)
            <option value="{{ $categorys->id }}">{{ $categorys->name}}</option>
        @endforeach


</select>
		</div>
	</div>

	<div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio"  name="status" value="active"  {{ $category->status =="active" ? 'checked' : '' }}>
            <label for="Active">Active</label>
            <input type="radio"  name="status" value="inactive"  {{ $category->status =="inactive" ? 'checked' : '' }}>
            <label for="InActive">InActive</label>
        </div>
    </div>
	 <div class="col-xs-12">
<div class="form-group">

	<div class="col-xs-12">
		<a class="btn btn-xs btn-success" href="{{route('category.index')}}">Back</a>
		<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
	</div>
</div>
</div>
</form>
@endsection
