

 <form method="post" action="{{url('/main/')}}"> 
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
            <strong>Firstname :</strong>
            {!! Form::text('firstname',null,['placeholder'=>'FirstName','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Lastname :</strong>
            {!! Form::text('lastname',null,['placeholder'=>'LastName','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Email :</strong>
            {!! Form::text('email',null,['placeholder'=>'Email','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Password :</strong>
            {!! Form::password('password',null,['placeholder'=>'Password','class'=>'form-control'])!!}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group">
            <strong>Confirm Password :</strong>
            {!! Form::password('password_confirmation',null,['placeholder'=>'Confirm-Password','class'=>'form-control'])!!}
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

        <button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>
    </div>
</form>
