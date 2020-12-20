	<!-- Start Left menu area -->
	<div class="left-sidebar-pro">
		<nav id="sidebar" class="">
			<div class="sidebar-header">
				<a href="#"><img class="main-logo" src="{{ asset('webassets/img/logo/logo.png')}}" alt="" /></a>
				<strong><a href="#"><img src="img/logo/logosn.png" alt="" /></a></strong>
			</div>
		</nav>
	</div>
	<!-- End Left menu area -->
	<!-- Start Welcome area -->
	<div class="all-content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="logo-pro">
						<a href="#"><img class="main-logo" src="{{ asset('webassets/img/logo/logo.png')}}" alt="" /></a>
					</div>
				</div>
			</div>
		</div>

		<div class="header-advance-area">
			<div class="header-top-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="header-top-wraper">
								<div class="row top-menu row-rtl">
									<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 " style="padding: 0 70px;">
										<div class="header-top-menu dir-menu tabl-d-n ">
											<ul class="nav navbar-nav mai-top-nav top-menu row-rtl">
											@if (Auth::user()->role_id == 100 || Auth::user()->role_id == 110)
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>بيانات أساسية</a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="{{ route('work-role.index') }}" class="dropdown-item">قواعد العمل</a>
														<a href="{{ route('balance-adjust') }}" class="dropdown-item">تسوية أرصدة</a>
														<a href="{{ route('guid-item.index') }}" class="dropdown-item">بنود التوجية</a>
														<a href="{{ route('users.index') }}" class="dropdown-item">المستخدمين</a>
													</div>
												</li>
												@endif
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>الشركة </a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="{{ route('home.index') }}" class="dropdown-item">كشف الشركات</a>
														<a href="{{route('cash-purch.index')}}" class="dropdown-item">مدفوعات نقدية</a>
														<a href="{{route('cash-sale.index')}}" class="dropdown-item">مقبوضات نقدية</a>
														<a href="{{route('invoice-sale')}}" class="dropdown-item">مبيعات</a>
														<a href="{{route('invoice-cash')}}" class="dropdown-item">مشتريات</a>
														<a href="{{route('restrictions')}}" class="dropdown-item">قيود ألية</a>
													</div>
												</li>
												@if (Auth::user()->role_id == 100 || Auth::user()->role_id == 110)
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>الترصيد</a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="{{route('year-balance')}}" class="dropdown-item">ترصيد سنوي</a>
														<a href="{{route('month-balance')}}" class="dropdown-item">ترصيد شهري</a>
													</div>
												</li>
												@endif
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>  {{ __('titles.company_reports') }} </a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="#" class="dropdown-item">{{ __('titles.reports') }}</a>
														<a href="#" class="dropdown-item">تقرير بيانات المتعاملين</a>
														<a href="{{url('/Admin/Cash/Purchasing/Report/Create')}}" class="dropdown-item">تقرير المدفوعات النقدية</a>
														<a href="{{url('/Admin/Invoices/Purchasing/Report/Create')}}" class="dropdown-item">تقرير المشتريات</a>
														<a href="{{url('/Admin/Cash/Sales/Report/Create')}}" class="dropdown-item">تقرير المقبوضات النقدية</a>
														<a href="{{url('/Admin/Invoices/Sales/Report/Create')}}" class="dropdown-item">تقرير المبيعات</a>
														<a href="{{url('/Admin/Permissions/Receipt/Report/Create')}}" class="dropdown-item">تقرير إذونات إستلام النقدية</a>
														<a href="#" class="dropdown-item">إشعارات الخصم</a>
														<a href="{{url('/Admin/Permissions/Payment/Report/Create')}}" class="dropdown-item">تقرير أذونات صرف النقدية </a>
														<a href="{{url('/Admin/Cheques/Report/Create')}}" class="dropdown-item">تقرير أذونات صرف - استلام شيكات </a>
													</div>
												</li>
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>{{ __('titles.transactions_reports') }}</a>
													<div role="menu" class="dropdown-menu animated zoomIn">

														<a href="{{route('Admin-client-report.index')}}" class="dropdown-item">تقرير حركة العميل</a>
														<a href="{{route('Admin-supplier-report.index')}}" class="dropdown-item">تقرير حركة المورد</a>
														<a href="{{route('Admin-employee-report.index')}}" class="dropdown-item">تقرير حركة موظف</a>
														<a href="{{route('Admin-bank-report.index')}}" class="dropdown-item">تقرير حركة بنك</a>
														<a href="{{route('Admin-cashBox-report.index')}}" class="dropdown-item">تقرير حركة خزينة </a>
														<a href="{{route('Admin-item-report.index')}}" class="dropdown-item">تقرير حركات الأصناف</a>

														<a href="{{url('/Admin/Clients/Report/Create')}}" class="dropdown-item">تقرير أرصدة العملاء </a>
														<a href="{{url('/Admin/Suppliers/Report/Create')}}" class="dropdown-item">تقرير أرصدة الموردين </a>
														<a href="{{url('/Admin/Items/Report/Create')}}" class="dropdown-item">تقرير الأصناف </a>
													</div>
												</li>
												
												
												
											
											</ul>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
										<div class="header-right-info">
											<ul class="nav navbar-nav mai-top-nav header-right-menu">
												<li class="nav-item">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
														<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														<span class="admin-name">{{ Auth::user()->user_name }}</span>
														<img src="img/product/pro4.jpg" alt="" />
													</a>
													<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
														<li>
															<a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
														</li>
														<li>
															<a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
														</li>
														<li>
															<a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
														</li>
														<li>
															<a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
														</li>
														<li>
															<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                              document.getElementById('logout-form').submit();">
																<span class="edu-icon edu-settings author-log-ic"> Logout</span>
															</a>

															<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
																@csrf
															</form>
														</li>
													</ul>
												</li>

											</ul>
										</div>
									</div>



								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile Menu start -->
			<div class="mobile-menu-area">
				<div class="container">
					<div class="row" style="direction:rtl">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="mobile-menu">
								<nav id="dropdown">
									<ul class="mobile-menu-nav">

										<li>
											<a data-toggle="collapse" data-target="#Charts" href="#">بيانات أساسية <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul class="collapse dropdown-header-top">
												<li><a href="{{ route('work-role.index') }}" class="dropdown-item">قواعد العمل</a></li>
												<li><a href="{{ route('balance-adjust') }}" class="dropdown-item">تسوية أرصدة</a></li>
												<li><a href="{{ route('guid-item.index') }}" class="dropdown-item">بنود التوجية</a></li>
												<li><a href="{{ route('users.index') }}" class="dropdown-item">المستخدمين</a></li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#demoevent" href="#">الشركة<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="demoevent" class="collapse dropdown-header-top">
												<li><a href="{{ route('home.index') }}" class="dropdown-item">كشف الشركات</a></li>
												<li><a href="{{route('cash-purch.index')}}" class="dropdown-item">مدفوعات نقدية</a></li>
												<li><a href="{{route('cash-sale.index')}}" class="dropdown-item">مقبوضات نقدية</a></li>
												<li><a href="{{route('invoice-sale')}}" class="dropdown-item">مبيعات</a></li>
												<li><a href="{{route('invoice-cash')}}" class="dropdown-item">مشتريات</a></li>
												<li> <a href="{{route('restrictions')}}" class="dropdown-item">قيود ألية</a>
												</li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#demopro" href="#">الترصيد <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="demopro" class="collapse dropdown-header-top">
												<li><a href="{{route('year-balance')}}" class="dropdown-item">ترصيد سنوي</a></li>
												<li><a href="{{route('month-balance')}}" class="dropdown-item">ترصيد شهري</a></li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#democrou" href="#"> {{ __('titles.company_reports') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="democrou" class="collapse dropdown-header-top">

												<li><a href="{{url('/Admin/Cash/Purchasing/Report/Create')}}" class="dropdown-item">تقرير المدفوعات النقدية</a></li>
												<li><a href="{{url('/Admin/Invoices/Purchasing/Report/Create')}}" class="dropdown-item">تقرير المشتريات</a></li>
												<li><a href="{{url('/Admin/Invoices/Sales/Report/Create')}}" class="dropdown-item">تقرير المبيعات</a></li>
												<li><a href="{{url('/Admin/Cash/Sales/Report/Create')}}" class="dropdown-item">تقرير المقبوضات النقدية</a></li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#demolibra" href="#">{{ __('titles.transactions_reports') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="demolibra" class="collapse dropdown-header-top">
												<li><a href="{{route('Admin-client-report.index')}}" class="dropdown-item">تقرير حركة العميل</a></li>
												<li><a href="{{route('Admin-supplier-report.index')}}" class="dropdown-item">تقرير حركة المورد</a></li>
												<li><a href="{{route('Admin-employee-report.index')}}" class="dropdown-item">تقرير حركة موظف</a></li>
												<li><a href="{{route('Admin-bank-report.index')}}" class="dropdown-item">تقرير حركة بنك</a></li>
												<li><a href="{{route('Admin-cashBox-report.index')}}" class="dropdown-item">تقرير حركة خزينة </a></li>
												<li><a href="{{route('Admin-item-report.index')}}" class="dropdown-item">تقرير حركات الأصناف</a></li>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Mobile Menu end -->