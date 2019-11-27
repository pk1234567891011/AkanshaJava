
@extends('frontend.home')
@section('content')

<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							 @foreach($sliders as $photo)
                <li data-target="#slider-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
            @endforeach
        </ol>

						<div class="carousel-inner">
              @foreach($sliders as $slider)
              <div class="item image {{ $loop->first ? ' active' : '' }}">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div  class="col-sm-6">
                <img class="girl img-responsive" src="{{$slider->banner_path}}" alt="slider" style="height:auto;width:auto"  title="Image Slideshow" >
                <img src="{{asset('images/home/pricing.png')}}" class="pricing" alt="" />
								</div>
							</div>
              @endforeach
						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->
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
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        @foreach($productsAll as $products)
                        @foreach($products->imgs as $images)
                        @if($images->status=='active')
						<div class="col-sm-4">
						
							<div class="product-image-wrapper">
							
								<div class="single-products">
										<div class="productinfo text-center">
                                       
											<img src="{{ URL::to('/') }}/products/{{ $images->image_name }}" style="height:100px ;width:auto" alt="" />
                                        
											<h2>INR {{$products->price}}</h2>
											<p>{{$products->name}}</p>
											<a href="{{url('prod/'.$products->id )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>INR {{$products->price}}</h2>
												<p>{{$products->name}}</p>
												<a href="{{url('prod/'.$products->id )}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
                                        
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
                        @endif
                        @endforeach
						@endforeach
                    </div>
</div>
@endsection
