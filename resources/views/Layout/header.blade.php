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
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>{{ __('titles.basic_data') }}</a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="{{ route('work-role.index') }}" class="dropdown-item">{{ __('titles.work_role') }}</a>
														<a href="{{ route('balance-adjust') }}" class="dropdown-item">{{ __('titles.balance_adjust') }}</a>
														<a href="{{ route('guid-item.index') }}" class="dropdown-item">{{ __('titles.guid_items') }}</a>
														<a href="{{ route('users.index') }}" class="dropdown-item">{{ __('titles.users') }}</a>
													</div>
												</li>
												@endif
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>{{ __('titles.company') }} </a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="{{ route('home.index') }}" class="dropdown-item">{{ __('titles.company_statement') }}</a>
														<a href="{{route('cash-purch.index')}}" class="dropdown-item">{{ __('titles.cash_payments') }}</a>
														<a href="{{route('cash-sale.index')}}" class="dropdown-item">{{ __('titles.cash_receipts') }}</a>
														<a href="{{route('invoice-sale')}}" class="dropdown-item">{{ __('titles.sale_bills') }}</a>
														<a href="{{route('invoice-cash')}}" class="dropdown-item">{{ __('titles.purchasing') }}</a>
														<a href="{{route('restrictions')}}" class="dropdown-item"> {{ __('titles.restrictions') }}</a>
													</div>
												</li>
												@if (Auth::user()->role_id == 100 || Auth::user()->role_id == 110)
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>{{ __('titles.Balancing') }}</a>
													<div role="menu" class="dropdown-menu animated zoomIn">
														<a href="{{route('year-balance')}}" class="dropdown-item">{{ __('titles.annual_balance') }}</a>
														<a href="{{route('month-balance')}}" class="dropdown-item">{{ __('titles.month_balance') }}</a>
													</div>
												</li>
												@endif
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>  {{ __('titles.company_reports') }} </a>
													<div role="menu" class="dropdown-menu animated zoomIn">
													
														<a href="#" class="dropdown-item">{{ __('titles.customer_data_report') }}</a>
														<a href="{{url('/Admin/Cash/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_payments_reports') }}</a>
														<a href="{{url('/Admin/Invoices/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.buy_report') }}</a>
														<a href="{{url('/Admin/Cash/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_receipts_reports') }}</a>
														<a href="{{url('/Admin/Invoices/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.sales_report') }}</a>
														<a href="{{url('/Admin/Permissions/Receipt/Report/Create')}}" class="dropdown-item"> {{ __('titles.Permission_receive_cash') }} </a>
														<a href="#" class="dropdown-item">{{ __('titles.discount_notices') }}</a>
														<a href="{{url('/Admin/Permissions/Payment/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_exchange_cash') }}</a>
														<a href="{{url('/Admin/Cheques/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_receive_cheques') }} </a>
													</div>
												</li>
												<li class="nav-item dropdown res-dis-nn">
													<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>{{ __('titles.transactions_reports') }}</a>
													<div role="menu" class="dropdown-menu animated zoomIn">

														<a href="{{route('Admin-client-report.index')}}" class="dropdown-item">{{ __('titles.client_transactions_reports') }}</a>
														<a href="{{route('Admin-supplier-report.index')}}" class="dropdown-item">{{ __('titles.supplier_transactions_reports') }}</a>
														<a href="{{route('Admin-employee-report.index')}}" class="dropdown-item">{{ __('titles.empolyee_transactions_reports') }}</a>
														<a href="{{route('Admin-bank-report.index')}}" class="dropdown-item">{{ __('titles.bank_transactions_reports') }}</a>
														<a href="{{route('Admin-cashBox-report.index')}}" class="dropdown-item">{{ __('titles.cashbox_transactions_reports') }} </a>
														<a href="{{route('Admin-item-report.index')}}" class="dropdown-item">{{ __('titles.items_transactions_reports') }}</a>

														<a href="{{url('/Admin/Clients/Report/Create')}}" class="dropdown-item">{{ __('titles.customer_balances_reports') }} </a>
														<a href="{{url('/Admin/Suppliers/Report/Create')}}" class="dropdown-item">{{ __('titles.supplier_balances_reports') }} </a>
														<a href="{{url('/Admin/Items/Report/Create')}}" class="dropdown-item">{{ __('titles.items_reports') }}</a>
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
											<a data-toggle="collapse" data-target="#Charts" href="#">{{ __('titles.basic_data') }}<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul class="collapse dropdown-header-top">
												<li><a href="{{ route('work-role.index') }}" class="dropdown-item">{{ __('titles.work_role') }}</a></li>
												<li><a href="{{ route('balance-adjust') }}" class="dropdown-item">{{ __('titles.balance_adjust') }}</a></li>
												<li><a href="{{ route('guid-item.index') }}" class="dropdown-item">{{ __('titles.guid_items') }}</a></li>
												<li><a href="{{ route('users.index') }}" class="dropdown-item">{{ __('titles.users') }}</a></li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#demoevent" href="#">{{ __('titles.company') }}<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="demoevent" class="collapse dropdown-header-top">
												<li><a href="{{ route('home.index') }}" class="dropdown-item">{{ __('titles.company_statement') }}</a></li>
												<li><a href="{{route('cash-purch.index')}}" class="dropdown-item">{{ __('titles.cash_payments') }}</a></li>
												<li><a href="{{route('cash-sale.index')}}" class="dropdown-item">{{ __('titles.cash_receipts') }}</a></li>
												<li><a href="{{route('invoice-sale')}}" class="dropdown-item">{{ __('titles.sale_bills') }}</a></li>
												<li><a href="{{route('invoice-cash')}}" class="dropdown-item">{{ __('titles.purchasing') }}</a></li>
												<li> <a href="{{route('restrictions')}}" class="dropdown-item">{{ __('titles.restrictions') }}</a>
												</li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#demopro" href="#">{{ __('titles.Balancing') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="demopro" class="collapse dropdown-header-top">
												<li><a href="{{route('year-balance')}}" class="dropdown-item">{{ __('titles.annual_balance') }}</a></li>
												<li><a href="{{route('month-balance')}}" class="dropdown-item">{{ __('titles.month_balance') }}</a></li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#democrou" href="#"> {{ __('titles.company_reports') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="democrou" class="collapse dropdown-header-top">

												<li><a href="{{url('/Admin/Cash/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_payments_reports') }}</a></li>
												<li><a href="{{url('/Admin/Invoices/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.buy_report') }}</a></li>
												<li><a href="{{url('/Admin/Invoices/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.sales_report') }}</a></li>
												<li><a href="{{url('/Admin/Cash/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_receipts_reports') }}</a></li>
											</ul>
										</li>
										<li>
											<a data-toggle="collapse" data-target="#demolibra" href="#">{{ __('titles.transactions_reports') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
											<ul id="demolibra" class="collapse dropdown-header-top">
												<li><a href="{{route('Admin-client-report.index')}}" class="dropdown-item">{{ __('titles.client_transactions_reports') }}</a></li>
												<li><a href="{{route('Admin-supplier-report.index')}}" class="dropdown-item">{{ __('titles.supplier_transactions_reports') }}</a></li>
												<li><a href="{{route('Admin-employee-report.index')}}" class="dropdown-item">{{ __('titles.empolyee_transactions_reports') }}</a></li>
												<li><a href="{{route('Admin-bank-report.index')}}" class="dropdown-item">{{ __('titles.bank_transactions_reports') }}</a></li>
												<li><a href="{{route('Admin-cashBox-report.index')}}" class="dropdown-item">{{ __('titles.cashbox_transactions_reports') }} </a></li>
												<li><a href="{{route('Admin-item-report.index')}}" class="dropdown-item">{{ __('titles.items_transactions_reports') }}</a></li>
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