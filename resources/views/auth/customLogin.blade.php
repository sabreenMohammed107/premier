@include('Layout.head')

<body style="background-image:url({{ asset('webassets/img/bg-login.jpg')}})">
	<div class="container">
		<div class="error-pagewrap">
			<div class="error-page-int">
				<!--<div class="text-center m-b-md custom-login">
					<img class="main-logo" src="img/logo/logo.png" alt="" />
					<p>This is the best accounting app ever !</p>
				</div>-->
				<div class="content-error">
					<div class="hpanel">
						<div class="panel-body" style="background-color:rgba(255,255,255,0.5) !important;border-radius: .5rem !important;">
							<div class="">
								<div class="header-top-menu tabl-d-n">
									<ul class="nav navbar-nav mai-top-nav">
										<li class="nav-item dropdown res-dis-nn">
											@if(str_replace('_', '-', app()->getLocale())=='ar')
											<a href="{{ URL::to('changeLang/ar') }}" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span> عربي </a>
											@else
											<a href="{{ URL::to('changeLang/en') }}" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span> English </a>
										@endif

										<div role="menu" class="dropdown-menu animated zoomIn">
											@if(str_replace('_', '-', app()->getLocale())=='ar')
											<a href="{{ URL::to('changeLang/en') }}" class="dropdown-item" id="english">English</a>
											@else
											<a href="{{ URL::to('changeLang/ar') }}" class="dropdown-item" id="arabic">عربي</a>
											@endif
										</div>
										</li>
									</ul>
								</div>
								<div class="text-center m-b-md custom-login">
									<img class="main-logo" src="{{ asset('webassets/img/logo/logo.png')}}" alt="test" />
									<p>
										<!--This is the best accounting app ever !-->
									</p>
									<br />
								</div>

								<form method="POST" action="{{ route('login') }}">
									@csrf
									<div class="form-group">
										<label class="control-label" for="username">Username</label>
										<input type="text" placeholder="username" title="Please enter you username" required="" value="" name="user_name" id="user_name" class="form-control">
										<span class="help-block small">Your unique username to app</span>
									</div>
									<div class="form-group">
										<label class="control-label" for="password">Password</label>
										<input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
										<span class="help-block small">Yur strong password</span>
									</div>
									<div class="form-group" style="padding: 0px 25px; ">
										<div class="checkbox login-checkbox">
											<label>
												<input type="checkbox" name="remember" id="remember" class="i-checks"> Remember me
											</label>
										</div>
									</div>

									<button type="submit" class="btn btn-default btn-block" value="">Login</button>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	@include('Layout.footer')

	@include('Layout.footerScripts')
</body>