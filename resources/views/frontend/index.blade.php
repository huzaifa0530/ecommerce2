@extends('layouts.Frontend.app')

@section('title', 'Eco Mart')

@section('content')

	<!-- <section id="center" class="center_home">
	 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
		<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	  </div>
	  <div class="carousel-inner">
		<div class="carousel-item active">
		  <img src="img/Journals.jpeg" class="d-block w-100" alt="...">
		  <div class="carousel-caption d-md-block">
			 <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Smart Watch</span></h1>
			 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
			 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="img/Bags.jpeg" class="d-block w-100" alt="...">
		   <div class="carousel-caption d-md-block">
			 <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Smart Phone</span></h1>
			 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
			 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
		  </div>
		</div>
		<div class="carousel-item">
		  <img src="img/Blankets.jpeg" class="d-block w-100" alt="...">
		   <div class="carousel-caption d-md-block">
			 <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
			 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
			 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
		  </div>
		</div>
	  </div>
	  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	  </button>
	  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	  </button>
	</div>
	</section> -->

	<!-- <div class="container py-4">
		<div class="accordion-row">
			<a class="acc-item" href="#">
				<img class="acc-img" src="{{ asset('User/img/Bags.jpeg') }}" alt="Wireless Headphones">

				<div class="acc-overlay">
					<div>
						<h3 class="acc-title h5">Bags</h3>
					</div>
				</div>
			</a>
			<a class="acc-item" href="#">
				<img class="acc-img" src="{{ asset('User/img/Journals.jpeg') }}" alt="Smart Watch">
				<div class="acc-overlay">
					<div>
						<h3 class="acc-title h5">Journals</h3>
					</div>
				</div>
			</a>
			<a class="acc-item" href="#">
				<img class="acc-img" src="{{ asset('User/img/Blankets.jpeg') }}" alt="Bluetooth Speaker">
				<div class="acc-overlay">
					<div>
						<h3 class="acc-title h5">Blankets</h3>
					</div>
				</div>
			</a>
			<a class="acc-item" href="#">
				<img class="acc-img" src="{{ asset('User/img/Glassware.jpeg') }}" alt="4K Action Camera">
				<div class="acc-overlay">
					<div>
						<h3 class="acc-title h5">Glassware</h3>
					</div>
				</div>
			</a>
			<a class="acc-item" href="#">
				<img class="acc-img" src="{{ asset('User/img/Drinkware.jpeg') }}" alt="4K Action Camera">
				<div class="acc-overlay">
					<div>
						<h3 class="acc-title h5">Drinkware</h3>
					</div>
				</div>
			</a>
		</div>
	</div> -->

	<section id="center" class="center_home">
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="" aria-current="true"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('User/img/Blankets_with_bgc.png') }}" class="d-block w-100" alt="...">
      <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Smart Watch</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="{{ asset('User/img/Bags_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Smart Phone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
    <div class="carousel-item">
      <img src="{{ asset('User/img/Aprons_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
	    <div class="carousel-item">
      <img src="{{ asset('User/img/Fast_Shipping_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
	    <div class="carousel-item">
      <img src="{{ asset('User/img/Drawstring_Bags_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
	 <div class="carousel-item">
      <img src="{{ asset('User/img/Custom_Orders_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
		 <div class="carousel-item">
      <img src="{{ asset('User/img/Messenger_bags_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
		 <div class="carousel-item">
      <img src="{{ asset('User/img/Laundry_Bags_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
		 <div class="carousel-item">
      <img src="{{ asset('User/img/Wine_Bags_with_bgc.png') }}" class="d-block w-100" alt="...">
       <!-- <div class="carousel-caption d-md-block">
         <h1 class="text-white fw-normal font_50 text-uppercase">Top Deal Today ! <br> <span class="fw-bold">Headphone</span></h1>
		 <p class="fs-6 mt-4">Get up to <span class="col_yell fw-bold">50%</span> off Today Only</p>
		 <h6 class="text-uppercase mt-4 mb-0"><a class="button" href="#">SHOP NOW</a></h6>
      </div> -->
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>


<section id="categories-swiper" class="py-3 bg-light mt-5">
    <div class="container-xl position-relative">

        <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="mb-0">Featured Categories</h6>
            <div class="d-none d-md-flex gap-2">
                <button class="btn btn-sm btn-outline-secondary cat-prev" type="button">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary cat-next" type="button">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <div class="cat-swiper-track" id="catSwiperTrack">

            <!-- Drinkware -->
            <a href="{{ route('product', ['category' => 'Drinkware']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-drinkware-64.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Drinkware</div>
            </a>

            <!-- Glassware -->
            <a href="{{ route('product', ['category' => 'Glassware']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-glass-50.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Glassware</div>
            </a>

            <!-- Bags & Backpacks -->
            <a href="{{ route('product', ['category' => 'Bags & Backpacks']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-bags-60.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Bags &amp; Backpacks</div>
            </a>

            <!-- Office & Writing -->
            <a href="{{ route('product', ['category' => 'Office & Writing']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-office-70.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Office &amp; Writing</div>
            </a>

            <!-- Clothing & Apparel -->
            <a href="{{ route('product', ['category' => 'Clothing & Apparel']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-suit-48.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Clothing &amp; Apparel</div>
            </a>

            <!-- Technology -->
            <a href="{{ route('product', ['category' => 'Technology']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-technology-50 (1).png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Technology</div>
            </a>

            <!-- Outdoor & Leisure -->
            <a href="{{ route('product', ['category' => 'Outdoor & Leisure']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-outdoor-60.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Outdoor &amp; Leisure</div>
            </a>

            <!-- Home & Auto -->
            <a href="{{ route('product', ['category' => 'Home & Auto']) }}"
               class="cat-card text-center text-decoration-none">
                <div class="cat-image">
                    <img src="{{ asset('User/img/icons8-home-100.png') }}" class="img-fluid">
                </div>
                <div class="cat-label">Home &amp; Auto</div>
            </a>

        </div>

        <div class="d-flex d-md-none justify-content-center gap-2 mt-2">
            <button class="btn btn-sm btn-outline-secondary cat-prev">
                <i class="fa fa-chevron-left"></i>
            </button>
            <button class="btn btn-sm btn-outline-secondary cat-next">
                <i class="fa fa-chevron-right"></i>
            </button>
        </div>

    </div>
</section>


	<!-- <section id="categories-swiper" class="pt-2 pb-2 bg-light">
		<div class="container-xl position-relative">

			<div class="d-flex align-items-center justify-content-between mb-2">
				<h6 class="mb-0">Featured Categories</h6>
				<div class="d-none d-md-flex gap-2">
					<button class="btn btn-sm btn-outline-secondary cat-prev" type="button" aria-label="Previous">
						<i class="fa fa-chevron-left"></i>
					</button>
					<button class="btn btn-sm btn-outline-secondary cat-next" type="button" aria-label="Next">
						<i class="fa fa-chevron-right"></i>
					</button>
				</div>
			</div>

			<div class="cat-swiper-track" id="catSwiperTrack">

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-drinkware-64.png') }}" alt="Drinkware" class="img-fluid">
					</div>
					<div class="cat-label">Drinkware</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-glass-50.png') }}" alt="Glassware" class="img-fluid">
					</div>
					<div class="cat-label">Glassware</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-bags-60.png') }}" alt="Bags & Backpacks" class="img-fluid">
					</div>
					<div class="cat-label">Bags &amp; Backpacks</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-office-70.png') }}" alt="Office & Writing" class="img-fluid">
					</div>
					<div class="cat-label">Office &amp; Writing</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-suit-48.png') }}" alt="Clothing & Apparel" class="img-fluid">
					</div>
					<div class="cat-label">Clothing &amp; Apparel</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-technology-50 (1).png') }}" alt="Technology" class="img-fluid">
					</div>
					<div class="cat-label">Technology</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-outdoor-60.png') }}" alt="Outdoor & Leisure" class="img-fluid">
					</div>
					<div class="cat-label">Outdoor &amp; Leisure</div>
				</a>

				<a href="#" class="cat-card text-center text-decoration-none">
					<div class="cat-image">
						<img src="{{ asset('User/img/icons8-home-100.png') }}" alt="Home & Auto" class="img-fluid">
					</div>
					<div class="cat-label">Home &amp; Auto</div>
				</a>

			</div>

			<div class="d-flex d-md-none justify-content-center gap-2 mt-2">
				<button class="btn btn-sm btn-outline-secondary cat-prev" type="button" aria-label="Previous">
					<i class="fa fa-chevron-left"></i>
				</button>
				<button class="btn btn-sm btn-outline-secondary cat-next" type="button" aria-label="Next">
					<i class="fa fa-chevron-right"></i>
				</button>
			</div>
		</div>
	</section> -->


<section id="deal" class="pt-4 bg-light mt-5">
	<div class="container-fluid">
		<div class="row deal_1">
			<div class="col-md-12">
				<div class="deal_1r">
					
					<div class="row prod_1 mb-4 text-center">
						<div class="col-md-12">
							<h4 class="h_line mb-0">Deals Of The Month</h4>
						</div>
					</div>

					<div class="deal_1r2">
						<div id="offerCarousel" class="carousel slide" data-bs-ride="carousel">

							<div class="carousel-inner">

								@php  
									$chunks = $products->chunk(4);  
								@endphp

								@foreach($chunks as $chunkIndex => $chunk)
								<div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
									<div class="row justify-content-center">

										@foreach($chunk as $product)
										<div class="col-md-3">
											<div class="bg-white p-2 rounded shadow-sm">
												<div class="text-center">
													@if($product->images->first())
														<a href="{{ route('detail', $product->id) }}">
															<img class="w-100" 
																 src="{{ asset('storage/'.$product->images->first()->image_path) }}" 
																 alt="{{ $product->name }}">
														</a>
													@else
														<img src="https://via.placeholder.com/300" class="w-100">
													@endif
												</div>

												<div class="prod_2i3 clearfix position-relative w-100 text-center">
				<h6 class="bg_yell d-inline-block pt-2 pb-2 font_14 text-white ps-3 pe-3">
					{{ $product->item_size }}
				</h6>
			</div>

												<h6 class="mt-3 font_14 fs-5 text-start">
													<a href="{{ route('detail', $product->id) }}">
														{{ $product->name }}
													</a>
												</h6>

												 <h6 class="font_13 text-start">
                        <a class="col_light fs-6" href="{{ route('detail', $product->id) }}">
                           {{ Str::limit($product->description, 50) }}
                        </a>

						
                    </h6>

												<!-- PRICE SECTION -->
												<div class="text-center mt-3 mb-3">
													<span class="text-decoration-line-through text-muted">
														Was ${{ number_format($product->special_price_before, 2) }}
													</span> <br>
													<!-- <span class="mx-2">→</span> -->
													<span class="fw-bold fs-5 bulb-text text-danger">
														Now ${{ number_format($product->special_price_after, 2) }}
													</span>
												</div>

											</div>
											<div class="prod_2i3 clearfix position-absolute w-100 text-start">
				<h6 class="bg_yell d-inline-block pt-2 pb-2 font_14 text-white ps-3 pe-3">
					{{ $product->item_number }}
				</h6>
			</div>
										</div>
										@endforeach

									</div>
								</div>
								@endforeach

							</div>

							<!-- Indicators -->
							<div class="carousel-indicators">
								@foreach($chunks as $chunkIndex => $chunk)
								<button type="button"
									data-bs-target="#offerCarousel"
									data-bs-slide-to="{{ $chunkIndex }}"
									class="{{ $chunkIndex == 0 ? 'active' : '' }}">
								</button>
								@endforeach
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<!-- Popular Products Section -->
	<section id="prod" class="pt-4 pb-4">
		<div class="container-xl">
  		<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h4 class="h_line mb-0">Popular Products</h4>
				</div>
			</div>

   <div class="row prod_2 text-center">
    @foreach ($popularProducts as $product)
        <div class="col-md-3 mb-4">
            <div class="prod_2im position-relative clearfix">

                <!-- IMAGE -->
                <div class="prod_2i1 clearfix">
                    <div class="grid clearfix">
                        <figure class="effect-jazz mb-0">
                            <a href="{{ route('detail', $product->id) }}">
                                @php
                                    $image = $product->images->first();
                                @endphp

                                <img src="{{ $image ? asset('storage/'.$image->image_path) : asset('User/img/no-image.png') }}"
                                     class="w-100" alt="{{ $product->name }}" style="height:300px">
                            </a>
                        </figure>
                    </div>
                </div>

                <!-- PRODUCT TITLE, SIZE, PRICE -->
                <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 clearfix text-start">

				<div class="prod_2i3 clearfix position-relative w-100 text-center">
				<h6 class="bg_yell d-inline-block pt-2 pb-2 font_14 text-white ps-3 pe-3">
					{{ $product->item_size }}
				</h6>
			</div>
                    <h6>
                        <a href="{{ route('detail', $product->id) }}" class="fs-5">
                            {{ $product->name }}
                        </a>
                    </h6>

                    <h6 class="font_13">
                        <a class="col_light fs-6" href="{{ route('detail', $product->id) }}">
                            {{ Str::limit($product->description, 50) }}
                        </a>
                    </h6>
<!-- 
                    <hr>

                    <h6 class="fw-normal mb-0">
                        <span class="pull-right fw-bold col_yell">
                            @if($product->special_price_after)
                                ${{ $product->special_price_after }}
                            @else
                                {{ $product->regular_price ?? 'Contact' }}
                            @endif
                        </span>
                    </h6> -->
                </div>

                <!-- ITEM NUMBER LABEL -->
                <div class="prod_2i3 clearfix position-absolute w-100 text-start">
                    <h6 class="bg_yell d-inline-block pt-2 pb-2 font_14 text-white ps-3 pe-3">
                        {{ $product->item_number }}
                    </h6>
                </div>

            </div>
        </div>
    @endforeach
</div>

</div>
</div>


<div class="container my-5" id="new-arrival">

    <div class="promo-banner">
        <div class="row align-items-center">

            <!-- Text Content (optional: use first product for title) -->
            <div class="col-md-7">
                <div class="promo-subtitle mb-2 bulb-text fs-4 fw-bold">Newly Arrival</div>
                <h1 class="promo-title mb-3">Styles You’ve Been Waiting For.</h1>
                <!-- <h1 class="promo-title mb-3">{{ $newProducts->first()->name ?? 'Feel-Good Shopping' }}</h1> -->
                <p class="promo-text mb-4 fs-5">
                    Explore the latest
                </p>
            </div>

            <!-- Carousel Images -->
            <div class="col-md-5">
                <div class="deal_1r2" style="border: none; margin: 0; padding: 0;">
                    <div id="carouselNewProducts" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2500">
                        <div class="carousel-inner">
                            @foreach($newProducts as $key => $product)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="deal_1r2i row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="prod_2im position-relative clearfix">
                                                <div class="prod_2i1 clearfix">
                                                    <div class="grid clearfix">
                                                        <figure class="effect-jazz mb-0">
                                                            <a href="{{ route('detail', $product->id) }}">
                                                               			<img src="{{ asset('storage/' . $product->images->first()->image_path) }}" class="w-100"
											alt="{{ $product->name }}">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                </div>
                                                <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 clearfix" style="background-color: white;">
                                                    <h6><a href="{{ route('detail', $product->id) }}">{{ $product->name }}</a></h6>
                                                    <h6 class="font_13"><a class="col_light" href="{{ route('detail', $product->id) }}">
                                                        {{ $product->item_size ?? '' }}
                                                    </a></h6>
                                                    <hr>
                                                    @if($product->special_price_after)
                                                        <h6 class="fw-normal mb-0">
                                                            <span class="pull-right fw-bold col_yell">${{ $product->special_price_after }}</span>
                                                        </h6>
                                                    @endif
                                                </div>
                                                <div class="prod_2i3 clearfix position-absolute w-100">
                                                    <h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">
                                                        {{ $product->item_number ?? '' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNewProducts" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselNewProducts" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


	<section id="testimonials" class="pt-4 pb-5 bg-light">
		<div class="container-xl position-relative">
			<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h4 class="h_line mb-0">Client Feedback</h4>
				</div>
			</div>

			<div class="swiper testimonials-swiper">
				<div class="swiper-wrapper">

				<div class="swiper-slide">
						<div class="testimonial-card p-4" style="height:290px;">
							<h5 class="mb-2 fw-bold">Great Service</h5>
							<p class="mb-0">The customer service team deserves a standing ovation. I had a small query regarding setup, and the representative I spoke with was exceptionally knowledgeable, friendly, and patient. They resolved my issue within minutes, going above and beyond to ensure I was completely satisfied. Their prompt, professional, and genuinely helpful attitude made the entire purchase experience smooth and stress-free. Outstanding support is hard to come by, and this company has mastered it.</p>
						</div>
						<div class="d-flex align-items-center mt-4">
							<img src="{{ asset('User/img/Lisa.webp') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar">
							<div class="flex-grow-1">
								<h6 class="mb-0 fw-bold">Lisa Brownie</h6>
								<div class="mt-1 text-warning">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
					
					<div class="swiper-slide">
						<div class="testimonial-card p-4" style="height:290px;">
							<h5 class="mb-2 fw-bold">Great Product</h5>
							<p class="mb-0">The product truly exceeded all my expectations. It's rare to find an item that is so perfectly designed for its purpose, and I can confidently say this is a game-changer. I highly recommend it to anyone looking for tote bags durability and reliability. </p>
						</div>
						<div class="d-flex align-items-center mt-4">
							<img src="{{ asset('User/img/George.jpg') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar">
							<div class="flex-grow-1">
								<h6 class="mb-0 fw-bold">George Gardner</h6>
								<div class="mt-1 text-warning">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>

					<div class="swiper-slide">
						<div class="testimonial-card p-4" style="height:290px;">
							<h5 class="mb-2 fw-bold">Commitment</h5>
							<p class="mb-0">We recently received our order, and I felt compelled to share how impressed we are with the entire delivery process. In an industry where timelines often slip, Inkwell Impressions demonstrated remarkable commitment to their delivery promise.</p>
						</div>
						<div class="d-flex align-items-center mt-4">
							<img src="{{ asset('User/img/John.jpg') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar">
							<div class="flex-grow-1">
								<h6 class="mb-0 fw-bold">John Kelly</h6>
								<div class="mt-1 text-warning">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>

					

					<div class="swiper-slide">
						<div class="testimonial-card p-4" style="height:290px;">
							<h5 class="mb-2 fw-bold">Good Quality</h5>
							<p class="mb-0">The build quality of this item is exceptional. It is clearly constructed from premium, durable materials that feel solid and long-lasting. There are no flimsy components or cheap shortcuts taken—this product is built to endure. The craftsmanship is evident in every detail, assuring me that this was a wise, long-term investment. The value you receive for this level of quality is unmatched.</p>
						</div>
						<div class="d-flex align-items-center mt-4">
							<img src="{{ asset('User/img/Alex.webp') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar">
							<div class="flex-grow-1">
								<h6 class="mb-0 fw-bold">Alex Smith</h6>
								<div class="mt-1 text-warning">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
						</div>
					</div>
					
				</div>

				<div class="swiper-pagination d-md-none"></div>
				<div class="swiper-button-prev d-none d-md-flex"></div>
				<div class="swiper-button-next d-none d-md-flex"></div>
			</div>
		</div>
	</section>

	<section id="features" class="py-5">
		<div class="container-fluid">
			<div class="row justify-content-between text-center">
				<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-truck"></i></span>
					<h6 class="mb-1">Ship Worldwide</h6>
					<p class="mb-0 text-muted font_14">"We offer reliable international shipping to bring our products directly to your doorstep, no matter where you are."</p>
				</div>
				<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-certificate"></i></span>
					<h6 class="mb-1">Premium Quality</h6>
					<p class="mb-0 text-muted font_14">"We are committed to premium quality, ensuring that every piece is crafted with meticulous attention to detail and the finest materials."</p>
				</div>
				<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-life-ring"></i></span>
					<h6 class="mb-1">Quick Support</h6>
					<p class="mb-0 text-muted font_14">"Our dedicated team is on standby to provide quick support and ensure your business never misses a beat."</p>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-credit-card"></i></span>
					<h6 class="mb-1">Secure Payment</h6>
					<p class="mb-0 text-muted font_14">"We prioritize your privacy by ensuring every purchase is processed through a fully secure and verified payment gateway."</p>
				</div>
			</div>
		</div>
	</section>

	

	<!-- <section id="subs" class="pt-5 pb-5 bg_blue">
			<div class="container-xl">
				<div class="row subs_1">
					<div class="col-md-6">
						<div class="subs_1l">
							<span class="d-inline-block col_yell font_50 float-start me-3"><i
									class="fa fa-envelope-o"></i></span>
							<h4 class="text-white">Newsletter & Get Updates</h4>
							<p class="mb-0 text-light">Sign up for our newsletter to get up-to-date from us</p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="subs_1r">
							<div class="input-group p-2">
								<input type="text" class="form-control border-0 bg-transparent"
									placeholder="Enter Your Email">
								<span class="input-group-btn">
									<button class="btn btn-primary bg_yell border-0 fs-6" type="button">
										SUBSCRIBE </button>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->


	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.drop_cat .dropdown-submenu > a').forEach(function (el) {
				el.addEventListener('click', function (e) {
					var submenu = this.nextElementSibling;
					if (submenu && submenu.classList.contains('dropdown-menu')) {
						e.preventDefault();
						e.stopPropagation();
						var parentMenu = this.closest('.dropdown-menu');
						if (parentMenu) {
							parentMenu.querySelectorAll('.dropdown-menu.show').forEach(function (open) {
								if (open !== submenu) open.classList.remove('show');
							});
						}
						submenu.classList.toggle('show');
					}
				});
			});

			// Cleanup all nested menus when the root dropdown hides
			document.querySelectorAll('#navbar_sticky .dropdown').forEach(function (dd) {
				dd.addEventListener('hidden.bs.dropdown', function () {
					this.querySelectorAll('.dropdown-menu.show').forEach(function (open) {
						open.classList.remove('show');
					});
				});
			});
		});

		// Sticky navbar handlers
		window.onscroll = function () { myFunction() };

		var navbar_sticky = document.getElementById("navbar_sticky");
		var sticky = navbar_sticky.offsetTop;
		var navbar_height = document.querySelector('.navbar').offsetHeight;

		function myFunction() {
			if (window.pageYOffset >= sticky + navbar_height) {
				navbar_sticky.classList.add("sticky")
				document.body.style.paddingTop = navbar_height + 'px';
			} else {
				navbar_sticky.classList.remove("sticky");
				document.body.style.paddingTop = '0'
			}
		}

		document.addEventListener('DOMContentLoaded', function () {
			var track = document.getElementById('catSwiperTrack');
			if (!track) return;
			var prevButtons = document.querySelectorAll('.cat-prev');
			var nextButtons = document.querySelectorAll('.cat-next');
			var scrollByVal = Math.max(track.clientWidth * 0.8, 200);
			prevButtons.forEach(function (btn) {
				btn.addEventListener('click', function () {
					track.scrollBy({ left: -scrollByVal, behavior: 'smooth' });
				});
			});
			nextButtons.forEach(function (btn) {
				btn.addEventListener('click', function () {
					track.scrollBy({ left: scrollByVal, behavior: 'smooth' });
				});
			});
		});

		document.addEventListener('DOMContentLoaded', function () {
			var el = document.querySelector('#testimonials .testimonials-swiper');
			if (!el || typeof Swiper === 'undefined') return;
			new Swiper(el, {
				loop: true,
				spaceBetween: 24,
				slidesPerView: 1,
				pagination: {
					el: '#testimonials .swiper-pagination',
					clickable: true
				},
				navigation: {
					nextEl: '#testimonials .swiper-button-next',
					prevEl: '#testimonials .swiper-button-prev'
				},
				breakpoints: {
					768: { slidesPerView: 2 },
					992: { slidesPerView: 3 }
				}
			});
		});
	</script>
</section>
@endsection