@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('product.create')}}"
           style="position: absolute;
margin-left: -203px; top: 100px">Create Product</a>
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

		<th >Product Name</th>
	    <th >Price</th>
	    <th>Special Price</th>
		<th >Status</th>
		<th >Quantity</th>
		<th>Product Images</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($product as $products)
	<tr>

		<td>{{$products->name}}</td>
		<td>{{$products->price}}</td>
		<td>{{$products->special_price_to}}</td>
		<td>{{$products->status}}</td>
		<td>{{$products->quantity}}</td>
		<td>
		@foreach($products->imgs as $images)
		<img src="{{ URL::to('/') }}/products/{{ $images->image_name }}" class="img-thumbnail" /
	    	style="height: 40px;width: 40px">
			@endforeach
		</td>
		
		<td>
            <a class="btn btn-xs btn-info" href="{{route('product.edit',$products->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['product.destroy',$products->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>
	</tr>
	@endforeach
</table>
{!! $product->links() !!}
@endsection
