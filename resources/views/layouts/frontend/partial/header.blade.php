<!-- [ Header ] start -->

<section id="header_top" class="pt-3 pb-2">
    <div class="container-fluid">
        <div class="row header_top1">
            <div class="col-md-3 align-content-center">
                <div class="">

                    <h3 class="mb-0"><a class="col_dark" href="{{ route('home') }}"><img src="{{ asset('User/img/logo.png') }}"
                                alt="" srcset="" width="180px"></a></h3>
                </div>
            </div>
            <div class="col-md-6 align-content-center">
                <div class="header_top1m">
                    <form action="{{ route('product') }}" method="GET" id="categoryFilterForm">
                        <select name="category_id" class="form-select bg_light" onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($allCategories as $cat)
                                @foreach($cat->subcategories as $sub)
                                    <option value="{{ $sub->id }}" {{ request('category_id') == $sub->id ? 'selected' : '' }}>
                                        — {{ $sub->name }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                    </form>


                    <div class="input-group">


                        <form action="{{ route('product') }}" method="GET" class="input-group" id="globalSearchForm">
                            <input type="text" name="q" value="{{ request('q') }}" class="form-control border-start-0"
                                placeholder="Search for your item">
                            <span class="input-group-btn"></span>
                            <button class="btn btn-primary bg_yell" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            </span>
                        </form>

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
            <a class="col_dark navbar-brand" href="{{ route('home') }}"><img src="{{ asset('User/img/logo.png') }}" alt="" srcset=""
                    width="160px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-0">
                   <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle act_cat nav_hide bg_yell" href="#" 
     id="categoriesDropdown" role="button" data-bs-toggle="dropdown" 
     aria-expanded="false" data-bs-auto-close="outside">
    <i class="fa fa-navicon me-1"></i> BROWSER ALL CATEGORIES
  </a>
  <ul class="dropdown-menu drop_cat" aria-labelledby="categoriesDropdown">
    @foreach($allCategories as $cat)
      <li class="dropdown-submenu">
        <a class="dropdown-item dropdown-toggle" href="#">
          <i class="fa fa-folder-open me-2 col_yell"></i> {{ $cat->name }}
        </a>
        @if($cat->subcategories->count() > 0)
          <ul class="dropdown-menu p-0">
            @foreach($cat->subcategories as $sub)
              <li><a class="dropdown-item" href="{{ route('product', ['category_id' => $sub->id]) }}">{{ $sub->name }}</a></li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
</li>



                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>

                     
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#new-arrival">
                            New Arrival
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#deal">
                            Special
                        </a>
                    </li>

                    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Information
          </a>
          <ul class="dropdown-menu drop_2 drop_cat" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('terms') }}"><i class="fa fa-caret-right me-1 col_yell"></i>Terms & Condition</a></li>
            <li><a class="dropdown-item border-0" href="{{ asset('User/pdf/inkwellimpressions Credit-Card-Form.pdf') }}" download><i class="fa fa-caret-right me-1 col_yell"></i>Credit Card Form</a></li>
          </ul>
        </li>

                   <a class="nav-link" href="{{ route('contact.create') }}">Contact</a>

                    <!-- 		
		
		<li class="nav-item item_last">
            Free Shipping on Orders <span class="fw-bold">$49+</span>
          </li> -->

                </ul>
                <div class="ms-auto">


                
                    <a class="btn bg_yell text-white" href="contact.html">Sales Flyer</a>
                </div>
            </div>
        </div>
    </nav>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get all submenu toggles
        document.querySelectorAll('.dropdown-submenu > .dropdown-toggle').forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault(); // prevent default link behavior
                e.stopPropagation(); // stop bootstrap closing all dropdowns

                let submenu = this.nextElementSibling;
                if (submenu) {
                    submenu.classList.toggle('show');
                }
            });
        });

        // Close submenus when clicking outside
        document.addEventListener('click', function (e) {
            document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(function (submenu) {
                submenu.classList.remove('show');
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (window.location.hash) {
            const target = document.querySelector(window.location.hash);
            if (target) {
                setTimeout(() => {
                    target.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }, 300); // wait for page render
            }
        }
    });
</script>


<!-- [ Header ] end -->