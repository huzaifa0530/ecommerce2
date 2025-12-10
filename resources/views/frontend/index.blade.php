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

	<div class="container py-4">
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
				<img class="acc-img" src="img/Drinkware.jpeg" alt="4K Action Camera">
				<div class="acc-overlay">
					<div>
						<h3 class="acc-title h5">Drinkware</h3>
					</div>
				</div>
			</a>
		</div>
	</div>
	<section id="categories-swiper" class="pt-2 pb-2 bg-light">
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
	</section>


<section id="deal" class="pt-4 bg-light">
	<div class="container-fluid">
		<div class="row deal_1">
			<div class="col-md-12">
				<div class="deal_1r">
					
					<div class="row prod_1 mb-4 text-center">
						<div class="col-md-12">
							<h4 class="h_line mb-0">Special Offers</h4>
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

												<h6 class="mt-3 font_14 text-center">
													<a href="{{ route('detail', $product->id) }}">
														{{ $product->name }}
													</a>
												</h6>

												<!-- PRICE SECTION -->
												<div class="text-center mt-2 mb-3">
													<span class="text-decoration-line-through text-muted">
														${{ number_format($product->special_price_before, 2) }}
													</span>
													<span class="mx-2">→</span>
													<span class="text-success fw-bold">
														${{ number_format($product->special_price_after, 2) }}
													</span>
												</div>

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
                <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 clearfix">

                    <h6>
                        <a href="{{ route('detail', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h6>

                    <h6 class="font_13">
                        <a class="col_light" href="{{ route('detail', $product->id) }}">
                            {{ $product->item_size }}
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
                <div class="prod_2i3 clearfix position-absolute w-100">
                    <h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">
                        {{ $product->item_number }}
                    </h6>
                </div>

            </div>
        </div>
    @endforeach
</div>

</div>
</div>




	<section id="testimonials" class="pt-4 pb-5 bg-light">
		<div class="container-xl">
			<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h4 class="h_line mb-0">Client Feedback</h4>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-4">
					<div class="testimonial-card p-4">
						<h5 class="mb-2 fw-bold">Great Product</h5>
						<p class="mb-0">Great service and good quality product and it helped my wife osteoarthritis on
							her knees and hips and myself for arthritis. We have asked our doctor before we used it he
							said it is fine because we are on other medications.</p>
					</div>
					<div class="d-flex align-items-center mt-4">
						<img src="{{ asset('User/img/author-1.jpg') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar"
						>
						<div class="flex-grow-1">
							<h6 class="mb-0 fw-bold">Adam Stoung</h6>
							<small class="text-muted">Furniture Designer</small>
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
				<div class="col-md-8 col-lg-4">
					<div class="testimonial-card p-4">
						<h5 class="mb-2 fw-bold">Great Product</h5>
						<p class="mb-0">Great service and good quality product and it helped my wife osteoarthritis on
							her knees and hips and myself for arthritis. We have asked our doctor before we used it he
							said it is fine because we are on other medications.</p>
					</div>
					<div class="d-flex align-items-center mt-4">
						<img src="{{ asset('User/img/author-1.jpg') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar"
						>
						<div class="flex-grow-1">
							<h6 class="mb-0 fw-bold">Adam Stoung</h6>
							<small class="text-muted">Furniture Designer</small>
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
				<div class="col-md-8 col-lg-4">
					<div class="testimonial-card p-4">
						<h5 class="mb-2 fw-bold">Great Product</h5>
						<p class="mb-0">Great service and good quality product and it helped my wife osteoarthritis on
							her knees and hips and myself for arthritis. We have asked our doctor before we used it he
							said it is fine because we are on other medications.</p>
					</div>
					<div class="d-flex align-items-center mt-4">
						<img src="{{ asset('User/img/author-1.jpg') }}" alt="Adam Stoung" class="rounded-circle me-3 testimonial-avatar"
						>
						<div class="flex-grow-1">
							<h6 class="mb-0 fw-bold">Adam Stoung</h6>
							<small class="text-muted">Furniture Designer</small>
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
		</div>
	</section>

	<section id="features" class="pt-4 pb-4 bg-light">
		<div class="container-xl">
			<div class="row justify-content-between text-center">
				<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-truck"></i></span>
					<h6 class="mb-1">Ship Worldwide</h6>
					<p class="mb-0 text-muted font_14">Lorem ipsum det, consec tetur adipis cing elit duis nec quality</p>
				</div>
				<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-certificate"></i></span>
					<h6 class="mb-1">Premium Quality</h6>
					<p class="mb-0 text-muted font_14">Lorem ipsum det, consec tetur adipis cing elit duis nec quality</p>
				</div>
				<div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-life-ring"></i></span>
					<h6 class="mb-1">Quick Support</h6>
					<p class="mb-0 text-muted font_14">Lorem ipsum det, consec tetur adipis cing elit duis nec quality</p>
				</div>
				<div class="col-12 col-md-6 col-lg-3">
					<span class="d-inline-block fs-1 mb-2"><i class="fa fa-credit-card"></i></span>
					<h6 class="mb-1">Secure Payment</h6>
					<p class="mb-0 text-muted font_14">Lorem ipsum det, consec tetur adipis cing elit duis nec quality</p>
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
	</script>

@endsection