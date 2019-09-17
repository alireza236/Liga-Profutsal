<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Liga Pro') }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="theme-default main-menu-animated">
<div id="main-wrapper">
	@include('layout.navbar')
	@include('layout.sidebar')
      <div id="app">
	     <div id="content-wrapper">		  
			@yield('main')
	     </div>  
    </div>
	<div id="main-menu-bg"></div>
</div>  
<!-- LanderApp's javascripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>let init = [];</script>
  <script type="text/javascript">
	init.push(function () {
		console.log('App is running')
		$('#popovers-demo').popover();
		$('#styled-finputs-example').pixelFileInput({ placeholder: 'Belum ada foto dipilih...' });
		$("#tinggi_bdn").select2({
			allowClear: true,
			placeholder: "Pilih tinggi badan..."
		});
		$("#berat_bdn").select2({
			allowClear: true,
			placeholder: "Pilih berat badan..."
		});
	})
	window.LanderApp.start(init);
</script>
</body>
</html>