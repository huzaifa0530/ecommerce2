@extends('layouts.Frontend.app')

@section('title', 'Eco Mart')

@section('content')

<section id="center" class="center_o pt-4 pb-4 bg-light">
  <div class="container-xl">
    <div class="row center_o1 text-center">
	 <div class="col-md-12">
	   <h1>Terms & Conditions</h1>
	   <h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="#">Home</a> <span class="me-2 ms-2">/</span>Terms & Conditions</h6>
	 </div>
	</div>
  </div>
</section>

<section id="about_pg" class="pt-4 pb-4">
 <div class="container-xl">
  <div class="about_pg_1 row justify-content-center">
   <div class="col-md-9">
    <div class="about_pg_1r mb-5">
	 <h3 class="mt-4">Terms & Conditions</h3>
	 <!-- <h5 class="col_yell mt-4">Mission of Our Creative House</h5> -->
	 <p class="mt-3 fs-6"><span class="fw-bold">Payment for New Clients:</span>  We require pre-payment for all new accounts until a credit history is successfully established with us.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Credit Terms for Repeat Clients:</span> After placing their fifth order, established clients are welcome to apply for <span class="fw-bold">Net 30 payment terms.</span></p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Accepted Payment Methods:</span> We accept all major credit cards (Visa, MasterCard, American Express, Discover) and company checks.</p>
	 <p class="mt-3 fs-6">Please note: A <span class="fw-bold">3% processing fee</span> will be applied to credit card payments exceeding <span class="fw-bold">$7,000.</span></p>

	
	 <h3 class="mt-5">Reporting Issues & Returns</h3>
	 <p class="mt-3 fs-6">Any issues regarding the <span class="fw-bold">quantity or quality</span> of goods must be reported to us within <span class="fw-bold">48 hours</span> of receiving your order.</p>
	 <p class="mt-3 fs-6"><span class="fw-bold">Before returning any merchandise, you must first obtain a <span class="fw-bold">Return Merchandise Authorization (RMA)</span> number from us.</p>
	 <p class="mt-3 fs-6">A <span class="fw-bold">restocking fee</span> may be applied to returns of blank (undecorated) items.</p>

	 <h3 class="mt-5">Important Disclaimers:</h3>
     <ul class="list-styled">
    <li class="mt-3 fs-6">All orders are contingent upon <span class="fw-bold">product availability.</span></li>
    <li class="mt-3 fs-6">We are not responsible for delays caused by factors outside of our control, including material shortages, customs processing, shipping carrier delays, or natural disasters (acts of God).</li>
    <li class="mt-3 fs-6"><span class="fw-bold">Product Variations:</span> Due to manufacturing tolerances, all product dimensions have acceptable variations of ¼”. Decoration also allows ¼” variation.</li>
    <li class="mt-3 fs-6"><span class="fw-bold">Color and Construction:</span> Production colors may differ slightly from the images shown in our catalogs. We cannot guarantee that the exact construction details of finished goods will remain perfectly consistent over time.</li>
    <li class="mt-3 fs-6"><span class="fw-bold">External Pricing/Information:</span> We are not responsible for pricing or descriptive errors found in third-party publications (e.g., ESP, SAGE).</li>
    <li class="mt-3 fs-6"><span class="fw-bold">Logo Use:</span> All logos displayed in our materials are for illustration purposes only. They do not imply endorsement and are not available for sale except by the authorized owner.</li>
</ul>

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