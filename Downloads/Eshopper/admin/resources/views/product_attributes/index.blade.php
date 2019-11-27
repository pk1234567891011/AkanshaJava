@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
 <a  href="{{route('product_attributes.create')}}"
           style="position: absolute;
            margin-left: -203px; top: 100px">Create Attributes</a>
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
<table class="table table-bordered" style="width: 100%">
	<tr>

		<th >Attribute Name</th>
	    <th >Values</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($product_attributes as $attributes)
	<tr>

		<td>{{$attributes->name}}</td>
		<td>
		  @foreach($attributes->parent as $show)
		  {{$show->attribute_value}}
		  @endforeach
		  </td>
		  <td>
            <a class="btn btn-xs btn-info" href="{{route('product_attributes.edit',$attributes->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['product_attributes.destroy',$attributes->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>
	</tr>
	@endforeach
</table>
{!! $product_attributes->links() !!}
@endsection
