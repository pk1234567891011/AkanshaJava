@extends('frontend.home')
@section('content')
@if(Session::has('flash_message_error'))
<div class="alert alert-error">
	<p>{!! session('flash_message_error') !!}</p>
</div>
@endif
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
              @foreach($category as $categorys)
              @if($categorys->children->count())
                  
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$categorys->name}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$categorys->name}}
										</a>
									</h4>
								</div>
								<div id="{{$categorys->name}}" class="panel-collapse collapse">
									<div class="panel-body">

										<ul>
                    @foreach($categorys->children as $child)
											<li><a href="{{asset('/products/'.$child->name)}}">{{$child->name}} </a></li>
                      @endforeach
										</ul>
									</div>

								</div>
                @else
                @if($categorys->parent_id==0)
                <div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#{{$categorys->name}}">
											<span class="badge pull-right"></span>
											{{$categorys->name}}
										</a>
									</h4>
								</div> 
                @endif
              @endif
              @endforeach

							</div>
						</div>
          </div>
        </div>
        
<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ URL::to('/') }}/products/{{ $product_image->image_name }}" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{asset('images/product-details/similar1.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar2.jpg')}}" alt=""></a>
										  <a href=""><img src="{{asset('images/product-details/similar3.jpg')}}" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
                            <form name="addtocartForm" id="addtocartForm" method="POST" action="{{url('add-cart')}}">
							{{ csrf_field() }}
								<input type="hidden" name="product_id" value="{{$productDetails->id}}">
								<input type="hidden" name="product_name" value="{{$productDetails->name}}">
								<input type="hidden" name="price" value="{{$productDetails->price}}">
								<input type="hidden" name="quantity" value="{{$productDetails->quantity}}">
								
								<div class="product-information"><!--/product-information-->
									<img src="{{asset('images/product-details/new.jpg')}}" class="newarrival" alt="" />
									<h2>{{$productDetails->name}}</h2>
									<p>ProductID:{{$productDetails->id}}</p>
									<img src="{{asset('images/product-details/rating.png')}}" alt="" />
									<span>
										<span>INR {{$productDetails->price}}</span>
										<label>Quantity:</label>
										<input type="text" value="{{$productDetails->quantity}}" />
										<button type="submit" class="btn btn-fefault cart">
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button>
									</span>
									<p><b>Availability:</b> In Stock</p>
									<p><b>Condition:</b> New</p>
									<p><b>Brand:</b> E-SHOPPER</p>
									<a href=""><img src="{{asset('images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
								</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Details</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
								<li><a href="#tag" data-toggle="tab">Tag</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag" >
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery1.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery2.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery3.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="{{asset('images/home/gallery4.jpg')}}" alt="" />
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
									</ul>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="{{asset('images/product-details/rating.png')}}" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
				</div>
                </section>
                @endsection