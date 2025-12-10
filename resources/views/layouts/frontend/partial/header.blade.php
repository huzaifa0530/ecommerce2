<!-- [ Header ] start -->

<section id="header_top" class="pt-3 pb-2">
    <div class="container-fluid">
        <div class="row header_top1">
            <div class="col-md-3 align-content-center">
                <div class="">


                    <h3 class="mb-0"><a class="col_dark" href="index.html"><img src="{{ asset('User/img/logo.png') }}"
                                alt="" srcset="" width="180px"></a></h3>
                </div>
            </div>
            <div class="col-md-6 align-content-center">
                <div class="header_top1m">
                    <select name="categories" class="form-select  bg_light" required="">
                        <option value="">All Categories</option>

                        @foreach($allCategories as $cat)
                            <!-- <option value="{{ $cat->id }}">{{ $cat->name }}</option> -->

                            @foreach($cat->subcategories as $sub)
                                <option value="{{ $sub->id }}">— {{ $sub->name }}</option>
                            @endforeach
                        @endforeach

                    </select>

                    <div class="input-group">
                        <input type="text" class="form-control border-start-0" placeholder="Search for your item">
                        <span class="input-group-btn">
                            <button class="btn btn-primary bg_yell" type="button">
                                <i class="fa fa-search"></i> </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="header_top1r pull-right">
                    <ul class="mb-0">
                        <li class="nav-item  d-inline-block font_13 me-2 pe-2">
                            <a class="text-dark" href="#"><i class="fa fa-sign-in col_yell me-1"></i> Sign In</a>
                        </li>
                        <li class="nav-item  d-inline-block font_13 border-0">
                            <a class="text-dark" href="#"><i class="fa fa-user col_yell me-1"></i> My Account</a>
                        </li>
                        <!-- <li class="nav-item  d-inline-block me-4">
          <a href="#"><i class="fa fa-refresh fs-5"></i> </a>
        </li>
	     <li class="nav-item  d-inline-block me-4">
          <a href="#"><i class="fa fa-heart-o fs-5"></i> </a>
        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="header" class="bg_light">
    <nav class="navbar navbar-expand-md navbar-light pt-0 pb-0" id="navbar_sticky">
        <div class="container-fluid">
            <a class="col_dark navbar-brand" href="index.html"><img src="img/logo.png" alt="" srcset=""
                    width="160px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle act_cat nav_hide bg_yell" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-navicon me-1"></i> BROWSER ALL CATEGORIES
                        </a>
                        <ul class="dropdown-menu drop_cat" aria-labelledby="navbarDropdown">

                            @foreach($allCategories as $cat)
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">
                                        <i class="fa fa-folder-open me-2 col_yell"></i>
                                        {{ $cat->name }}
                                    </a>

                                    @if($cat->subcategories->count() > 0)
                                        <ul class="dropdown-menu">
                                            @foreach($cat->subcategories as $sub)
                                                <li>
                                                    <a class="dropdown-item">
                                                        {{ $sub->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach

                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.html">New Arrival </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">USA Made </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Special</a>
                    </li>
                    <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Product
          </a>
          <ul class="dropdown-menu drop_2 drop_cat" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="product.html"><i class="fa fa-caret-right me-1 col_yell"></i> Product</a></li>
            <li><a class="dropdown-item border-0" href="detail.html"><i class="fa fa-caret-right me-1 col_yell"></i> Product Detail</a></li>
          </ul>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Blog
          </a>
          <ul class="dropdown-menu drop_2 drop_cat" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="blog.html"><i class="fa fa-caret-right me-1 col_yell"></i> Blog</a></li>
            <li><a class="dropdown-item border-0" href="blog_detail.html"><i class="fa fa-caret-right me-1 col_yell"></i> Blog Detail</a></li>
          </ul>
        </li>
		
		<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Pages
          </a>
          <ul class="dropdown-menu drop_2 drop_cat" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cart.html"><i class="fa fa-caret-right me-1 col_yell"></i> Shopping Cart</a></li>
            <li><a class="dropdown-item border-0" href="checkout.html"><i class="fa fa-caret-right me-1 col_yell"></i> Checkout</a></li>
          </ul>
        </li>
		 -->
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <!-- 		
		
		<li class="nav-item item_last">
            Free Shipping on Orders <span class="fw-bold">$49+</span>
          </li> -->

                </ul>
                <div class="ms-auto">
                    <a class="btn bg_yell text-white" href="contact.html">Request Quote</a>
                </div>
            </div>
        </div>
    </nav>
</section>



<!-- [ Header ] end -->