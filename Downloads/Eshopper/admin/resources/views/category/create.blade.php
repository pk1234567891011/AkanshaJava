
@extends('admin.admin_template')
@section('content')
 <form method="post" action="{{url('category')}}">
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
            <strong>Category Name :</strong>
            {!! Form::text('name',null,['placeholder'=>'Category_Name','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
    <div class="form-group">
    <label for="select">Select Category:</label>
                      <select class="form-control" id="post" name="parent_id">
                      <option value="">Select Category</option>
                      <option value="0">PARENT</option>
                     @foreach($category as $category)
                      <option value="{{ $category->id}}">{{ $category->name }}</option>

                      @endforeach
                      </select>

                  </div>
              </div>
     <div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio" id="active" name="status" value="active">
            <label for="active">Active</label>
            <input type="radio" id="inactive" name="status" value="inactive">
            <label for="active">InActive</label>
        </div>
    </div>
<div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{route('category.index')}}">Back</a>
        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
    </div>
</form>
@endsection
