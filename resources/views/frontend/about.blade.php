@extends('layouts.Frontend.app')

@section('title', 'Eco Mart')

@section('content')

<section id="center" class="center_o pt-4 pb-4 bg-light">
  <div class="container-xl">
    <div class="row center_o1 text-center">
	 <div class="col-md-12">
	   <h1>ABOUT US</h1>
	   <h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="#">Home</a> <span class="me-2 ms-2">/</span> About Us</h6>
	 </div>
	</div>
  </div>
</section>

<section id="about_pg" class="pt-4 pb-4">
 <div class="container-xl">
  <div class="about_pg_1 row">
   <div class="col-md-6">
    <div class="about_pg_1l">
	  <div class="grid clearfix">
			  <figure class="effect-jazz mb-0">
				<a href="#"><img src="img/52.jpg" class="w-100" alt="abc"></a>
			  </figure>
		  </div>
	</div>
   </div>
   <div class="col-md-6">
    <div class="about_pg_1r">
	 <h3>OUR STORY</h3>
	 <p class="mt-3 fs-6">Inkwell Impressions is your go-to source for imprinted promotional products, offering the best quality at the lowest prices.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Client satisfaction is our primary focus.</span> Your order is managed with care, regardless of size. Our <span class="fw-bold">in-house production facility</span> allows us to closely oversee every step, ensuring strict quality assurance. Recognizing that cost is a critical factor, we are committed to delivering the highest-quality product at the most competitive price.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Quality You Can Trust:</span> We oversee production <span class="fw-bold">in our in-house print</span> shop for quality assurance on every single order.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Price Guarantee:</span> We work hard to bring you the <span class="fw-bold">best price</span> for a top-tier product.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Fast Communication:</span> Get domestic quotes within <span class="fw-bold">one hour</span> during business hours—we respond quickly and efficiently.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Custom Options: Design your perfect bag</span> or modify one of ours with our Custom Program. We also offer a new custom overseas program for added savings and flexibility. Quotes for custom work are typically provided within 24 hours.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Free Rush Service:</span> Take advantage of our <span class="fw-bold">24-hour rush service at no cost</span> (when available).</p>
	 <p class="mt-3 fs-6">We’re proud of our superior service, as proven by our consecutive <span class="fw-bold">A+ ratings with SAGE and 5 STARS with ASI!</span></p>
	 
	</div>
   </div>
  </div>
 </div>
</section>

<!-- <section id="spec" class="pt-4 pb-5 bg-light">
 <div class="container-xl">
   <div class="row prod_1 mb-4 text-center">
     <div class="col-md-12">
	  <h6 class="h_line font_13">WHY CHOOSE US</h6>
	  <h2 class="mb-0 col_yell mt-3">EXPERIENCE IN SETTING UP</h2>
	 </div>
  </div>
  <div class="row spec_1 mt-4">
     <div class="col-md-4">
	   <div class="spec_1i bg-white p-4 pt-2">
	    <span class="col_yell font_50"><i class="fa fa-rocket"></i></span>
		<h5 class="mt-3">Quality You Can Trust</h5>
		<p class="mt-3">We oversee production in our in-house print shop for quality assurance on every single order.</p>
	   </div>
	 </div>
	 <div class="col-md-4">
	   <div class="spec_1i bg-white p-4 pt-2">
	    <span class="col_yell font_50"><i class="fa fa-credit-card"></i></span>
		<h5 class="mt-3">Price Guarantee</h5>
		<p class="mt-3">We work hard to bring you the best price for a top-tier product.</p>
	   </div>
	 </div>
	 <div class="col-md-4">
	   <div class="spec_1i bg-white p-4 pt-2">
	    <span class="col_yell font_50"><i class="fa fa-phone"></i></span>
		<h5 class="mt-3">Free Rush Service</h5>
		<p class="mt-3">Take advantage of our 24-hour rush service at no cost (when available).</p>
	   </div>
	 </div>
  </div>
 </div>
</section> -->




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