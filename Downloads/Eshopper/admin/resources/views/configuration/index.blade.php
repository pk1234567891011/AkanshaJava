@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('configuration.create')}}"
           style="position: absolute;
margin-left: -203px; top: 100px">Create Configuration</a>
            </div>
        </div>
    </div>
</div>
@if($message=Session::get('success'))
<div class="alert alert-success">
	<p>{{ $message }}</p>
</div>
@endif
<div style="position: absolute;
top: 191px;">
<table class="table table-bordered" >
	<tr>

		<th >Config Key</th>
		<th >Config Value</th>
		<th >status</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($configuration as $configurationss)
	<tr>

		<td>{{$configurationss->conf_key}}</td>
	    <td>{{$configurationss->conf_value}}</td>
	    <td>{{$configurationss->status}}</td>
		<td>
          <a class="btn btn-xs btn-info" href="{{route('configuration.edit',$configurationss->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['configuration.destroy',$configurationss->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>


	</tr>
	@endforeach



</table>


{!! $configuration->links() !!}

</div>
@endsection
