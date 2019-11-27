@extends('admin.admin_template')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('coupon.create')}}"
           style="position: absolute;
margin-left: -203px; top: 100px">Create Coupon</a>
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

		<th >Code </th>
		<th >Percentage off</th>
		<th >No. of uses</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($coupon as $coupons)
	<tr>

		<td>{{$coupons->code}}</td>
	    <td>{{$coupons->percent_off}}</td>
	    <td>{{$coupons->no_of_uses}}</td>
		<td>
          <a class="btn btn-xs btn-info" href="{{route('coupon.edit',$coupons->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['coupon.destroy',$coupons->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>


	</tr>
	@endforeach



</table>


{!! $coupon->links() !!}

</div>
@endsection
