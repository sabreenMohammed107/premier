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
						<div class="panel-body"style="background-color:rgba(255,255,255,0.5) !important;border-radius: .5rem !important;">
							<div class="">
								<div class="text-center m-b-md custom-login">
									<img class="main-logo" src="{{ asset('webassets/img/logo/logo.png')}}" alt="test" />
									<p><!--This is the best accounting app ever !--></p>
									<br />
								</div>
								<form method="POST" action="{{ route('login') }}">
                                     @csrf
									<div class="form-group">
										<label class="control-label" for="username">Username</label>
										<input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="user_name" id="user_name" class="form-control">
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

									<button type="submit" class="btn btn-default btn-block" value="" >Login</button>
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
