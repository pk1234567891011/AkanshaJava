@extends('admin.admin_template')
@section('content')

    <form method="post" action="{{url('coupon')}}" >
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
            <strong>Code :</strong>
            {!! Form::text('code',null,['placeholder'=>'code','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Percentage off :</strong>
            {!! Form::text('percent_off',null,['placeholder'=>'Percentage off','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Number of uses :</strong>
            {!! Form::text('no_of_uses',null,['placeholder'=>'No of uses','class'=>'form-control'])!!}
        </div>
    </div>

<div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{route('coupon.index')}}">Back</a>
        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
    </div>
</form>
@endsection
