<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#000000" />
	<meta name="description" content="TOPOZ." />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script> --}}
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<meta name="description" content="{{ $pageData['pageMetaDescription'] }}" />
	<meta name="keywords" content="{{ $pageData['pageMetaKeywords'] }}">

	<title>{{ $pageData['pageName'] }}</title>

	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,200,200i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">

	<link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.pagepiling.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/lightbox.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.default.min.css') }}">

	<script type="text/javascript" src="{{ URL::asset('js/jquery.pagepiling.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/lightbox.min.js') }}"></script>

	{{-- <script src="http://malsup.github.com/jquery.cycle2.js"></script> --}}
	<script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
</head>
<body>

	<nav class="nav">
		<div class="nav-container" id="nav-container">
			<a href="/" class="menu-logo">
				<img src="http://topoz.u4u.nazwa.pl/img/logo.png">
			</a>
			<ul class="nav-list">
				<li data-menuanchor="home" class="nav-item active"> <a href="#home">o firmie</a></li>
				<li data-menuanchor="offer" class="nav-item"> <a href="#offer">oferta</a></li>
				<li data-menuanchor="projects" class="nav-item"> <a href="#projects">zrealizowane projekty</a></li>
				<li data-menuanchor="contact" class="nav-item"> <a href="#contact">kontakt</a></li>
				<li data-menuanchor="drive" class="nav-item"> <a href="#drive">dojazd</a></li>
			</ul>
		</div>
	</nav>

	<nav class="nav-small">
		<a href="/" class="menu-small-logo">
			<img src="http://topoz.u4u.nazwa.pl/img/logo.png">
		</a>
		<div class="container">
			<ul class="nav-small-list">
				<li class="nav-small-item"><a href="#home">o firmie</a></li>
				<li class="nav-small-item"><a href="#offer">oferta</a></li>
				<li class="nav-small-item"><a href="#projects">zrealizowane projekty</a></li>
				<li class="nav-small-item"><a href="#contact">kontakt</a></li>
				<li class="nav-small-item"><a href="#drive">dojazd</a></li>
			</ul>
		</div>

		<div class="nav-small-hamburger" role="button">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</nav>

	<main class="main" id="pagepiling">
		<div class="section home pp-scrollable background background__home" id="home">
			<div>
				<div class="home-content">
					<img src="{{ URL::asset('img/logo.png') }}" class="home-logo">
					<h2 class="home-title">O firmie</h2>
					<div class="line"></div>
					<span class="home-line">{{ $ofirmie1 }}</span>

					<ul class = "home-list">
						@foreach($ofirmie2 as $item) <li class = "home-item">{{ $item }}</li> @endforeach
					</ul>

					<span class="home-line">{{ $ofirmie3 }}</span>
				</div>
				<div class="bottom-margin"></div>
			</div>
		</div>

		<div class="section offer pp-scrollable background background__offer" id="offer">
			<div class="offer-content">
				<div class="collumn1">
					<h2 class="offer-title">Oferta</h2>
					<div class="line"></div>
					<ul class = "offer-list">
						@foreach($oferta1 as $item) <li class = "offer-item">{{ $item }}</li> @endforeach
					</ul>
				</div>
				<div class="collumn2 oferta-pictures">
					<a href="img/offer/1.jpg" data-lightbox="image1" alt="Zdjęcie" class="image1">
						<div class="caption"><p>POWIĘKSZ</p></div>
					</a>
					<a href="img/offer/2.jpg" data-lightbox="image2" alt="Zdjęcie" class="image2">
						<div class="caption">POWIĘKSZ</div>
					</a>
				</div>
			</div>
		</div>

		<div class="section projects pp-scrollable background background__projects" id="projects">
			<div class="container">
				{{-- <p class="projects-text">Poniżej prezentujemy Państwu zrealizowane przez naszą firmę projekty.</p> --}}
				
				<div class="owl-carousel owl-theme">
					@for ($i = 0; $i < count($projects); $i++)
					<div style="text-align: center;">
						<div class="owl-my-item" style="display:inline-block">
							<div class= "projects-picture">
								<a style="display: block" href="/img/projects/{{ $projects[$i]->image }}" data-lightbox="projekt" data-title="Zdjęcie" title="Zdjęcie" alt="Zdjęcie">
									<figure>
										<img src="/img/projects/thumb/{{ $projects[$i]->thumb }}" class="img-responsive">
										<span><p>POWIĘKSZ</p></span>
									</figure>
								</a>
							</div>
							<div class="carousel-caption">
								<h3>{{ $projects[$i]->name }}</h3>
								<p>{{ $projects[$i]->description}}</p>
							</div>
						</div>
						@if (isset($projects[$i+1]))
						@php $i++ @endphp
						<div class="owl-my-item" style="display:inline-block">
							<div class= "projects-picture">
								<a style="display: block" href="/img/projects/{{ $projects[$i]->image }}" data-lightbox="projekt" data-title="Zdjęcie" title="Zdjęcie" alt="Zdjęcie">
									<figure>
										<img src="/img/projects/thumb/{{ $projects[$i]->thumb }}" class="img-responsive">
										<span><p>POWIĘKSZ</p></span>
									</figure>
								</a>
							</div>
							<div class="carousel-caption">
								<h3>{{ $projects[$i]->name }}</h3>
								<p>{{ $projects[$i]->description }}</p>
							</div>
						</div>
						@endif
					</div>
					@endfor
					{{-- Draszek --}}
				{{-- @php
				if(count($projects) > 10):
				@endphp --}}
			</div>
				{{-- @php
				endif;	
				@endphp --}}
				{{-- EndDraszek --}}
			</div>
		</div>

		<div class="section contact pp-scrollable background background__contact" id="contact">
			<div class ="container">
				<div class = "contact-content">
					<h2 class="contact-title">Przedsiębiorstwo Gospodarki Gruntami <span class ="contact-title-span">TOPOZ</span> Maciej Wronka</h2>
					@if(Session::has('message'))
					<div class ="alert">
						{{ Session::get('message')}}
					</div>
					@endif
					<div class ="contact-information">
						<div class="contact-visit-box col-md-3 col-xs-12">
							<img src="{{ URL::asset('img/contact1.png') }}" class="contact-img">
							<p class ="contact-visit-title">odwiedź nas</p>
							<p class = "contact-visit-adress">
								<span class ="contact-line">{{ $kontakt1 }}</span>
							</p>
						</div>
						<div class="contact-visit-box col-md-3 col-xs-12">
							<img src="{{ URL::asset('img/contact-2.png') }}" class="contact-img">
							<p class ="contact-visit-title">zadzwoń lub napisz</p>
							<span class ="contact-line">{{ $kontakt2 }}</span>
						</div>
						<div class="contact-visit-box col-md-3 col-xs-12">
							<img src="{{ URL::asset('img/contact-3.png') }}" class="contact-img">
							<p class ="contact-visit-title">informacje</p>
							<span class ="contact-line">{{ $kontakt3 }}</span>
						</div>
					</div>


					<div class="contact-form1">
						<form action="{{ route('sendmail') }}" method="POST">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6">
									<input id="name" name="name" type ="text" class="form-control" placeholder="Imie*" required>
								</div>
								<div class=col-md-6>
									<input id="email" name="email" type ="email" class="form-control" placeholder="Adres email*" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input id="phone" name="phone" type ="text" class="form-control" placeholder="Numer telefonu" required>
								</div>
								<div class="col-md-6">
									<input id="subject" name="subject" type ="text" class="form-control" placeholder="Temat*" required>
								</div>
							</div>
							<textarea id="message" name="message" type ="text" class="form-control" placeholder="Treść wiadomości...*" required></textarea>
							<button type="submit" class="btn btn-success">Wyślij</button>
						</form>
					</div>

				</div>
			</div>
		</div>

		<div class="section drive pp-scrollable background background__drive" id="drive">
			<div class ="container">
				<div class ="drive-content">
					<h2 class="drive-title">problem z <span class ="drive-title-span">dojazdem do naszego biura?</span></h2>
					<p class="drive-description">Zapoznaj się z poniższą mapą aby rozwiać wszelkie wątpliwości dotyczące naszej lokalizacji!</p>
					<div class="drive-position">
						<div class="col-md-6">
							<p class="drive-position-x"><span class="drive-span-x">X:{{ $dojazd1 }}</span></p>
						</div>
						<div class="col-md-6">
							<p class="drive-position-y"><span class="drive-span-y">Y:{{ $dojazd2 }}</span></p>
						</div>
					</div>
					<div class="drive-maps">
						<div id="map"></div>
					</div>
				</div>
				<div class="bottom-margin"></div>
			</div>
		</div>
	</main>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEnPHr5ZL49ObsguWFDx46PwBOYPevF-w&callback=initMap"></script>

	<script>
		function initMap() {
			var uluru = {lat: {{ $dojazd1 }}, lng: {{ $dojazd2 }} };
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 14,
				center: uluru
			});
			var marker = new google.maps.Marker({
				position: uluru,
				map: map
			});

			google.maps.event.addListener(marker, 'click', function() {
				window.open("https://www.google.com/maps/?q={{ $dojazd1 }},{{ $dojazd2 }}",'_blank');
			});
		}

		$(document).ready(function() {
			$('#pagepiling').pagepiling({
				menu: '.nav-list',
				direction: 'horizontally',
				verticalCentered: true,
				sectionsColor: [],
				anchors: ['home', 'offer', 'projects', 'contact','drive'],
				scrollingSpeed: 700,
		        // easing: 'fade',
		        loopBottom: false,
		        loopTop: false,
		        css3: true,
		        navigation: {
		        	'textColor': '#000',
		        	'bulletsColor': '#ffffff'
		        },
		        normalScrollElements: null,
		        normalScrollElementTouchThreshold: 5,
		        touchSensitivity: 110,
		        keyboardScrolling: true,
		        sectionSelector: '.section',
		        animateAnchor: false,

				//events
				onLeave: function(index, nextIndex, direction){},
				afterLoad: function(anchorLink, index){},
				afterRender: function(){},
			});

			$('.nav-small-hamburger').click(function() {
				$('.nav-small-list').stop().slideToggle();
			});

			$('.nav-small-item a').click(function() {
				$('.nav-small-list').stop().slideToggle();
			});
		});

		$(".section").scroll(function(){
			if ($(this).scrollTop() > 10) {
				$('#nav-container').addClass("darker");
			} else {
				$('#nav-container').removeClass("darker");
			}
		});

		$(document).ready(function(){
			$(".owl-carousel").owlCarousel({
				center: false,
				items:3,
				loop:false,
				margin:10,
				dots: false,
				nav:false,
				navText: '<>',
				responsive:{
					840:{
						items:5,
						nav:true
					}
				}
			});
		});

	</script>

</body>
</html>