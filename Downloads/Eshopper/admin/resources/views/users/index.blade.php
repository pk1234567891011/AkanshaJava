@extends('admin.admin_template')
@section('content')
<!-- <div class="row"> -->
	<!-- <div class="col-lg-12"> -->
		<!-- <h3>Simple laravel</h3> -->
	<!-- </div> -->
<!-- </div> -->

<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <div style="position: absolute; margin-right: 20px">
            <a  href="{{route('users.create')}}"
           style="position: absolute;
margin-left: -203px; top: 100px">Create users</a>
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

		<th >firstname</th>
		<th >lastname</th>
	    <th >email</th>
	    <th >status</th>
        <th >role</th>
		<th width="200px">ACTION</th>
	</tr>
	</thead>
	@foreach($users as $user)
	<tr>

		<td>{{$user->firstname}}</td>


		<td>{{$user->lastname}}</td>
		<td>{{$user->email}}</td>
		  <td>{{$user->status}}</td>
         <td>{{$user->category}}</td>
		<td>
            <a class="btn btn-xs btn-info" href="{{route('users.edit',$user->id)}}">edit</a>
            {!! Form::open(['method'=>'DELETE','route'=>['users.destroy',$user->id],'style'=>'display:inline'])!!}
            {!! Form::submit('Delete',['class'=>'btn btn-xs btn-danger']) !!}
            {!! Form::close()!!}
        </td>


	</tr>
	@endforeach



</table>


{!! $users->links() !!}
@endsection
