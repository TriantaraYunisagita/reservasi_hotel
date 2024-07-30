<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Pemesanan Hotel</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<!--========== Favicon and touch icons  ==========-->
	<link rel="shortcut icon" href={{'assets/images/favicon.ico'}} type="image/x-icon" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href={{'assets/images/apple-touch-icon-57x57.png'}} />
	<link rel="apple-touch-icon" sizes="72x72" href={{'assets/images/apple-touch-icon-72x72.png'}} />
	<link rel="apple-touch-icon" sizes="76x76" href={{'assets/images/apple-touch-icon-76x76.png'}} />
	<link rel="apple-touch-icon" sizes="114x114" href={{'assets/images/apple-touch-icon-114x114.png'}} />
	<link rel="apple-touch-icon" sizes="120x120" href={{'assets/images/apple-touch-icon-120x120.png'}} />
	<link rel="apple-touch-icon" sizes="144x144" href={{'assets/images/apple-touch-icon-144x144.png'}} />
	<link rel="apple-touch-icon" sizes="152x152" href={{'assets/images/apple-touch-icon-152x152.png'}} />

	<!--========== Google fonts  ==========-->
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300,700' rel='stylesheet' type='text/css'>

	<!--========== Stylesheets  ==========-->
	<link rel="stylesheet" href={{'assets/css/bootstrap.css'}}>
	<link rel="stylesheet" href={{'assets/css/font-awesome.min.css'}}>
	<link rel="stylesheet" href={{'assets/css/jquery.bxslider.css'}}>
	<link rel="stylesheet" href={{'assets/css/style.css'}}>

	<!--[if IE]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div class="preloader">
		<div class="loading-icon"></div>
	</div>
	<!-- Start Header -->
	<div class="header">
		<div class="container header-container">
			<div class="row">
				<!-- Start logo -->
				<div class="col-md-4 site-logo ">
				</div>
				<!-- End site-logo-->
				<!-- Start nav-container -->
				<div class="col-md-5 nav-container text-center">
					<ul class="navigation">
						<li>
							@if(Route::has('login'))
							@auth
							@if(auth()->user()->level == 'Customer')
							<a href="{{route('customer.customer.dashboard')}}">Dashboard</a>
							@else
							<a href="{{route('admin.admin.dashboard')}}">Dashboard</a>
							@endif
							@else
							<a href="#login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
							@endauth
							@endif
						</li>
						<li><a href="#section-home">Home</a></li>
						<li><a href="#section-about">About</a></li>
						<li><a href="#section-contact">Contact</a></li>
					</ul>
				</div>
				<!-- End nav-container -->
				<div class="col-md-3 social-container text-center">
					<ul class="socials">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
				<!-- End social-container -->
			</div>
			<!-- End Row -->
		</div>
		<!-- End container -->
	</div>
	<!-- End header -->

	<!-- Start section-home -->
	<section id="section-home" class="home-wrap">
		<div class="home-overlay"></div>

		<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form method="POST" action="{{ route('login') }}">
							@csrf

							<!-- Email Address -->
							<div>
								<x-input-label for="email" :value="__('Email')" />
								<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
								<x-input-error :messages="$errors->get('email')" class="mt-2" />
							</div>

							<!-- Password -->
							<div class="mt-4">
								<x-input-label for="password" :value="__('Password')" />

								<x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

								<x-input-error :messages="$errors->get('password')" class="mt-2" />
							</div>

							<!-- Remember Me -->
							<div class="block mt-4">
								<label for="remember_me" class="inline-flex items-center">
									<input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
									<span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
								</label>
							</div>

							<div class="flex items-center justify-end mt-4">
								@if (Route::has('password.request'))
								<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
									{{ __('Forgot your password?') }}
								</a>
								@endif

								<x-primary-button class="ms-3">
									{{ __('Log in') }}
								</x-primary-button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<!-- Start counter -->
			<div class="col-md-12 counter-wrap text-center">
				<div class="counter">
					<div class="time"></div>
				</div>
			</div>
			<!-- Start counter -->
		</div>
		<!-- End container -->

		<!-- Start banner-wrap -->
		<div class="banner-wrap">
			<div class="container banner-container">
				<div class="row">
					<!-- Start banner-left -->
					<div class="col-md-6 banner-left  text-center">
						<h2 class="welcome-text">Coming <span>soon</span></h2>
						<span class="subtitle">We are almost done. Just few more days</span>
					</div>
				</div>
				<!-- End row -->
			</div>
			<!-- End banner-container -->
		</div>
		<!-- End banner-wrap -->
	</section>
	<!-- End section-home -->

	<!-- Start section-about -->
	<section id="section-about" class="about-wrap">
		<div class="container">
			<div class="row">
				<!-- Start section-title -->
				<div class="col-md-12 section-title">
					<h3 class="black-border">
						<span class="red-border">About and </span><span class="red-bold"> Features</span>
					</h3>
				</div>
				<!-- End section-title -->

				<div class="col-md-6">
					<!-- Start image-slider -->
					<div class="image-slider">
						<ul class="slider">
							<li><img src="assets/images/1.jpg" alt=""></li>
							<li><img src="assets/images/2.jpg" alt=""></li>
							<li><img src="assets/images/3.jpg" alt=""></li>
						</ul>
					</div>
					<!-- End image-slider -->
				</div>

				<div class="col-md-6">
					<!-- Start tab-container -->
					<div class="tab-container">
						<!-- Start tab-nav -->
						<ul class="tab-nav">
							<li class="tab-selected"><a href="#one">About</a></li>
							<li><a href="#two">Features</a></li>
							<li><a href="#three">Others</a></li>
						</ul>
						<!-- End tab-nav -->

						<!-- Start Tab -->
						<div class="tab one">
							<h4>Our professionalism helps us to grow</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, soluta.
								consectetur adipisicing elit. Id, soluta elit consectetur adipisicing elit. Id, soluta consectetur adipi sicing elit. id soluta soluta consec elit tetur adipisicing elit soluta consectetur.</p>
							<!-- Start list-items -->
							<ul class="list-items">
								<li><span class="fa fa-long-arrow-right"></span>We always make our clients happy.</li>
								<li><span class="fa fa-long-arrow-right"></span>World class designers are our team members.</li>
								<li><span class="fa fa-long-arrow-right"></span>Best quality products makes us exceptional</li>
							</ul>
							<!-- End list-items -->
						</div>
						<!-- End Tab -->

						<!-- Start Tab -->
						<div class="tab two">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, soluta consectetur adipisicing elit Id soluta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste, dignissimos</p>

							<!-- Start single feature -->
							<div class="feature">
								<span class="feature-icon">
									<i class="fa fa-bolt"></i>
								</span>
								<div class="feature-desc">
									<h5>Our main feature one</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus cupiditate esse soluta corrupti. Id, dolores eos.</p>
								</div>
							</div>
							<!-- End single feature -->

							<!-- Start single feature -->
							<div class="feature">
								<span class="feature-icon">
									<i class="fa fa-database"></i>
								</span>
								<div class="feature-desc">
									<h5>Our main feature two</h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus cupiditate esse soluta corrupti. Id, dolores eos.</p>
								</div>
							</div>
							<!-- End single feature -->
						</div>
						<!-- End Tab -->

						<!-- Start Tab -->
						<div class="tab three">
							<h4>This is another tab title</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus obcaecati cupiditate accusamus corporis commodi praesentium fuga, dolor recusandae ea blanditiis.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus obcaecati cupiditate accusamus corporis commodi praesentium fuga, dolor recusandae ea blanditiis.</p>
						</div>
						<!-- End Tab -->
					</div>
					<!-- End tab-container -->
				</div>
				<!-- End col-md-6 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- End section-about -->

	<!-- Start section-services -->
	<section id="section-services" class="services-wrap">
		<div class="container">
			<div class="row">
				<!-- Start section-title -->
				<div class="col-md-12 section-title">
					<h3 class="black-border">
						<span class="red-border">Our main </span><span class="red-bold"> services</span>
					</h3>
				</div>
				<!-- End section-title -->

				<!-- Start single Service -->
				<div class="col-md-4 service">
					<div class="icon">
						<i class="fa fa-laptop"></i>
					</div>
					<h4>Web design</h4>
					<p>Lorem ipsum dolor sit amet, consect etur adipi sicing elit. Deserunt volup tates consectetur adipisicing elit.</p>
				</div>
				<!-- End single Service -->

				<!-- Start single Service -->
				<div class="col-md-4 service">
					<div class="icon">
						<i class="fa fa-paint-brush"></i>
					</div>
					<h4>Graphics design</h4>
					<p>Lorem ipsum dolor sit amet, consect etur adipi sicing elit. Deserunt volup tates consectetur adipisicing elit.</p>
				</div>
				<!-- End single Service -->

				<!-- Start single Service -->
				<div class="col-md-4 service">
					<div class="icon">
						<i class="fa fa-edit"></i>
					</div>
					<h4>User interface design</h4>
					<p>Lorem ipsum dolor sit amet, consect etur adipi sicing elit. Deserunt volup tates consectetur adipisicing elit.</p>
				</div>
				<!-- End single Service -->

				<!-- Start single Service -->
				<div class="col-md-4 service">
					<div class="icon">
						<i class="fa fa-laptop"></i>
					</div>
					<h4>Web design</h4>
					<p>Lorem ipsum dolor sit amet, consect etur adipi sicing elit. Deserunt volup tates consectetur adipisicing elit.</p>
				</div>
				<!-- End single Service -->

				<!-- Start single Service -->
				<div class="col-md-4 service">
					<div class="icon">
						<i class="fa fa-paint-brush"></i>
					</div>
					<h4>Graphics design</h4>
					<p>Lorem ipsum dolor sit amet, consect etur adipi sicing elit. Deserunt volup tates consectetur adipisicing elit.</p>
				</div>
				<!-- End single Service -->

				<!-- Start single Service -->
				<div class="col-md-4 service">
					<div class="icon">
						<i class="fa fa-edit"></i>
					</div>
					<h4>User interface design</h4>
					<p>Lorem ipsum dolor sit amet, consect etur adipi sicing elit. Deserunt volup tates consectetur adipisicing elit.</p>
				</div>
				<!-- End single Service -->

			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- End section-services -->

	<!-- Start section-achievement -->
	<section id="section-achievement" class="achievement-wrap text-center">
		<div class="achievement-overlay"></div>
		<div class="container">
			<div class="row">
				<!-- Start section-title -->
				<div class="col-md-12 section-title">
					<h3 class="white-border">
						<span class="red-border">Our </span><span class="red-bold"> Achievements</span>
					</h3>
				</div>
				<!-- End section-title -->

				<!-- Start achievement-box -->
				<div class="col-md-3 achievement-box">
					<div class="achievement">
						50
						<span>Projects</span>
					</div>
				</div>
				<!-- End achievement-box -->

				<!-- Start achievement-box -->
				<div class="col-md-3 achievement-box">
					<div class="achievement">
						40
						<span>Articles</span>
					</div>
				</div>
				<!-- End achievement-box -->

				<!-- Start achievement-box -->
				<div class="col-md-3 achievement-box">
					<div class="achievement">
						50
						<span>Happy clients</span>
					</div>
				</div>
				<!-- End achievement-box -->

				<!-- Start achievement-box -->
				<div class="col-md-3 achievement-box">
					<div class="achievement">
						60
						<span>Tutorials</span>
					</div>
				</div>
				<!-- End achievement-box -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- Start section-achievement -->

	<!-- Start section-contact -->
	<section id="section-contact" class="contact-wrap">
		<div class="container">
			<div class="row">
				<!-- Start section-title -->
				<div class="col-md-12 section-title">
					<h3 class="black-border">
						<span class="red-border">Leave a </span><span class="red-bold"> message</span>
					</h3>
				</div>
				<!-- End section-title -->

				<!-- Start address-wrap -->
				<div class="col-md-6 address-wrap">
					<!-- Start address-item -->
					<div class="address-item">
						<span class="address-icon">
							<i class="fa fa-mobile"></i>
						</span>
						<div class="address-desc">
							<h4>Available 24/7</h4>
							<p>088 01888 666787</p>
						</div>
					</div>
					<!-- End address-item -->

					<!-- Start address-item -->
					<div class="address-item">
						<span class="address-icon">
							<i class="fa fa-envelope-o"></i>
						</span>
						<div class="address-desc">
							<h4>Email us</h4>
							<p>yourmail@domain.com</p>
						</div>
					</div>
					<!-- End address-item -->

					<!-- Start address-item -->
					<div class="address-item">
						<span class="address-icon">
							<i class="fa fa-map-marker"></i>
						</span>
						<div class="address-desc">
							<h4>Corporate office</h4>
							<p>21/b Akhalia, Sylhet, Bangladesh</p>
						</div>
					</div>
					<!-- End address-item -->
				</div>
				<!-- End address-wrap -->

				<!-- Start form-wrap -->
				<div class="col-md-6 form-wrap">
					<form id="contact-form" action="#">
						<div class="col-md-12 form-item">
							<span class="input-icon">
								<i class="fa fa-user"></i>
							</span>
							<input id="name" class="form-input" type="text" name="name" placeholder="Your Name">
						</div>

						<div class="col-md-12 form-item">
							<span class="input-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
							<input id="email" class="form-input" type="email" name="email" placeholder="Your Email">
						</div>

						<div class="col-md-12 form-item">
							<span class="input-icon">
								<i class="fa fa-pencil-square-o"></i>
							</span>
							<textarea id="message" class="form-input" name="message" cols="30" rows="4" placeholder="Your Message"></textarea>
						</div>

						<button type="submit" class="form-submit">
							<span class="fa fa-paper-plane-o"></span>
							Send Message
						</button>
					</form>
					<!-- End form -->
					<div class="success-msg">
						<p></p>
					</div>
				</div>
				<!-- End form-wrap -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</section>
	<!-- End section-contact -->

	<!-- Start section-footer -->
	<div id="section-footer" class="footer-wrap text-center">
		<div class="container">
			<div class="col-md-12">
				<p class="copyright-text">&copy; 2015 <span>Jaximus</span>. All rights reserved</p>
			</div>
		</div>
	</div>
	<!-- End section-footer -->

	<!--========= Js files =========-->
	<script src={{'assets/js/jquery-1.11.1.min.js'}}></script>
	<script src={{'assets/js/jquery.nav.js'}}></script>
	<script src={{'assets/js/jquery.jcountdown.js'}}></script>
	<script src={{'assets/js/jquery.nicescroll.min.js'}}></script>
	<script src={{'assets/js/jquery.ajaxchimp.min.js'}}></script>
	<script src={{'assets/js/jquery.validate.min.js'}}></script>
	<script src={{'assets/js/jquery.bxslider.min.js'}}></script>
	<script src={{'assets/js/jquery.xdomainrequest.min.js'}}></script>
	<script src={{'assets/js/jquery.placeholder.min.js'}}></script>
	<script src={{'assets/js/scripts.js'}}></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>