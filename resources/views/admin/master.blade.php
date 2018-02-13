<!doctype html>
<html lang="{{ app()->getLocale() }}">
<html lang="pl-PL">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>CMS U4U - TOPOZ</title>
	
	<link rel="shortcut icon" type="image/png" href="{{URL::asset('backend/img/favicon.png')}}">

	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::asset('css/materialize.css')}}">
	<link rel="stylesheet" href="{{URL::asset('backend/css/app.css')}}">
</head>

<body class="admin">

	@if (isset($komunikat))
	<div class="modal" id="mailModal" role="dialog">
		<div class="modal-bg"></div>
		<div class="container">
			<button class="modal-close" type="button">X</button>
			<div class="modal-content">
				<p>{{ $komunikat }} </p>
			</div>
		</div>
	</div>
	@endif

	@include('admin.header')

	<div id="app" class="main">
		@include('admin.menu')

		<div id="content">
			<div class="container">
				@yield('content')
			</div>
		</div>
	</div>


	<script id="script">
		{{-- var defaultLanguage = {!! json_encode($defaultLanguage) !!}; --}}
	</script>

	{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDof_9Q5vlf7L2iOzbE9yEoxyaRgjt7p70"></script> --}}
	<script type="text/javascript" src="{{URL::asset('backend/js/app.js')}}"></script>

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</body>
</html>