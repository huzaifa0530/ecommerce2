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

    @php
        $allImages = collect();

        // Normal product images
        // Product images
        foreach ($product->images as $img) {
            $allImages->push([
                'label' => 'Main Image',
                'path' => asset('storage/' . $img->image_path),
                'id' => $img->id,
                'type' => 'image'
            ]);
        }

        // Color images
        foreach ($product->colors as $color) {
            $allImages->push([
                'label' => $color->color_name,
                'path' => asset('storage/' . $color->color_image),
                'id' => $color->id,
                'type' => 'color'
            ]);
        }

    @endphp
    @php
        $usStates = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
        ];
    @endphp

    <style>
        .thumb-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border: 2px solid #ddd;
            padding: 3px;
            cursor: pointer;
            transition: .3s;
        }

        .thumb-img:hover {
            border-color: #be0e32;
            transform: scale(1.05);
        }
    </style>

    <section id="center" class="center_o pt-4 pb-4 bg-light">
        <div class="container-xl">
            <div class="row center_o1 text-center">
                <div class="col-md-12">
                    <h1>{{ $product->name }}</h1>
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
                                @foreach($product->images as $idx => $img)
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="{{ $idx }}" class="{{ $idx == 0 ? 'active' : '' }}">
                                    </button>
                                @endforeach

                                @foreach($product->colors as $idx => $color)
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="{{ $product->images->count() + $idx }}">
                                    </button>
                                @endforeach
                            </div>


                            <div class="carousel-inner">

                                {{-- Thumbnail Images --}}
                                @foreach($product->images as $img)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $img->image_path) }}" class="d-block w-100" alt="">
                                    </div>
                                @endforeach

                                {{-- Color Images --}}
                                @foreach($product->colors as $color)
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/' . $color->color_image) }}" class="d-block w-100" alt="">
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
                    <div class="thumb-box mt-5 d-flex flex-wrap gap-2">
                        {{-- Thumbnails from product images --}}
                        @foreach($product->images as $img)
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="thumb-img"
                                data-index="{{ $loop->index }}">
                        @endforeach

                        {{-- Thumbnails from color images --}}
                        @foreach($product->colors as $color)
                            <img src="{{ asset('storage/' . $color->color_image) }}" class="thumb-img"
                                data-index="{{ $product->images->count() + $loop->index }}">
                        @endforeach
                    </div>

                    <div class="mt-5 mb-3">
                        <label class="fw-bold mb-2 d-block fs-5">Available Colors:</label>
                        <ul class="mb-0">
                            @foreach($product->colors as $color)
                                <li class="d-inline-block text-center me-3">

                                    <div style="font-size:14px; margin-top:4px;font-weight:600;">{{ $color->color_name }}</div>

                                    <a href="#" class="color-selector"
                                        data-image="{{ asset('storage/' . $color->color_image) }}"
                                        title="{{ $color->color_name }}"
                                        style="display:inline-block;
                                                                                                                                                                                                                                                          width:30px;
                                                                                                                                                                                                                                                          height:30px;
                                                                                                                                                                                                                                                          background: {{ $color->color_code  }};
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
                        <h6 class="d-inline-block bg_yell text-white font_12 ps-3 pe-3 pt-2 pb-2 rounded-1 fs-5">
                            {{ $product->item_number }}
                        </h6>
                        <h4 class="mt-2">{{ $product->name }}</h4>
                        <div class="container my-3">
                            <div class="row text-center border">
                                <div class="col-md-6 py-2 border-end item-short-info">
                                    <span class="fw-bold text-danger">Item Size:</span>
                                    <span class="fw-semibold">{{ $product->item_size }}</span>
                                </div>
                                <div class="col-md-6 py-2 item-short-info">
                                    <span class="fw-bold text-danger">Imprint Area:</span>
                                    <span class="fw-semibold">{{ $product->imprint_area }}</span>
                                </div>
                            </div>
                        </div>
                        @php
                            $topTabs = $product->tabs->where('section', 'top');
                        @endphp

                        @if($topTabs->count() > 0)

                            {{-- TAB HEADERS --}}
                            <div class="row detail_2 mt-5">
                                <div class="col-md-12">
                                    <ul class="nav nav-tabs mb-0 justify-content-center">
                                        @foreach($topTabs as $index => $tab)
                                            <li class="nav-item d-inline-block me-1">
                                                <a href="#tab-{{ $tab->id }}" data-bs-toggle="tab"
                                                    class="nav-link {{ $index == 0 ? 'active' : '' }} px-4 fs-6 rounded-3 py-2">
                                                    {{ strtoupper($tab->title) }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            {{-- TAB CONTENT --}}
                            <div class="detail_3 row mt-4">
                                <div class="tab-content w-100">

                                    @foreach($topTabs as $index => $tab)
                                        @php
                                            $tabTitle = strtolower(trim($tab->title));
                                        @endphp

                                        <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="tab-{{ $tab->id }}">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <h6>{{ strtoupper($tab->title) }}</h6>


                                                    {{-- TABLE --}}
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            @if($tab->rows->count() > 0)
                                                                @php $firstRow = $tab->rows->first(); @endphp

                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>{{ $firstRow->label }}</th>
                                                                        @foreach($firstRow->cells as $cell)
                                                                            <th>{{ $cell->value }}</th>
                                                                        @endforeach
                                                                    </tr>
                                                                </thead>

                                                                <tbody>
                                                                    @foreach($tab->rows->slice(1) as $rowIndex => $row)
                                                                        <tr class="{{ $rowIndex >= 3 ? 'd-none extra-row' : '' }}">
                                                                            <th>{{ $row->label }}</th>
                                                                            @foreach($row->cells as $cell)
                                                                                <td>{{ $cell->value }}</td>
                                                                            @endforeach
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            @endif
                                                        </table>
                                                    </div>

                                                    {{-- 🔥 PRODUCT FIELDS (THIS IS THE FIX) --}}
                                                    <div class="row mt-4">
                                                        <div class="col-md-10 mx-auto">

                                                            {{-- Spot Printing & Heat Transfer --}}
                                                            @if(in_array($tabTitle, ['spot printing', 'heat transfer']))

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">Price Includes</div>
                                                                    <div class="col-7">{{ $product->price_includes ?? '-' }}</div>
                                                                </div>

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">Lead Time</div>
                                                                    <div class="col-7">{{ $product->lead_time ?? '-' }}</div>
                                                                </div>

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">Setup Charge</div>
                                                                    <div class="col-7">{{ $product->setup_charge ?? '-' }}</div>
                                                                </div>

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">Repeat Setup</div>
                                                                    <div class="col-7">{{ $product->repeat_setup ?? '-' }}</div>
                                                                </div>

                                                            @endif

                                                            {{-- Blank --}}
                                                            @if($tabTitle === 'blank')

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">Price Include</div>
                                                                    <div class="col-7">{{ $product->price_include ?? '-' }}</div>
                                                                </div>

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">Lead Time</div>
                                                                    <div class="col-7">{{ $product->lead_time ?? '-' }}</div>
                                                                </div>

                                                                <div class="row mb-2 align-items-center">
                                                                    <div class="col-5 fw-semibold text-muted">MOQ</div>
                                                                    <div class="col-7">{{ $product->MOQ ?? '-' }}</div>
                                                                </div>

                                                            @endif

                                                        </div>
                                                    </div>


                                                    {{-- Optional Description --}}
                                                    @if(!empty($tab->description))
                                                        <div class="tab_ir mb-3">
                                                            {!! $tab->description !!}
                                                        </div>
                                                    @endif



                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endif


                        <div class="container px-0 mt-5">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <a href="#" class="d-block position-relative rounded-2 overflow-hidden quotationBtn"
                                        data-bs-toggle="modal" data-bs-target="#quotationModal" data-modal-title="Quotation"
                                        style="height:150px; background:url('{{ asset('User/img/request_quote.jpeg') }}') center/cover no-repeat;">
                                        <span class="position-absolute top-0 start-0 m-3 text-white fw-bold"
                                            style="text-shadow:0 1px 2px rgba(0,0,0,.5);">
                                            Request Quotation
                                        </span>
                                    </a>
                                </div>



                                <div class="col-12 col-md-6">
                                    <a href="#" class="d-block position-relative rounded-2 overflow-hidden mockupBtn"
                                        data-bs-toggle="modal" data-bs-target="#quotationModal"
                                        data-modal-title="Request Mockup"
                                        style="height:150px; background:url('{{ asset('User/img/mockup.jpeg') }}') center/cover no-repeat;">
                                        <span class="position-absolute top-0 start-0 m-3 text-white fw-bold"
                                            style="text-shadow:0 1px 2px rgba(0,0,0,.5);">
                                            Request Mockup
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap justify-content-start gap-3 mt-3 mb-4">
                            <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#imagesModal"
                                style="background:#252062;border-radius:6px;padding:8px 24px;text-transform:uppercase;font-weight:600;letter-spacing:.5px;font-size:14px;"
                                href="#">IMAGES</a>
                            <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#templateModal"
                                style="background:#252062;border-radius:6px;padding:8px 24px;text-transform:uppercase;font-weight:600;letter-spacing:.5px;font-size:14px;"
                                href="#">TEMPLATE</a>
                            <a class="btn text-white" data-bs-toggle="modal" data-bs-target="#freightModal"
                                style="background:#252062;border-radius:6px;padding:8px 24px;text-transform:uppercase;font-weight:600;letter-spacing:.5px;font-size:14px;"
                                href="#">Freight Estimator</a>
                        </div>

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
                                                        class="nav-link  px-4 fs-6 rounded-3 py-2">
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
                                                                <table class="table mb-0">
                                                                    <tbody>
                                                                        <tr class="bottom-tabs-border">
                                                                            <th scope="row"
                                                                                style="background-color:#cedaff;bottom-border:1px solid black;">
                                                                                {{ $firstRow->label }}
                                                                            </th>
                                                                            @foreach($firstRow->cells as $cell)
                                                                                <td scope="col">{{ $cell->value }}</td>
                                                                            @endforeach
                                                                        </tr>

                                                                        @foreach($tab->rows->slice(1) as $row)
                                                                            <tr class="bottom-tabs-border">
                                                                                <th scope="row"
                                                                                    style="background-color:#cedaff;bottom-border:1px solid;">
                                                                                    {{ $row->label }}
                                                                                </th>
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

                                <div class="detail_4 row mt-5">
                                    <div class="col-md-12">
                                        <h4>Related Products</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="prod_pg1r2 row">

                                    @foreach ($relatedProducts as $item)
                                        <div class="col-md-6 col-lg-3">
                                            <div class="prodinm clearfix">

                                                <div class="prod_2im position-relative clearfix">
                                                    <div class="prod_2i1 clearfix">
                                                        <div class="grid clearfix">
                                                            <figure class="effect-jazz mb-0">
                                                                <a href="{{ url('product/' . $item->id) }}">
                                                                    <img src="{{ asset('storage/' . ($item->images->first()->image_path ?? 'default.jpg')) }}"
                                                                        class="w-100" alt="{{ $item->name }}">
                                                                </a>
                                                            </figure>
                                                        </div>
                                                    </div>

                                                    <div class="prod_2i3 clearfix position-absolute w-100">
                                                        <!-- If you want action buttons like wishlist, add here -->
                                                    </div>

                                                </div>

                                                <div class="prod_2i2 pt-4 pb-4 ps-3 pe-3 bg-white clearfix">
                                                    <h6 class="mt-2">
                                                        <a href="{{ url('product/' . $item->id) }}">{{ $item->name }}</a>
                                                    </h6>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                    @if($relatedProducts->isEmpty())
                                        <div class="col-12">
                                            <p class="text-muted">No related products found.</p>
                                        </div>
                                    @endif
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
                                    tabLink.addEventListener('click', function (e) {
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



    <!-- Images Modal -->
    <div class="modal fade" id="imagesModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header text-white">
                    <h5 class="modal-title">Images</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-0">
                    <table class="table table-bordered mb-0 align-middle text-center">
                        <tbody>
                            @foreach($allImages as $image)
                                <tr>
                                    <td class="text-start ps-3 fw-semibold">
                                        {{ $image['label'] }}
                                    </td>
                                    <td>
                                        <img src="{{ $image['path'] }}" height="60" class="border rounded">
                                    </td>
                                    <td>
                                        <a href="{{ route('image.download', $img->id) }}" class="text-primary fs-5">
                                            <i class="bi bi-download"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach

                            @if($allImages->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-muted py-4">
                                        No images available
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                <div class="modal-footer justify-content-start">
                    <a href="{{ route('product.images.download.all', $product->id) }}" class="text-primary fw-semibold">
                        Click here to download all images at once
                    </a>
                </div>

            </div>
        </div>
    </div>



    <!-- Template Modal -->
    <div class="modal fade" id="templateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Templates</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body p-0">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th>Template</th>
                                <th class="text-center">Download</th>
                            </tr>
                        </thead>

                        <tbody>
                            {{-- COLOR TEMPLATES --}}
                            @foreach($product->colors as $color)
                                <tr>
                                    <td class="align-middle">
                                        <img src="{{ asset('storage/' . $color->color_image) }}" width=" 40" height="40"
                                            style="border:1px solid #ddd">
                                        <strong class=" ms-2">{{ $color->color_name }}</strong>
                                    </td>

                                    <td class="text-center">
                                        @if($color->color_template_pdf)
                                            <a href="{{ route('template.single', $color->id) }}"
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            {{-- BLACK & WHITE TEMPLATE --}}
                            <tr class="table-light">
                                <td>
                                    <strong>Black & White Template</strong>
                                </td>
                                <td class="text-center">
                                    @if($product->bw_template_pdf)
                                        <a href="{{ route('template.bw', $product->id) }}" class="btn btn-sm btn-outline-dark">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                            </tr>

                            {{-- DOWNLOAD ALL --}}
                            <tr>
                                <td colspan="2" class="text-center">
                                    <a href="{{ route('template.all', $product->id) }}" class="btn btn-success">
                                        Download All Color Templates (ZIP)
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Freight Estimator Modal -->
    <div class="modal fade" id="freightModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header text-white">
                    <h5 class="modal-title">
                        <span class="px-2 py-1 rounded">Freight Estimator</span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <p class="text-muted small mb-3">
                        Fields marked with <span class="text-danger">*</span> are mandatory
                    </p>

                    <form action="{{ route('freight.submit') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label class="form-label">
                                <span class="text-danger">*</span> Quantity
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-box"></i>
                                </span>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity"
                                    required>
                            </div>
                        </div>
                        <!-- User Email -->
                        <div class="mb-3">
                            <label class="form-label">
                                <span class="text-danger">*</span> Your Email
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" name="user_email" placeholder="Enter your email"
                                    required>
                            </div>
                        </div>

                        <!-- Country & State -->
                        <div class="row">
                            <!-- Country -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <span class="text-danger">*</span> Country
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                    <select class="form-select" name="country" required>
                                        <option value="US" selected>United States</option>
                                    </select>
                                </div>
                            </div>

                            <!-- State -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    <span class="text-danger">*</span> State
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                    <select class="form-select" name="state" required>
                                        <option selected disabled>Select State</option>
                                        @foreach($usStates as $abbr => $state)
                                            <option value="{{ $abbr }}">{{ $state }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Zip Code -->
                        <div class="mb-3">
                            <label class="form-label">
                                <span class="text-danger">*</span> Zip/Postal Code
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>
                                <input type="text" class="form-control" name="zip" placeholder="Enter Zip/Postal code"
                                    required>
                            </div>
                        </div>

                        <!-- Residential -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="residential" name="residential" value="Yes">
                            <label class="form-check-label" for="residential">
                                Is Residential Address
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn show-more-btn">
                            Send To Email
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="quotationModal" tabindex="-1" aria-labelledby="quotationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="quotationModalLabel">Quotation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="quotationForm" action="{{ route('product.quote.submit', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Product Info (readonly) -->
                        <div class="d-flex mb-3">
                            <img src="{{ $product->images->first()?->image_path ? asset('storage/' . $product->images->first()->image_path) : 'https://via.placeholder.com/80x80' }}"
                                class="me-3 border" alt="Product" style="height:200px; width:200px;">
                            <div>
                                <strong class="fs-5">{{ $product->name }}</strong><br>
                                <small class="fs-6">{{ $product->item_size }}</small><br>
                                <small class="fs-6 text-muted">{{ $product->item_number }}</small>
                            </div>
                        </div>

                        <!-- Select Color -->
                        <div class="mb-3">
                            <label class="form-label fw-bold fs-5">Select Color:</label>
                            <div class="row g-2">
                                @foreach($product->colors as $color)
                                    <div class="col-3 form-check">
                                        <input class="form-check-input quote-checkbox" type="checkbox" name="colors[]"
                                            value="{{ $color->id }}" id="color{{ $color->id }}">
                                        <label class="form-check-label"
                                            for="color{{ $color->id }}">{{ $color->color_name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ship to Zip Code</label>
                                <input type="text" class="form-control" name="zip">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" class="form-control" name="company">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone</label>
                                <input type="tel" class="form-control" name="phone">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ASI / PPAI / SAGE #</label>
                                <input type="text" class="form-control" name="asi">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">In Hand Date</label>
                                <input type="date" class="form-control" name="in_hand_date">
                            </div>
                        </div>

                        <!-- Radio Buttons -->
                        <div class="mt-3">
                            <label class="form-label fw-bold">Need Freight Estimate?</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="need_freight" value="yes"
                                    id="freightYes">
                                <label class="form-check-label" for="freightYes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="need_freight" value="no" id="freightNo">
                                <label class="form-check-label" for="freightNo">No</label>
                            </div>
                        </div>

                        <!-- Project Details -->
                        <div class="mt-3">
                            <label class="form-label">Project Details</label>
                            <textarea class="form-control" name="message" rows="3"></textarea>
                        </div>

                        <!-- File Upload -->
                        <div id="fileContainer">
                            <div class="mt-3 file-row">
                                <label class="form-label">Attach file</label>
                                <input type="file" class="form-control" name="attachments[]">
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn show-more-btn" id="addFileBtn">Add</button>
                            <button type="button" class="btn btn-danger" id="removeFileBtn"
                                style="border-radius:8px;">Delete</button>
                        </div>

                        <!-- Submit Button -->
                        <div class="modal-footer border-0">
                            <button type="submit" class="btn show-more-btn">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.getElementById("fileContainer");
            const addBtn = document.getElementById("addFileBtn");
            const removeBtn = document.getElementById("removeFileBtn");

            addBtn.addEventListener("click", () => {
                const firstRow = container.querySelector(".file-row");
                const newRow = firstRow.cloneNode(true);
                // Clear the value
                newRow.querySelector("input").value = "";
                container.appendChild(newRow);
            });

            removeBtn.addEventListener("click", () => {
                const rows = container.querySelectorAll(".file-row");
                if (rows.length > 1) { // Always keep at least one
                    rows[rows.length - 1].remove();
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var quotationModal = document.getElementById('quotationModal');

            quotationModal.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                var button = event.relatedTarget;

                // Extract info from data-* attributes
                var title = button.getAttribute('data-modal-title');

                // Update the modal title
                var modalTitle = quotationModal.querySelector('.modal-title');
                modalTitle.textContent = title;

                // Optionally, you can store the "type" in a hidden field
                var typeInput = quotationModal.querySelector('input[name="request_type"]');
                if (!typeInput) {
                    typeInput = document.createElement('input');
                    typeInput.type = 'hidden';
                    typeInput.name = 'request_type';
                    quotationModal.querySelector('form').appendChild(typeInput);
                }
                typeInput.value = title; // "Request Mockup" or "Quotation"
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
        document.querySelectorAll('.color-selector').forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();

                let newImage = this.getAttribute('data-image');

                let activeSlide = document.querySelector('#carouselExampleCaptions .carousel-item.active img');

                activeSlide.src = newImage;
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const thumbnails = document.querySelectorAll('.thumb-img');
            const carousel = new bootstrap.Carousel('#carouselExampleCaptions');

            thumbnails.forEach((thumb) => {
                thumb.addEventListener('click', function () {
                    const index = this.getAttribute('data-index');
                    carousel.to(index); // switch slide
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".show-more-btn").forEach(button => {
                button.addEventListener("click", function () {
                    const tabId = this.dataset.tab;
                    const rows = document.querySelectorAll(
                        `.extra-row[data-tab="${tabId}"]`
                    );

                    const isHidden = rows[0].classList.contains("d-none");

                    rows.forEach(row => row.classList.toggle("d-none"));

                    this.innerText = isHidden
                        ? "Show Less"
                        : "Show More Pricing";
                });
            });
        });
    </script>

@endsection