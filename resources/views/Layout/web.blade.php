@include('Layout.head')

<body>

    @include('Layout.header')

    <!-- container -->

    <div class="breadcome-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="breadcome-list">
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<div class="breadcome-heading">
											<form role="search" class="sr-input-func">
												<input type="text" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
												<a href="#"><i class="fa fa-search"></i></a>
											</form>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    @yield('crumb')
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    @if(Session::has('flash_success'))
                <div class="col-lg-12">
                    <div class="alert alert-success">
                        <strong><i class="fa fa-check-circle"></i> {!! session('flash_success') !!}</strong>
                    </div>
                </div>
            @endif
            @if(Session::has('flash_danger'))
                <div class="col-lg-12">
                    <div class="alert alert-danger">
                        <strong><i class="fa fa-info-circle"></i> {!! session('flash_danger') !!}</strong>
                    </div>
                </div>
            @endif
            @if(Session::has('flash_delete'))
                @section('script')
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                @endsection
            @endif
    @yield('content')



    @yield('modal')




    @include('Layout.footer')

    @include('Layout.footerScripts')