@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('banner.create')}}"
           style="position: absolute;
margin-left: -203px; top: 100px">Create Banner</a>
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

		<th >Banner</th>
		<th >status</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($banner as $banners)
	<tr>


	    <td><img src="{{ URL::to('/') }}{{ $banners->banner_path }}" class="img-thumbnail" /
	    	style="height: 80px;width: 80px"></td>
	    	<td>{{$banners->status}}</td>
		<td>
            <a class="btn btn-xs btn-info" href="{{route('banner.edit',$banners->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['banner.destroy',$banners->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>


	</tr>
	@endforeach



</table>


{!! $banner->links() !!}

</div>
@endsection
