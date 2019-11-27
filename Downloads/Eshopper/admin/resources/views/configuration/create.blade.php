@extends('admin.admin_template')
@section('content')

    <form method="post" action="{{url('configuration')}}" enctype="multipart/form-data">
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
            <strong>Configuration Key :</strong>
            {!! Form::text('conf_key',null,['placeholder'=>'Configuration_key','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Configuration Value :</strong>
            {!! Form::text('conf_value',null,['placeholder'=>'Configuration_value','class'=>'form-control'])!!}
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
        <a class="btn btn-xs btn-success" href="{{route('configuration.index')}}">Back</a>
        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
    </div>
</form>
@endsection
