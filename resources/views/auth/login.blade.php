 <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300&amp;subset=latin" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
	<style>
		#signin-demo {
			position: fixed;
			right: 0;
			bottom: 0;
			z-index: 10000;
			background: rgba(0,0,0,.6);
			padding: 6px;
			border-radius: 3px;
		}
		#signin-demo img { cursor: pointer; height: 40px; }
		#signin-demo img:hover { opacity: .5; }
		#signin-demo div {
			color: #fff;
			font-size: 10px;
			font-weight: 600;
			padding-bottom: 6px;
		}
		#sign_login bg-primary{
			width: -moz-available;
		}
	</style>
</head>
<body class="theme-default page-signin">
	<!-- Page background -->
	<div id="page-signin-bg">
		<!-- Background overlay -->
		<div class="overlay"></div>
		<!-- Replace this with your bg image -->
		<img src="{{ asset('assets/demo/signin-bg-1.jpg') }}" alt="">
	</div>
	<!-- / Page background -->

	<!-- Container -->
	<div class="signin-container">
     <div id="app"> </div>
		<!-- Left side -->
		<div class="signin-info">
			<a href="#" class="logo">
				Proliga<span style="font-weight:100;">&nbsp;Futsal</span>
			</a> <!-- / .logo -->
			<div class="slogan">
				Simple. Flexible. Powerful.
			</div> <!-- / .slogan -->
			<ul>
				<li><i class="fa fa-sitemap signin-icon"></i> Flexible modular structure</li>
				<li><i class="fa fa-file-text-o signin-icon"></i> Well Commented Source</li>
				<li><i class="fa fa-outdent signin-icon"></i> RTL direction support</li>
				<li><i class="fa fa-heart signin-icon"></i> Crafted with love</li>
			</ul> <!-- / Info list -->
		</div>
		<!-- / Left side -->

		<!-- Right side -->
		<div class="signin-form">
			<!-- Form -->
			<div class="card-header"> {{ isset($url) ? ucwords($url) : ""}}</div>
			@isset($url)
			    <form method="POST" action="{{ url('login/'.$url) }}" id="signin-form_id" aria-label="{{ __('Login') }}">
			@else
				<form method="POST" action="{{ route('login') }}" id="signin-form_id" aria-label="{{ __('Login') }}">
			@endisset
				@csrf
				<div class="signin-text">
					<span>{{ __('Login') }}</span>
				</div> <!-- / .signin-text -->

				<div class="form-group">
					<input type="text" name="email" id="username_id" 
						   class="form-control input-lg @error('email') is-invalid @enderror" 
						   placeholder="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				{{-- 	<span class="fa fa-user signin-form-icon"></span> --}}
					@error('email')
							<span class="invalid-feedback" role="alert">
								<p class="text-danger">{{ $message }}</p>
							</span>
					@enderror
				</div> <!-- / Username -->

				<div class="form-group">
					<input type="password" name="password" id="password_id"
						   class="form-control input-lg @error('password') is-invalid @enderror" 
						   placeholder="Password" value="{{ old('password') }}" required autocomplete="current-password">
					{{-- <span class="fa fa-lock signin-form-icon"></span> --}}
					@error('password')
							<span class="invalid-feedback" role="alert">
								<p class="text-danger">{{ $message }}</p>
							</span>
					@enderror
				</div> <!-- / Password -->
				<div class="form-group w-icon">
					<div class="checkbox" style="margin: 0;">
						<label>
							<input type="checkbox" class="px" name="remember" {{ old('remember') ? 'checked' : '' }}> 
							<span class="lbl">{{ __('Ingatkan saya tetap masuk') }}</span>
						</label>
					</div>
				</div>
				<div class="form-actions">
					<input type="submit" value="LOGIN" class="signin-btn bg-primary" id="sign_login">
				</div> <!-- / .form-actions -->
			</form>
			<!-- / Form -->
		</div>
		<!-- Right side -->
	</div>
	<!-- / Container -->
	@isset($url)
		@if ($url == 'operator')
			<div class="not-a-member">Belum punya akun {{ $url }} ? <a href="{{ url('register/operator') }}">{{ __('Daftar sekarang') }}</a></div>
		@else
			<div class="not-a-member">Belum punya akun {{ $url }}? <a href="{{ url('register/club') }}">{{ __('Daftar Sekarang') }}</a></div>
		@endif
	@endisset
	
	

<!-- LanderApp's javascripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script> let init = []; </script>
<script type="text/javascript">
	// Resize BG
	init.push(function () {
		var $ph  = $('#page-signin-bg'),
		    $img = $ph.find('> img');

		$(window).on('resize', function () {
			$img.attr('style', '');
			if ($img.height() < $ph.height()) {
				$img.css({
					height: '100%',
					width: 'auto'
				});
			}
		});
	});

	// Setup Sign In form validation
	init.push(function () {
		$("#signin-form_id").validate({ focusInvalid: true, errorPlacement: function () {} });
		
		// Validate username
		$("#username_id").rules("add", {
			required: true,
		});

		// Validate password
		$("#password_id").rules("add", {
			required: true,
			minlength: 6
		});
	});

	window.LanderApp.start(init);
</script>
 </body>
</html>

