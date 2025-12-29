@extends('layouts.Frontend.app')

@section('title', 'Eco Mart')

@section('content')
	<section id="center" class="center_o pt-4 pb-4 bg-light">
		<div class="container-xl">
			<div class="row center_o1 text-center">
				<div class="col-md-12">
					<h1>CONTACT US</h1>
					<h6 class="d-inline-block  font_14 col_yell bg-white"><a class="col_light" href="#">Home</a> <span
							class="me-2 ms-2">/</span> Contact Us</h6>
				</div>
			</div>
		</div>
	</section>

	<section id="contact" class="pt-4 pb-4 bg_light_1">
		<div class="container-xl">
			<div class="row contact_1 ">
				<div class="col-md-4">
					<div class="contact_1i text-center  bg-white">
						<span class="bg_yell text-white fs-2 span_1"><i class="fa fa-map-marker"></i></span>
						<h5 class="mt-3">Our Location</h5>
						<p class="mb-0 mt-3">X892 YTower Stat, Suite 36 Knockland,<br> DB 6228 United Kingdom</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact_1i text-center  bg-white">
						<span class="bg_yell text-white fs-2 span_1"><i class="fa fa-envelope"></i></span>
						<h5 class="mt-3">Our Email</h5>
						<p class="mb-0 mt-3"><span class="fw-bold">Email Us:</span> info@gmail.Com<br> info@gmail.Com</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact_1i text-center  bg-white">
						<span class="bg_yell text-white fs-2 span_1"><i class="fa fa-phone"></i></span>
						<h5 class="mt-3">Phone Number</h5>
						<p class="mb-0 mt-3"><span class="fw-bold">Contacr Numbers:</span> +123 123 456<br> +123 123 456</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="contact_o" class="py-5 my-5">
		<div class="container-xl">
			<div class="row prod_1 mb-4 text-center">
				<div class="col-md-12">
					<h6 class="h_line font_13">LET’S TALK</h6>
					<h2 class="col_yell mt-3">SEND US A MASSAGE</h2>
					<p class="mb-0">We are always happy to talk with you. Be sure to write to us if you have any <br>
						questions or need help and support.</p>
				</div>
			</div>
			<div class="row contact_o1 justify-content-center">
				<form action="{{ route('contact.store') }}" method="POST" class="col-md-8">
					@csrf

						<div class="contact_o1l">

							<div class="contact_o1li row">
								<div class="col-md-6">
									<div class="contact_o1lil">
										<div class="input-group p-2 bg_light">
											<input type="text" name="first_name"
												class="form-control border-0 bg-transparent" placeholder="First Name*"
												required>
											<span class="input-group-btn">
												<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
													<i class="fa fa-user col_light"></i>
												</button>
											</span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="contact_o1lil">
										<div class="input-group p-2 bg_light">
											<input type="text" name="last_name" class="form-control border-0 bg-transparent"
												placeholder="Last Name*" required>
											<span class="input-group-btn">
												<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
													<i class="fa fa-user col_light"></i>
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>

							<div class="contact_o1li row mt-3">
								<div class="col-md-6">
									<div class="contact_o1lil">
										<div class="input-group p-2 bg_light">
											<input type="email" name="email" class="form-control border-0 bg-transparent"
												placeholder="Your Email*" required>
											<span class="input-group-btn">
												<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
													<i class="fa fa-envelope col_light"></i>
												</button>
											</span>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="contact_o1lil">
										<div class="input-group p-2 bg_light">
											<input type="text" name="phone" class="form-control border-0 bg-transparent"
												placeholder="Phone">
											<span class="input-group-btn">
												<button class="btn btn-primary bg-transparent border-0 fs-6" type="button">
													<i class="fa fa-phone col_light"></i>
												</button>
											</span>
										</div>
									</div>
								</div>
							</div>

							<div class="contact_o1li row mt-3">
								<div class="col-md-12">
									<div class="contact_o1lil">
										<textarea name="message" placeholder="Enter Your Message"
											class="form-control bg_light border-0 form_area" required></textarea>

										<h6 class="mb-0 mt-4">
											<button type="submit" class="button">
												SUBMIT
											</button>
										</h6>
									</div>
								</div>
							</div>

						</div>
				

				</form>

			</div>
		</div>
	</section>


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