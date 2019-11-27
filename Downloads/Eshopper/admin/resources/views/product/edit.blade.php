@extends('admin.admin_template')
@section('content')
 <form name="add_name" id="add_name" action="{{url('product', [$product->id])}}" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">

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
    
         <div class="table-responsive">

                <table class="table table-bordered" id="dynamic_field">
                   <tr>
                     <td>
		<div class="form-group">
			 <label for="ProductName">Product Name:</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}">
		</div>
                     </td>
                     <td>
                     <div class="form-group">
			 <label for="sku">sku:</label>
            <input type="text" class="form-control" name="sku" value="{{$product->sku}}">
		</div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                     <div class="form-group">
			 <label for="shortDescription">Short Description:</label>
            <input type="text" class="form-control" name="short_description" value="{{$product->short_description}}">
		</div>
                     </td>
                     <td>
                     <div class="form-group">
			 <label for="longDescription">Long Description:</label>
            <input type="text" class="form-control" name="long_description" value="{{$product->long_description}}">
		</div>
                     </td>
                    <tr>
                      <td>
                      <div class="form-group">
			 <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" value="{{$product->price}}">
		</div>
                      </td>
                      <td>
                      <div class="form-group">
			 <label for="special_price">Special Price:</label>
            <input type="text" class="form-control" name="special_price" value="{{$product->special_price}}">
		</div>
                      </td>
                      </tr>
                      <tr>
                      <td>
                      <div class="form-group">
                      <label for="select">Select Category:</label>
    <select class="form-control" id="post" name="CID">
    	<option value="">Select Category</option>
		@foreach($categories as $cat)
    	<option value="{{ $cat->id}}" @if($product_categories->category_id==$cat->id)
    	selected @endif>{{ $cat->name }}
    	</option>
    	@endforeach
    </select>
    </div>
                      </td>
                      
                   </tr>
                   <tr>
                     <td>
                     <div class="form-group">
			 <label for="special price from">special price from:</label>
            <input type="date" class="form-control" name="special_price_from" value="{{$product->special_price_from}}">
		</div>
                     </td>
                     <td>
                     <div class="form-group">
			 <label for="shortDescription">special price from:</label>
            <input type="date" class="form-control" name="special_price_to" value="{{$product->special_price_to}}">
		</div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                     <div class="col-xs-12">
        <div class="form-group">
            <strong>Status :</strong>
            <input type="radio"  name="status" value="active"  {{ $product->status =="active" ? 'checked' : '' }}>
            <label for="Active">Active</label>
            <input type="radio"  name="status" value="inactive"  {{ $product->status =="inactive" ? 'checked' : '' }}>
            <label for="InActive">InActive</label>
        </div>
                     </td>
                     <td>
                     <div class="form-group">
			 <label for="quantity">quantity:</label>
            <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}">
		</div>
                     </td>
                   </tr>
                   <tr>
                   <td>
                     <div class="form-group">
			 <label for="metTitle">Meta Title:</label>
            <input type="text" class="form-control" name="meta_title" value="{{$product->meta_title}}">
		</div>
                     </td>
                     <td>
                      <div class="form-group">
			 <label for="metaDescription">Meta Description:</label>
            <input type="text" class="form-control" name="meta_description" value="{{$product->meta_description}}">
		</div>
                     </td>
                   </tr>
                   <tr>
                     <td>
                     <div class="form-group">
			 <label for="MetaKeywords">Meta Keyword:</label>
            <input type="text" class="form-control" name="meta_keywords" value="{{$product->meta_keywords}}">
		</div>
                     </td>
                     <td>
                     <div class="form-group">
			 <label for="isFeatures">is Features:</label>
            <input type="text" class="form-control" name="is_featured" value="{{$product->is_featured}}">
		</div>
                     </td>
                   </tr>
                   @foreach($product->imgs as $images)
                    <tr>
                    
		
			
                        <td><img src="{{ URL::to('/') }}/products/{{ $images->image_name }}" class="img-thumbnail" /
	    	style="height: 40px;width: 40px"></td>
            @endforeach
                        

                    </tr>
                    <tr>
                    <td>
                    <input type="file" name="names[]" placeholder="Enter your Name" class="form-control name_list" /><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                   </tr>
                </table>

                <div class="col-xs-12">
		<a class="btn btn-xs btn-success" href="{{route('product.index')}}">Back</a>
		<button type="submit" class="btn btn-xs btn-primary" name="button">Submit</button>
	</div>
            </div>


         </form>

    </div>
    <script type="text/javascript">

$(document).ready(function(){

  var postURL = "<?php echo url('product.index'); ?>";

  var i=1;


  $('#add').click(function(){

       i++;

       $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td> <input type="file" name="names[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

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


@endsection
