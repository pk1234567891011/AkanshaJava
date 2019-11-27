
@extends('admin.admin_template')
@section('content')
 <form method="post" enctype="multipart/form-data" action="{{url('product')}}" name="add_name" id="add_name">
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
            <strong>Product Name :</strong>
            {!! Form::text('name',null,['placeholder'=>'Product Name','class'=>'form-control'])!!}
        </div>
                     </td>
                     <td>
                       <div class="form-group">
            <strong>sku :</strong>
            {!! Form::text('sku',null,['placeholder'=>'Sku','class'=>'form-control'])!!}
        </div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <div class="form-group">
            <strong>Short description :</strong>
            {!! Form::text('short_description',null,['placeholder'=>'Short Description','class'=>'form-control'])!!}
        </div>
                     </td>
                     <td>
                       <div class="form-group">
            <strong>Long Description :</strong>
            {!! Form::text('long_description',null,['placeholder'=>'Long Description','class'=>'form-control'])!!}
        </div>
                     </td>
                    <tr>
                      <td>
                        <div class="form-group">
            <strong>Price :</strong>
            {!! Form::text('price',null,['placeholder'=>'Price','class'=>'form-control'])!!}
        </div>
                      </td>
                      <td>
                        <div class="form-group">
            <strong>Special Price :</strong>
            {!! Form::text('special_price',null,['placeholder'=>'Special Price','class'=>'form-control'])!!}
        </div>
                      </td>
                   </tr>
                   <tr>
                   <td>
                   <div class="form-group">
	                      <label for="select">Select Category:</label>
                      <select class="form-control" id="post" name="CID">
                      <option value="">Select Category</option>
	                 @foreach($category as $cat)
                      <option value="{{ $cat->id}}">{{ $cat->name }}</option>

                      @endforeach
                      </select>

                  </div>
              </div>
                   </td>
                   </tr>
                   <tr>
                     <td>
                       <div class="form-group">
            <strong>Special Price From :</strong>
            {!! Form::date('special_price_from',null,['placeholder'=>'Special Price From','class'=>'form-control'])!!}
        </div>
                     </td>
                     <td>
                        <div class="form-group">
            <strong>Special Price To :</strong>
            {!! Form::date('special_price_to',null,['placeholder'=>'Special Price To','class'=>'form-control'])!!}
        </div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio" id="active" name="status" value="active">
            <label for="active">Active</label>
            <input type="radio" id="inactive" name="status" value="inactive">
            <label for="active">InActive</label>
        </div>
                     </td>
                     <td>
                       <div class="form-group">
            <strong>Quantity :</strong>
            {!! Form::text('quantity',null,['placeholder'=>'Quantity','class'=>'form-control'])!!}
        </div>
                     </td>
                   </tr>

                   <tr>
                     <td>
                       <div class="form-group">
            <strong>Meta Title :</strong>
            {!! Form::text('meta_title',null,['placeholder'=>'Meta Title','class'=>'form-control'])!!}
        </div>
                     </td>
                     <td>
                      <div class="form-group">
            <strong>Meta Description :</strong>
            {!! Form::text('meta_description',null,['placeholder'=>'Meta Description','class'=>'form-control'])!!}
        </div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                       <div class="form-group">
            <strong>Meta Keywords :</strong>
            {!! Form::text('meta_keywords',null,['placeholder'=>'Meta Keywords','class'=>'form-control'])!!}
        </div>
                     </td>
                     <td>
        <div class="form-group">
            <strong>Is Featured :</strong>
            {!! Form::text('is_featured',null,['placeholder'=>'Is Featured','class'=>'form-control'])!!}
        </div>
                     </td>
                   </tr>

                    <tr>

                        <td><select id="attribute_id_1" name="drop[]" placeholder="Select" class="form-control name_list" >
                        <option value="">--Select Attribute--</option>
                                        @foreach ($attributes as $key => $value)
                                        <option value="{{ $key }}"> {{ $value }}</option>
                                        @endforeach
                        </select></td>
                         </tr>
                         <td>
                         <select  id="attribute_value_id_1" name="value[]" class="form-control">
                                     <option>--Values--</option>
                         </td>
                        <td><button type="button" name="adds" id="adds" class="btn btn-success">Add More</button></td>

</tr>
<tr>

<td><input type="file" name="names[]" placeholder="Enter your Name" class="form-control name_list" /></td>

<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>

</tr>
                </table>

                 <div class="col-xs-12">
        <a class="btn btn-xs btn-success" href="{{route('product.index')}}">Back</a>
        <button type="submit" id="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
    </div>

            </div>


         </form>

    </div>

</div>
<script type="text/javascript">

    $(document).ready(function(){

      var postURL = "<?php echo url('product.index'); ?>";

      var i=1;


      $('#add').click(function(){

           i++;

           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" name="names[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

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
<script type="text/javascript">
 $(document).ready(function() {

  $(document).on('change', 'select[name="drop[]"]', function(event) {
//$('select[name="drop[]"]').on('change', function(){
    var attribue_id = $(this).val();

    var att_id=this.id;
    var att_val_id="attribute_value_id_"+att_id.split('_')[2];

    if(attribue_id) {
        $.ajax({
            url: '/myform/ajax/'+attribue_id,
            type:"GET",
            dataType:"json",
            // beforeSend: function(){
                // $('#loader').css("visibility", "visible");
            // },

            success:function(data) {

                $('#'+att_val_id).empty();

                $.each(data, function(key, value){
                    var option='';
                    $('#'+att_val_id).append('<option value="'+ key +'">' + value + '</option>');

                });
            },
            // complete: function(){
                // $('#loader').css("visibility", "hidden");
            // }
        });
    } else {
        $('select[name="value[]"]').empty();
    }

});

});
</script>


<script type="text/javascript">

$(document).ready(function(){

  var postURL = "<?php echo url('product.index'); ?>";

  var i=1;


  $('#adds').click(function(){

       i++;

       $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select name="drop[]" id="attribute_id_'+i+'" placeholder="Select"  class="form-control name_list" ><option  value="">--Select Attribute--</option>@foreach ($attributes as $key => $value)<option value="{{ $key }}"> {{ $value }}</option>@endforeach</select><br><select id="attribute_value_id_'+i+'" name="value[]" class="form-control"><option>--Values--</option></select></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');


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