@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('category.create')}}"
           style="position: absolute;
margin-left: -203px; top: 100px">Create Category</a>
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

		<th >Category Name</th>
		<th >Parent Id</th>
	    <th >status</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($categorys as $categorys)
	<tr>

		<td>{{$categorys->name}}</td>
		<td>{{$categorys->name}}</td>

		  <td>{{$categorys->status}}</td>
		<td>
            <a class="btn btn-xs btn-info" href="{{route('category.edit',$categorys->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['category.destroy',$categorys->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>
	</tr>
	@endforeach

	@foreach($categories as $categorys)
	<tr>

		<td>{{$categorys->name}}</td>
		<td>{{$categorys->parent_name}}</td>

		  <td>{{$categorys->status}}</td>
		<td>
            <a class="btn btn-xs btn-info" href="{{route('category.edit',$categorys->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['category.destroy',$categorys->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>
	</tr>
	@endforeach
</table>
{!! $category->links() !!}
</div>
</div>

@endsection
