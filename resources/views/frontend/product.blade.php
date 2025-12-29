@extends('layouts.Frontend.app')

@section('title', 'Eco Mart')

@section('content')

	<section id="center" class="center_o pt-4 pb-4 bg-light">
		<div class="container-xl">
			<div class="row center_o1 text-center">
				<div class="col-md-12">
					<h1>PRODUCT</h1>
					<h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="#">Home</a> <span
							class="me-2 ms-2">/</span> Product</h6>
				</div>
			</div>
		</div>
	</section>

	<section id="prod_pg" class="pt-4 pb-4 bg_light_1">
		<div class="container-fluid">
			<div class="row prod_pg1">


				<div class="col-md-12 col-lg-3">

					<div class="prod_pg1l">

					<!-- <form method="GET" action="{{ route('product') }}">
    
    @foreach ($categories as $category)
        <div class="mb-2 fw-bold">
            {{ $category->name }}
        </div>

        @foreach ($category->subcategories as $sub)
            <div class="form-check ms-3">
                <input class="form-check-input"
                       type="checkbox"
                       name="categories[]"
                       value="{{ $sub->id }}"
                       id="cat_{{ $sub->id }}"
                       {{ in_array($sub->id, request()->categories ?? []) ? 'checked' : '' }}>

                <label class="form-check-label" for="cat_{{ $sub->id }}">
                    {{ $sub->name }}
                </label>
            </div>
        @endforeach
    @endforeach

    <button type="submit" class="btn btn-primary btn-sm mt-3">
        Apply Filter
    </button>
</form> -->



						<div class="prod_pg1l1 bg-white p-4">
							<h6 class="mb-3">COLORS</h6>
							<form id="filterForm">
								<div class="d-flex flex-column" style="gap:12px;">

									@foreach($colors as $index => $color)
																	<label class="form-check-label d-flex align-items-center color-item
																															   {{ $index >= 10 ? 'd-none extra-color' : '' }}" style="gap:10px;cursor:pointer;">

																		<input type="checkbox" class="color-checkbox" value="{{ $color->color_name }}" style="width:18px;height:18px;" {{ in_array(
											$color->color_name,
											explode(',', request('colors', ''))
										) ? 'checked' : '' }}>

																		<span style="width:32px;height:20px;border-radius:4px;
																																	 background: {{ $color->color_code }}">
																		</span>

																		{{ $color->color_name }}
																	</label>
									@endforeach
									@if($colors->count() > 10)
										<div class="text-center mt-3">
											<button type="button" class="btn btn-link p-0 show-more-colors">
												Show More Colors
											</button>
										</div>
									@endif
								</div>
							</form>


						</div>

					</div>
				</div>

				<div class="col-md-12 col-lg-9">
					<div class="prod_pg1r">
						<div class="prod_pg1r1 row">
							<div class="col-md-9">
								<div class="prod_pg1r1l">

									<p class="mt-3 mb-0"> Showing
										{{ $products->firstItem() }} –
										{{ $products->lastItem() }}
										of
										{{ $products->total() }}
										results
									</p>
								</div>
							</div>
							<!-- <div class="col-md-3">
								<div class="prod_pg1r1r">
									<select name="categories" style="height:50px;" class="form-select" required="">
										<option value="">Relevance</option>
										<option>Best sellers</option>
										<option>Name, A to Z</option>
										<option>Name, Z to A</option>
										<option>Price, high to low</option>
										<option>Price, low to high</option>
									</select>
								</div>
							</div> -->
						</div>
						<div class="prod_pg1r2 mt-4 row">
							@foreach($products as $product)
							<div class="col-md-4 mt-4">
		 <div class="prodinm clearfix">
		   <div class="prod_2im position-relative clearfix" style="box-shadow:none;">
		<div class="prod_2i1 clearfix">
		<div class="grid clearfix">
			  <figure class="effect-jazz mb-0">
				<a href="{{ route('detail', $product->id) }}"><img src="{{ asset('storage/' . $product->images->first()->image_path) }}" class="w-100" alt="{{ $product->name }}"></a>
			  </figure>
		  </div>
		</div>
		
		<div class="prod_2i3 clearfix position-absolute w-100">
		<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3">{{ $product->item_number }}</h6>
		</div>
		</div>
		   <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
		<div class="text-center">
			<h6 class="bg_yell d-inline-block pt-1 pb-1 font_13 text-white ps-3 pe-3 text-center">{{ $product->item_size }}</h6>
		</div>
		<h6 class="mt-2 fs-5"><a href="{{ route('detail', $product->id) }}">{{ $product->name }}</a></h6>
		<h6 class="font_13 fs-6"><a class="col_light" href="{{ route('detail', $product->id) }}">{{ Str::limit($product->description, 50) }}</a></h6>
		
		</div>
		 </div>
		</div>
		@endforeach
						


						</div>

						<div class="pages mt-4 row text-center bg_light ms-0 me-0 pt-4 pb-4">
							<div class="col-md-12">
								<ul class="mb-0">
									{{-- Previous Page Link --}}
									@if($products->onFirstPage())
										<li class="disabled"><span><i class="fa fa-chevron-left"></i></span></li>
									@else
										<li><a href="{{ $products->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a>
										</li>
									@endif

									{{-- Pagination Elements --}}
									@foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
										<li class="{{ $page == $products->currentPage() ? 'act' : '' }}">
											<a href="{{ $url }}">{{ $page }}</a>
										</li>
									@endforeach

									{{-- Next Page Link --}}
									@if($products->hasMorePages())
										<li><a href="{{ $products->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a>
										</li>
									@else
										<li class="disabled"><span><i class="fa fa-chevron-right"></i></span></li>
									@endif
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>


	<script>
		document.querySelectorAll('.color-checkbox').forEach(cb => {
			cb.addEventListener('change', function () {

				let selectedColors = [];

				document.querySelectorAll('.color-checkbox:checked').forEach(el => {
					selectedColors.push(el.value);
				});

				let url = new URL(window.location.href);

				if (selectedColors.length > 0) {
					url.searchParams.set('colors', selectedColors.join(','));
				} else {
					url.searchParams.delete('colors');
				}

				window.location.href = url.toString();
			});
		});
	</script>

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
	<script>
		document.addEventListener("DOMContentLoaded", function () {
			const btn = document.querySelector(".show-more-colors");
			if (!btn) return;

			btn.addEventListener("click", function () {
				const extraColors = document.querySelectorAll(".extra-color");
				const isHidden = extraColors[0].classList.contains("d-none");

				extraColors.forEach(color => color.classList.toggle("d-none"));

				this.innerText = isHidden
					? "Show Less"
					: "Show More Colors";
			});
		});
	</script>

@endsection