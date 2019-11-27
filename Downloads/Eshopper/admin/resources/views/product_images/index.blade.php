@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <!-- <a  href="{{route('banner.create')}}" 
           style="position: absolute;
margin-left: -203px; top: 100px">Create Banner</a>-->
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

		<th >status</th>
		<th >Image</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($product_images as $product_image)
	<tr>


	    <td><img src="{{ URL::to('/') }}/products/{{ $product_image->image_name }}" class="img-thumbnail" /
	    	style="height: 80px;width: 80px"></td>
	    	<td>{{$product_image->status}}</td>
		<td>
          
        </td>


	</tr>
	@endforeach



</table>


 {!! $product_images->links() !!} 

</div>
@endsection
