<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<div class="menu-content top" id="menu-content-demo">
				<div>
					@php
					   isset($url) ? $url : ""; 
						$user = Auth::user()->name; 
					@endphp
					<div class="text-bg"><span class="text-slim">Welcome,</span><br><span class="text-semibold">{{ ucwords($user) }}</span></div>
					<img src="{{ asset('assets/demo/avatars/1.jpg') }}" alt="" class="">
					<div class="btn-group" id="popovers-demo">
						{{-- 
							<a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-envelope"></i></a>
							<a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-cog"></i></a> 
							<a href="#" class="btn btn-xs btn-danger btn-outline dark"><i class="fa fa-power-off"></i></a>
							--}}
						<a href="#" class="btn btn-xs btn-primary btn-outline dark"><i class="fa fa-user"></i></a>
						<a class="btn btn-xs btn-danger btn-outline dark" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();" 
						data-toggle="tooltip" data-placement="right" title="" data-original-title="Tooltip on right">
						<i class="fa fa-power-off"></i></a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
						{{-- @isset($url)
						<form id="logout-form" action="{{ route('logout.'.$url)  }}" method="POST" style="display: none;">@csrf</form>
						@endisset   --}}
						 
					</div>
					<a href="#" class="close">&times;</a>
				</div>
			</div>
			<ul class="navigation">
               @auth('operator')
			   		<li><a href="#"><i class="menu-icon fa fa-bar-chart-o"></i><span class="mm-text">Summary</span></a></li>
			   		<li><a href="#"><i class="menu-icon fa fa-group"></i><span class="mm-text">Klub</span></a></li>
			   		<li><a href="#"><i class="menu-icon fa fa-male"></i><span class="mm-text">Wasit</span></a></li>
			   		<li><a href="#"><i class="menu-icon fa fa-hospital-o"></i><span class="mm-text">Stadium</span></a></li>
			   		<li><a href="#"><i class="menu-icon fa fa-plus-square"></i><span class="mm-text">Assuransi</span></a></li>
			   @endauth
			   
               @auth('club')
			    	<li><a href="#"><i class="menu-icon fa fa-bar-chart-o"></i><span class="mm-text">Dashboard</span></a></li>
			   		<li><a href="{{ url('player') }}"><i class="menu-icon fa fa-users"></i><span class="mm-text">Players</span></a></li>
					<li><a href="#"><i class="menu-icon fa fa-calendar"></i><span class="mm-text">Schedule Match</span></a></li>
			   @endauth
				 
			</ul> <!-- / .navigation -->
			@auth('operator')
			<div class="menu-content">
				<a href="#" class="btn btn-primary btn-block btn-outline dark">Create Invoice</a>
			</div>
			@endauth
		</div> <!-- / #main-menu-inner -->
	</div> <!-- / #main-menu -->