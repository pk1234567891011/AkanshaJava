
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
                <img src="images/home/pricing.png" class="pricing" alt="" />
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
											<li><a href="#">{{$child->name}} </a></li>
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
      </div>
    </div>
  </div>
</div>
@endsection
