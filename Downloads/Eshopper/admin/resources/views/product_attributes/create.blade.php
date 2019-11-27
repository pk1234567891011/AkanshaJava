
@extends('admin.admin_template')
@section('content')
 <form method="post" enctype="multipart/form-data" action="{{url('product_attributes')}}" name="add_name" id="add_name">
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

         <form name="add_name" id="add_name" enctype="multipart/form-data" >


            <div class="alert alert-danger print-error-msg" style="display:none">

            <ul></ul>

            </div>


            <div class="alert alert-success print-success-msg" style="display:none">

            <ul></ul>

            </div>


            <div class="table-responsive">

                <table class="table table-bordered" id="dynamic_field">
                   <tr>
                     <td>
                       <div class="form-group">
            <strong>Attribue Name :</strong>
            {!! Form::text('name',null,['placeholder'=>'Attribute Name','class'=>'form-control'])!!}
        </div>
                     </td>
                     
                    <tr>

                        <td><input type="text" name="values[]" placeholder="Enter value" class="form-control name_list" /></td>

                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

                    </tr>

                </table>

                 <div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{route('product_attributes.index')}}">Back</a>
        <button type="submit" id="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>

            </div>


         </form>

    </div>

</div>


<script type="text/javascript">

    $(document).ready(function(){

      var postURL = "<?php echo url('product_attributes.index'); ?>";

      var i=1;


      $('#add').click(function(){

           i++;

           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="values[]" placeholder="Enter value" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

      });


      $(document).on('click', '.btn_remove', function(){

           var button_id = $(this).attr("id");

           $('#row'+button_id+'').remove();

      });


      $.ajaxSetup({

          headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });


      $('#submit').click(function(){

           $.ajax({

                url:postURL,

                method:"POST",

                data:$('#add_name').serialize(),

                type:'json',

                success:function(data)

                {

                    if(data.error){

                        printErrorMsg(data.error);

                    }else{

                        i=1;

                        $('.dynamic-added').remove();

                        $('#add_name')[0].reset();

                        $(".print-success-msg").find("ul").html('');

                        $(".print-success-msg").css('display','block');

                        $(".print-error-msg").css('display','none');

                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                    }

                }

           });

      });


      function printErrorMsg (msg) {

         $(".print-error-msg").find("ul").html('');

         $(".print-error-msg").css('display','block');

         $(".print-success-msg").css('display','none');

         $.each( msg, function( key, value ) {

            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

         });

      }

    });

</script>

</body>

</html>


@endsection