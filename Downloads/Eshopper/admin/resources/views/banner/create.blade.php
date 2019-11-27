@extends('admin.admin_template')
@section('content')

    <form method="post" action="{{url('banner')}}" enctype="multipart/form-data">
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
             <label for="image">Upload Image:</label>
            <input type="file" class="form-control" name="image" style="padding: 0px 5px" >
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
        <a class="btn btn-xs btn-success" href="{{route('banner.index')}}">Back</a>
        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
    </div>
</form>
@endsection
