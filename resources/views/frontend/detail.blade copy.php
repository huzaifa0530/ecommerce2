<!-- <section id="top">
	<div class="container-fluid">
		<div class="row top_1">
			<div class="col-md-8">
				<div class="top_1i">
					<ul class="mb-0">
						<li class="nav-item text-light d-inline-block font_13 me-2 pe-2">
							Ship to
						</li>

						<li class="nav-item dropdown d-inline-block me-2 pe-2">
							<a class="dropdown-toggle text-light font_13" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa fa-flag col_yell me-1"></i> US/USD
							</a>
							<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#"> € EUR</a></li>
								<li><a class="dropdown-item" href="#"> $ USD</a></li>
							</ul>
						</li>

						<li class="nav-item text-light d-inline-block font_13 me-2 pe-2">
							Quick Guide
						</li>

						<li class="nav-item dropdown d-inline-block me-4 pe-2">
							<a class="dropdown-toggle text-light font_13" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Help
							</a>
							<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#"> Returns</a></li>
								<li><a class="dropdown-item" href="#"> Privacy</a></li>
								<li><a class="dropdown-item" href="#"> Terms</a></li>
							</ul>
						</li>

						<li class="nav-item dropdown d-inline-block border-0">
							<a class="dropdown-toggle text-light font_13" href="#" id="navbarDropdown" role="button"
								data-bs-toggle="dropdown" aria-expanded="false">
								Sell With Us
							</a>
							<ul class="dropdown-menu drop_1" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#"> Seller Login</a></li>
							</ul>
						</li>



					</ul>
				</div>
			</div>
			<div class="col-md-4">
				<div class="top_1i text-end">
					<ul class="mb-0">
						<li class="nav-item  d-inline-block font_13 me-2 pe-2">
							<a class="text-light" href="#"><i class="fa fa-sign-in col_yell me-1"></i> Sign In</a>
						</li>
						<li class="nav-item  d-inline-block font_13 border-0">
							<a class="text-light" href="#"><i class="fa fa-user col_yell me-1"></i> My Account</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section> -->
@extends('layouts.Frontend.app')

@section('title', 'Eco Mart')

@section('content')


<section id="center" class="center_o pt-4 pb-4 bg-light">
	<div class="container-xl">
		<div class="row center_o1 text-center">
			<div class="col-md-12">
				<h1>PRODUCT DETAIL</h1>
				<h6 class="d-inline-block bg-white font_14 col_yell"><a class="col_light" href="#">Home</a> <span
						class="me-2 ms-2">/</span> Product Detail</h6>
			</div>
		</div>
	</div>
</section>

<section id="detail" class="pt-4 pb-4">
	<div class="container-xl">
		<div class="row detail_1">
			<div class="col-md-5">
				<div class="detail_1l">
					<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
								class="active" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
								aria-label="Slide 2" class="" aria-current="true"></button>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
								aria-label="Slide 3"></button>
						</div>

						<div class="carousel-inner">


							@foreach($product->images as $img)
							<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
								<img src="{{ asset('storage/' . $img->image_path) }}" class="d-block w-100 " alt="">
							</div>
							@endforeach
						</div>
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
							data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
							data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>

				<div class="mt-5 mb-3">
					<label class="fw-bold mb-2 d-block">Available Colors:</label>
					<ul class="mb-0">
						@foreach($product->colors as $color)
						<li class="d-inline-block text-center me-3">
							{{-- Color Name --}}
							<div style="font-size:12px; margin-top:4px;">{{ $color->color_name }}</div>

							{{-- Color Swatch --}}
							<a href="#" title="{{ $color->color_name }}" aria-label="{{ $color->color_name }}" style="display:inline-block;
						  width:26px;
						  height:26px;
						  background: {{ $color->color_hex ?? $color->color_name }};
						  border:2px solid #e5e7eb;
						  box-shadow:inset 0 0 0 2px rgba(255,255,255,.6);">
							</a>
						</li>
						@endforeach
					</ul>
				</div>

			</div>
			<div class="col-md-7">
				<div class="detail_1r">
					<h6 class="d-inline-block bg_yell text-white font_12 ps-3 pe-3 pt-2 pb-2 rounded-1">XYZ600</h6>
					<h4 class="mt-2">{{ $product->name }}</h4>
					<div class="container my-3">
						<div class="row text-center border">
							<div class="col-md-6 py-2 border-end">
								<span class="fw-bold text-danger">Item Size:</span>
								<span>{{ $product->item_size }}</span>
							</div>
							<div class="col-md-6 py-2">
								<span class="fw-bold text-danger">Imprint Area:</span>
								<span>{{ $product->imprint_area }}</span>
							</div>
						</div>
					</div>
					@php
					$topTabs = $product->tabs->where('section', 'top');
					@endphp

					@if($topTabs->count() > 0)
					<div class="row detail_2 mt-3">
						<div class="col-md-12">
							<ul class="nav nav-tabs mb-0 justify-content-center">
								@foreach($topTabs as $index => $tab)
								<li class="nav-item d-inline-block me-1">
									<a href="#tab-{{ $tab->id }}" data-bs-toggle="tab" aria-expanded="false"
										class="nav-link {{ $index == 0 ? 'active' : '' }}">
										<span class="d-md-block">{{ strtoupper($tab->title) }}</span>
									</a>
								</li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="detail_3 row mt-4">
						<div class="tab-content w-100">
							@foreach($topTabs as $index => $tab)
							<div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="tab-{{ $tab->id }}">
								<div class="tab_i row">
									<div class="col-md-12">
										<h6>{{ strtoupper($tab->title) }}</h6>

										{{-- Optional Description --}}
										@if(!empty($tab->description))
										<div class="tab_ir mb-3">
											{!! $tab->description !!}
										</div>
										@endif

										{{-- Table --}}
										<div class="row justify-content-center">
											<div class="col-12">
												<div class="table-responsive">
													<table class="table table-bordered mb-0">
														@if($tab->rows->count() > 0)
														@php
														$firstRow = $tab->rows->first();
														@endphp

														{{-- Table Header: First Row --}}
														<thead class="table-light">
															<tr>


																<th scope="col">{{ $firstRow->label }}</th>

																{{-- Other cells: column names --}}
																@foreach($firstRow->cells as $cell)
																<th scope="col">{{ $cell->value }}</th>
																@endforeach
															</tr>
														</thead>

														{{-- Table Body: All Rows except First --}}
														<tbody>
															@foreach($tab->rows->slice(1) as $row)
															<tr>
																<th scope="row">{{ $row->label }}</th>
																@foreach($row->cells as $cell)
																<td>{{ $cell->value }}</td>
																@endforeach
															</tr>
															@endforeach
														</tbody>
														@endif
													</table>
												</div>


											</div>
										</div>

									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					@endif


				</div>
			</div>
@php
    $bottomTabs = $product->tabs->where('section', 'bottom');
@endphp

@if($bottomTabs->count() > 0)
    <div class="row detail_2 mt-3">
        <div class="col-md-12">
            {{-- Tab Headers --}}
            <ul class="nav nav-tabs mb-0 justify-content-start" id="bottomTabsNav">
                @foreach($bottomTabs as $tab)
                    <li class="nav-item d-inline-block me-1">
                        <a href="#bottom-tab-{{ $tab->id }}" data-bs-toggle="tab"
                           class="nav-link">
                            <span class="d-md-block">{{ strtoupper($tab->title) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="detail_3 row mt-4">
        <div class="tab-content w-100" id="bottomTabsContent">
            @foreach($bottomTabs as $tab)
                <div class="tab-pane fade" id="bottom-tab-{{ $tab->id }}">
                    <div class="tab_i row">
                        <div class="col-md-12">
                            <h6>{{ strtoupper($tab->title) }}</h6>

                            {{-- Optional Description --}}
                            @if(!empty($tab->description))
                                <div class="tab_ir mb-3">
                                    {!! $tab->description !!}
                                </div>
                            @endif

                            {{-- Table --}}
                            @if($tab->rows && $tab->rows->count() > 0)
                                @php $firstRow = $tab->rows->first(); @endphp
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">{{ $firstRow->label }}</th>
                                                @foreach($firstRow->cells as $cell)
                                                    <th scope="col">{{ $cell->value }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tab->rows->slice(1) as $row)
                                                <tr>
                                                    <th scope="row">{{ $row->label }}</th>
                                                    @foreach($row->cells as $cell)
                                                        <td>{{ $cell->value }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


			<div class="detail_4 row mt-4">
				<div class="col-md-12">
					<h4>Related Products</h4>
					<hr>
				</div>
			</div>
			<div class="prod_pg1r2 row">
				<div class="col-md-6 col-lg-3">
					<div class="prodinm clearfix">
						<div class="prod_2im position-relative clearfix">
							<div class="prod_2i1 clearfix">
								<div class="grid clearfix">
									<figure class="effect-jazz mb-0">
										<a href="#"><img src="img/30.jpg" class="w-100" alt="abc"></a>
									</figure>
								</div>
							</div>

							<div class="prod_2i3 clearfix position-absolute w-100">
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">NEW</h6>
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3 pull-right">40%
								</h6>
							</div>
							<div class="prod_2in clearfix position-absolute bg-light w-100 p-3 text-center">
								<ul class="mb-0">
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-share-alt"></i></a></li>
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-shopping-cart"></i></a>
									</li>
									<li class="d-inline-block"><a href="#"><i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
							<span class="col_yell">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span>
							<h6 class="mt-2"><a href="#">Sed Cursus Ante</a></h6>
							<h6 class="font_13"><a class="col_light" href="#">New Product</a></h6>
							<hr>
							<h6 class="fw-normal mb-0"><span
									class="text-decoration-line-through col_light">$79.00</span>
								<span class="pull-right fw-bold col_yell">$68.00</span>
							</h6>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="prodinm clearfix">
						<div class="prod_2im position-relative clearfix">
							<div class="prod_2i1 clearfix">
								<div class="grid clearfix">
									<figure class="effect-jazz mb-0">
										<a href="#"><img src="img/31.jpg" class="w-100" alt="abc"></a>
									</figure>
								</div>
							</div>

							<div class="prod_2i3 clearfix position-absolute w-100">
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">NEW</h6>
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3 pull-right">40%
								</h6>
							</div>
							<div class="prod_2in clearfix position-absolute bg-light w-100 p-3 text-center">
								<ul class="mb-0">
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-share-alt"></i></a></li>
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-shopping-cart"></i></a>
									</li>
									<li class="d-inline-block"><a href="#"><i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
							<span class="col_yell">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span>
							<h6 class="mt-2"><a href="#">Nulla Quis Sem</a></h6>
							<h6 class="font_13"><a class="col_light" href="#">New Product</a></h6>
							<hr>
							<h6 class="fw-normal mb-0"><span
									class="text-decoration-line-through col_light">$79.00</span>
								<span class="pull-right fw-bold col_yell">$68.00</span>
							</h6>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="prodinm clearfix">
						<div class="prod_2im position-relative clearfix">
							<div class="prod_2i1 clearfix">
								<div class="grid clearfix">
									<figure class="effect-jazz mb-0">
										<a href="#"><img src="img/32.jpg" class="w-100" alt="abc"></a>
									</figure>
								</div>
							</div>

							<div class="prod_2i3 clearfix position-absolute w-100">
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">NEW</h6>
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3 pull-right">40%
								</h6>
							</div>
							<div class="prod_2in clearfix position-absolute bg-light w-100 p-3 text-center">
								<ul class="mb-0">
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-share-alt"></i></a></li>
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-shopping-cart"></i></a>
									</li>
									<li class="d-inline-block"><a href="#"><i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
							<span class="col_yell">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span>
							<h6 class="mt-2"><a href="#">Integer Nec Odio</a></h6>
							<h6 class="font_13"><a class="col_light" href="#">New Product</a></h6>
							<hr>
							<h6 class="fw-normal mb-0"><span
									class="text-decoration-line-through col_light">$79.00</span>
								<span class="pull-right fw-bold col_yell">$68.00</span>
							</h6>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="prodinm clearfix">
						<div class="prod_2im position-relative clearfix">
							<div class="prod_2i1 clearfix">
								<div class="grid clearfix">
									<figure class="effect-jazz mb-0">
										<a href="#"><img src="img/33.jpg" class="w-100" alt="abc"></a>
									</figure>
								</div>
							</div>

							<div class="prod_2i3 clearfix position-absolute w-100">
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">NEW</h6>
								<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3 pull-right">40%
								</h6>
							</div>
							<div class="prod_2in clearfix position-absolute bg-light w-100 p-3 text-center">
								<ul class="mb-0">
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-share-alt"></i></a></li>
									<li class="d-inline-block me-3"><a href="#"><i class="fa fa-shopping-cart"></i></a>
									</li>
									<li class="d-inline-block"><a href="#"><i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
							<span class="col_yell">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span>
							<h6 class="mt-2"><a href="#">Eget Sem Porta</a></h6>
							<h6 class="font_13"><a class="col_light" href="#">New Product</a></h6>
							<hr>
							<h6 class="fw-normal mb-0"><span
									class="text-decoration-line-through col_light">$79.00</span>
								<span class="pull-right fw-bold col_yell">$68.00</span>
							</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="detail_4 row mt-4">
				<div class="col-md-12">
					<h4>Product Reviews</h4>
					<hr>
				</div>
			</div>
			<div class="detail_5 row">
				<div class="col-md-6">
					<div class="detail_5l">
						<h6 class="mb-4">3 review for Latest Pocket Product</h6>
						<div class="detail_5li row">
							<div class="col-md-2 col-sm-2">
								<div class="detail_5lil">
									<img src="img/42.jpg" alt="abc" class="rounded-circle w-100">
								</div>
							</div>
							<div class="col-md-10 col-sm-10">
								<div class="detail_5lir">
									<h6 class="font_14">Eget Nulla <span class="col_light font_12 ms-2">- November 12,
											2022</span>
										<span class="col_yell font_12 float-end">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</h6>
									<p class="mb-0">Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the
										leap into electronic typesetting, remaining.</p>
								</div>
							</div>
						</div>
						<div class="detail_5li row mt-3">
							<div class="col-md-2 col-sm-2">
								<div class="detail_5lil">
									<img src="img/43.jpg" alt="abc" class="rounded-circle w-100">
								</div>
							</div>
							<div class="col-md-10 col-sm-10">
								<div class="detail_5lir">
									<h6 class="font_14">Semper Diam <span class="col_light font_12 ms-2">- November 12,
											2022</span>
										<span class="col_yell font_12 float-end">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</h6>
									<p class="mb-0">Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the
										leap into electronic typesetting, remaining.</p>
								</div>
							</div>
						</div>
						<div class="detail_5li row mt-3">
							<div class="col-md-2 col-sm-2">
								<div class="detail_5lil">
									<img src="img/44.jpg" alt="abc" class="rounded-circle w-100">
								</div>
							</div>
							<div class="col-md-10 col-sm-10">
								<div class="detail_5lir">
									<h6 class="font_14">Lorem Porta <span class="col_light font_12 ms-2">- November 12,
											2022</span>
										<span class="col_yell font_12 float-end">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</h6>
									<p class="mb-0">Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the
										leap into electronic typesetting, remaining.</p>
								</div>
							</div>
						</div>
						<div class="detail_5li row mt-3 border-0 pb-0">
							<div class="col-md-2 col-sm-2">
								<div class="detail_5lil">
									<img src="img/45.jpg" alt="abc" class="rounded-circle w-100">
								</div>
							</div>
							<div class="col-md-10 col-sm-10">
								<div class="detail_5lir">
									<h6 class="font_14">Quis Sem <span class="col_light font_12 ms-2">- November 12,
											2022</span>
										<span class="col_yell font_12 float-end">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
										</span>
									</h6>
									<p class="mb-0">Cramond Leopard & Pythong Print Anorak Jacket In Beige but also the
										leap into electronic typesetting, remaining.</p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div class="detail_5r">
						<p>Your email address will not be published. Required fields are marked *</p>
						<h6 class="mb-2">YOUR RATING</h6>
						<span class="col_yell fs-6">
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
						</span>
						<h6 class="font_13 mt-4 mb-3">YOUR REVIEW *</h6>
						<textarea class="form-control form_area"></textarea>
						<div class="row detail_5ri mt-4">
							<div class="col-md-6">
								<div class="detail_5ril">
									<h6 class="font_13 mb-3">YOUR NAME *</h6>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="detail_5ril">
									<h6 class="font_13 mb-3">YOUR EMAIL *</h6>
									<input class="form-control" type="text">
								</div>
							</div>
						</div>
						<div class="row detail_5ri mt-4">
							<div class="col-md-6">
								<div class="detail_5ril">
									<h6 class="font_13 mb-3">SUBJECT</h6>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-md-6">
								<div class="detail_5ril">
									<h6 class="font_13 mb-3">WEBSITE</h6>
									<input class="form-control" type="text">
								</div>
							</div>
						</div>
						<h6 class="mb-0 mt-4"><a class="button" href="#">SUBMIT</a></h6>
					</div>
				</div>
			</div>
		</div>
</section>

<section id="subs" class="pt-5 pb-5 bg_blue">
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
						<input type="text" class="form-control border-0 bg-transparent" placeholder="Enter Your Email">
						<span class="input-group-btn">
							<button class="btn btn-primary bg_yell border-0 fs-6" type="button">
								SUBSCRIBE </button>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

    {{-- JS to activate first tab --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bottomTabsNav = document.querySelectorAll('#bottomTabsNav .nav-link');
            const bottomTabsContent = document.querySelectorAll('#bottomTabsContent .tab-pane');

            if (bottomTabsNav.length > 0) {
                // Activate first tab
                bottomTabsNav[0].classList.add('active');
                bottomTabsContent[0].classList.add('show', 'active');

                // Handle click events
                bottomTabsNav.forEach((tabLink, index) => {
                    tabLink.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Remove active from all tabs
                        bottomTabsNav.forEach(link => link.classList.remove('active'));
                        bottomTabsContent.forEach(pane => pane.classList.remove('show', 'active'));

                        // Activate clicked tab
                        tabLink.classList.add('active');
                        bottomTabsContent[index].classList.add('show', 'active');
                    });
                });
            }
        });
    </script>
@endif


<script>
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
</script>
@endsection