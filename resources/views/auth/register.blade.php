<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
	<style>
		#signup-demo {
			position: fixed;
			right: 0;
			bottom: 0;
			z-index: 10000;
			background: rgba(0,0,0,.6);
			padding: 6px;
			border-radius: 3px;
		}
		#signup-demo img { cursor: pointer; height: 40px; }
		#signup-demo img:hover { opacity: .5; }
		#signup-demo div {
			color: #fff;
			font-size: 10px;
			font-weight: 600;
			padding-bottom: 6px;
		}
	</style>
</head>
<body class="theme-default page-signup">
	<!-- Page background -->
	<div id="page-signup-bg">
		<!-- Background overlay -->
		<div class="overlay"></div>
		<!-- Replace this with your bg image -->
		<img src="{{ asset('assets/demo/signin-bg-1.jpg') }}" alt="">
	</div>
	<!-- / Page background -->
    <div id="app"></div>
	<!-- Container -->
	<div class="signup-container">
		<!-- Header -->
		<div class="signup-header">
			<a href="#" class="logo">
				Proliga<span style="font-weight:100;">&nbsp;Futsal</span>
			</a> <!-- / .logo -->
			<div class="slogan">
				Simple. Flexible. Powerful.
			</div> <!-- / .slogan -->
		</div>
		<!-- / Header -->

		<!-- Form -->
		<div class="signup-form">
		   <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}}</div>
		   @isset($url)
		     <form method="POST" action="{{ url('register/'.$url) }}" id="signup-form_id" aria-label="{{ __('Register') }}">
			@else	   
			 <form method="POST" action="{{ route('register') }}" id="signup-form_id" aria-label="{{ __('Register') }}">
		   @endisset
				@csrf
				<div class="signup-text">
					<span>{{ __('Register') }}</span>
				</div>
				<div class="form-group w-icon">
					<span class="fa fa-info signup-form-icon"></span>
					<input id="name_id" type="text" class="form-control input-lg @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}"  autocomplete="name" autofocus>
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group w-icon">
					<input id="email_id" type="text" class="form-control input-lg @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}"  autocomplete="email">
					<span class="fa fa-envelope signup-form-icon"></span>
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group w-icon">
					<input id="password_id" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="new-password">
					<span class="fa fa-user signup-form-icon"></span>
					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group w-icon">
					<input id="password_confirm" type="password" class="form-control input-lg" name="password_confirmation" placeholder="Confirm paswword" autocomplete="new-password">
					<span class="fa fa-lock signup-form-icon"></span>
				</div> 
				<div class="form-actions">
					<input type="submit" value="SIGN UP" class="signup-btn bg-primary">
				</div>
			</form>
			<!-- / Form -->
		</div>
		<!-- Right side -->
	</div>

		@isset($url)
        	@if ($url == 'operator')
				<div class="have-account">Sudah punya akun {{ $url }} ? <a href="{{ url('login/operator') }}">{{ __('Masuk sekarang') }}</a></div>
			@else
				<div class="have-account">Sudah punya akun {{ $url }}? <a href="{{ url('login/club') }}">{{ __('Masuk Sekarang') }}</a></div>
			@endif  
		@endisset


<!-- LanderApp's javascripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script> let init = []; </script>

<script type="text/javascript">
	// Resize BG
	init.push(function () {
		$("#signup-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });

		// Validate name
		$("#name_id").rules("add", {
			required: true,
			minlength: 1
		});

		// Validate email
		$("#email_id").rules("add", {
			required: true,
			email: true
		});
		
		// Validate password
		$("#password_id").rules("add", {
			required: true,
			minlength: 6
		});

       // confirm password
		$("#password_confirm").rules("add", {
			required: true,
			minlength: 6
		});
	});

	window.LanderApp.start(init);
</script>
</html>
