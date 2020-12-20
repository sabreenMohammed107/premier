    {{-- @php
        $company_id = session('company_id');
    @endphp --}}
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
    	<nav id="sidebar" class="">
    		<div class="sidebar-header">
    			<a href="index.html"><img class="main-logo" src="{{ asset('webassets/img/logo/logo.png')}}" alt="" /></a>
    			<strong><a href="index.html"><img src="" alt="" /></a></strong>
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
											<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span> {{ __('titles.basic_data') }} </a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													<a href="{{ url("/Company") }}" class="dropdown-item"> {{ __('titles.company_details') }}</a>
    													<!-- <a href="#" class="dropdown-item">إضافة خزنة</a>
												<a href="#" class="dropdown-item">إضافة بنك</a> -->
    												</div>
												</li>
												
												@if (Auth::user()->role_id == 103)
    											<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span> {{ __('titles.company') }} </a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													{{-- <a href="{{ url("/Company") }}" class="dropdown-item">{{ __('titles.company_details') }}</a> --}}
    													<a href="{{ url("/Company/Items")}}" class="dropdown-item">{{ __('titles.items_statment') }}</a>
    													<a href="{{ url("/Company/Clients")}}" class="dropdown-item">{{ __('titles.client_statment') }}</a>
    													<a href="{{ url("/Company/Suppliers")}}" class="dropdown-item">{{ __('titles.supplier_statment') }} </a>
    													<a href="{{ url("/Company/Employees")}}" class="dropdown-item">{{ __('titles.employee_statment') }}</a>
    												</div>
    											</li>
    											@endif
												@if (Auth::user()->role_id == 102 || Auth::user()->role_id == 104)
    											<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>  {{ __('titles.cash_box') }} </a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													<a href="{{url('/Cash/Purchasing')}}" class="dropdown-item">  {{ __('titles.cash_payments') }}</a>
    													<a href="{{url('/Cash/Sales')}}" class="dropdown-item"> {{ __('titles.cash_receipts') }}</a>
    												</div>
    											</li>
												@endif
												@if (Auth::user()->role_id == 103 || Auth::user()->role_id == 104)
    											<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span> {{ __('titles.bills') }} </a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													<a href="{{url('Invoices/Purchasing')}}" class="dropdown-item"> {{ __('titles.purchasing') }}</a>
    													<a href="{{url('Invoices/Sales')}}" class="dropdown-item"> {{ __('titles.sale_bills') }} </a>
    												</div>
    											</li>
    											@endif

												@if (Auth::user()->role_id == 102)
    											<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>  {{ __('titles.cheques') }} </a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													<a href="{{url('/Cheques')}}" class="dropdown-item">{{ __('titles.transfer_cheques') }}</a>

    												</div>
    											</li>
    											@endif
    											
												<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span> {{ __('titles.company_reports') }} </a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													@if(Auth::user()->role_id == 104)
    													<a href="#" class="dropdown-item">{{ __('titles.company_statement') }}</a>
    													<a href="#" class="dropdown-item">{{ __('titles.customer_data_report') }}</a>
    													@elseif (Auth::user()->role_id == 102)
    													<a href="#" class="dropdown-item">{{ __('titles.company_statement') }}</a>
    													@elseif(Auth::user()->role_id == 103)
    													<a href="#" class="dropdown-item">{{ __('titles.customer_data_report') }}</a>
    													@endif
    													@if (Auth::user()->role_id == 103 || Auth::user()->role_id == 104)
    													<a href="{{url('/Invoices/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.buy_report') }}</a>
    													<a href="{{url('/Invoices/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.sales_report') }} </a>
    													<a href="#" class="dropdown-item">{{ __('titles.discount_notices') }}</a>
    													@endif
    													@if (Auth::user()->role_id == 102 || Auth::user()->role_id == 104)
    													<a href="{{url('/Cash/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_receipts_reports') }}</a>
    													<a href="{{url('/Cash/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_payments_reports') }} </a>
    													<a href="{{url('/Permissions/Receipt/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_receive_cash') }} </a>
    													<a href="{{url('/Permissions/Payment/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_exchange_cash') }} </a>
    													<a href="{{url('/Cheques/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_receive_cheques') }}</a>
    													<a href="#" class="dropdown-item">{{ __('titles.vat_value_report') }}</a>
    													@endif
    													<a href="#" class="dropdown-item">{{ __('titles.budget_reports') }}</a>
    													<a href="#" class="dropdown-item">{{ __('titles.income_list_report') }} </a>
    													<a href="{{url('/Clients/Report/Create')}}" class="dropdown-item">{{ __('titles.customer_balances_reports') }} </a>
    													<a href="{{url('/Suppliers/Report/Create')}}" class="dropdown-item">{{ __('titles.supplier_balances_reports') }} </a>
    													<a href="{{url('/Items/Report/Create')}}" class="dropdown-item">{{ __('titles.items_reports') }} </a>

    												</div>
    											</li>
    										








    											<li class="nav-item dropdown res-dis-nn">
    												<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span>{{ __('titles.transactions_reports') }}</a>
    												<div role="menu" class="dropdown-menu animated zoomIn">
    													@if (Auth::user()->role_id == 102 || Auth::user()->role_id == 104)
    													<a href="{{route('Company-bank-report.index')}}" class="dropdown-item">{{ __('titles.bank_transactions_reports') }}</a>
    													<a href="{{route('Company-cashBox-report.index')}}" class="dropdown-item">{{ __('titles.cashbox_transactions_reports') }} </a>
    													@endif
    													@if (Auth::user()->role_id == 103 || Auth::user()->role_id == 104)
    													<a href="{{route('Company-client-report.index')}}" class="dropdown-item">{{ __('titles.client_transactions_reports') }}</a>
    													<a href="{{route('Company-supplier-report.index')}}" class="dropdown-item">{{ __('titles.supplier_transactions_reports') }}</a>
    													<a href="{{route('Company-employee-report.index')}}" class="dropdown-item">{{ __('titles.empolyee_transactions_reports') }}</a>
    													<a href="{{route('Company-item-report.index')}}" class="dropdown-item">{{ __('titles.items_transactions_reports') }}</a>
    													@endif
    													{{-- <a href="#" class="dropdown-item">تقرير بيانات المتعاملين</a> --}}

    													<!-- <a href="#" class="dropdown-item"> تقرير المقبوضات النقدية </a>
												<a href="#" class="dropdown-item">تقرير المدفوعات النقدية  </a>
                                                <a href="#" class="dropdown-item">تقرير أذونات استيلام النقدية  </a>
                                                <a href="#" class="dropdown-item">تقرير إذن صرف نقدية   </a>
												<a href="#" class="dropdown-item">تقرير أذونات صرف  - استلام شيكات   </a>
                                                <a href="#" class="dropdown-item">تقرير الضريبة على القيمه المضافة </a>
                                                    <a href="#" class="dropdown-item"> إشعارات الخصم</a> -->

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
    										<a data-toggle="collapse" data-target="#Charts" href="#"> {{ __('titles.basic_data') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul class="collapse dropdown-header-top">
    											<li><a href="{{ url("/Company") }}" class="dropdown-item">{{ __('titles.company_details') }}</a></li>
    											<!--<li><a href="#" class="dropdown-item">إضافة خزنة</a></li>
												<li><a href="#" class="dropdown-item">إضافة بنك</a></li>-->
    										</ul>
    									</li>
    									<li>
    										<a data-toggle="collapse" data-target="#demoevent" href="#">{{ __('titles.company') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul id="demoevent" class="collapse dropdown-header-top">
    											<li><a href="{{ url("/Company/Items")}}" class="dropdown-item">{{ __('titles.items_statment') }}</a></li>
    											<li><a href="{{ url("/Company/Clients")}}" class="dropdown-item">{{ __('titles.client_statment') }}</a></li>
    											<li><a href="{{ url("/Company/Suppliers")}}" class="dropdown-item">{{ __('titles.supplier_statment') }}</a></li>
    											<li><a href="{{ url("/Company/Employees")}}" class="dropdown-item">{{ __('titles.employee_statment') }}</a></li>
    											<!-- <li><a href="#" class="dropdown-item">مشتريات</a></li>
												<li><a href="#" class="dropdown-item">قيود ألية</a></li> -->
    										</ul>
    									</li>
    									<li>
    										<a data-toggle="collapse" data-target="#demopro" href="#">{{ __('titles.cash_box') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul id="demopro" class="collapse dropdown-header-top">
    											<li><a href="{{url('/Cash/Purchasing')}}" class="dropdown-item"> {{ __('titles.cash_receipts') }}</a></li>
    											<li><a href="{{url('/Cash/Sales')}}" class="dropdown-item">{{ __('titles.cash_payments') }}</a></li>
    										</ul>
    									</li>
    									<li>
    										<a data-toggle="collapse" data-target="#demopro" href="#">{{ __('titles.bills') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul id="demopro" class="collapse dropdown-header-top">
    											<li><a href="{{url('/Invoices/Purchasing')}}" class="dropdown-item"> {{ __('titles.purchasing') }}</a></li>
    											<li><a href="{{url('/Invoices/Sales')}}" class="dropdown-item"> {{ __('titles.sale_bills') }} </a></li>
    										</ul>
    									</li>
    									<li>
    										<a data-toggle="collapse" data-target="#demopro" href="#">{{ __('titles.cheques') }} <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul id="demopro" class="collapse dropdown-header-top">
    											<li><a href="{{url('/Cheques')}}" class="dropdown-item">{{ __('titles.transfer_cheques') }}</a></li>
    										</ul>
    									</li>
    									<li>
    										<a data-toggle="collapse" data-target="#democrou" href="#">{{ __('titles.company_reports') }}<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul id="democrou" class="collapse dropdown-header-top">
    											<<<<<<< HEAD @if(Auth::user()->role_id == 104)
    												<li><a href="#" class="dropdown-item">{{ __('titles.company_statement') }}</a></li>
    												<li><a href="#" class="dropdown-item">{{ __('titles.customer_data_report') }}</a></li>
    												@elseif (Auth::user()->role_id == 102)
    												<li><a href="#" class="dropdown-item">{{ __('titles.company_statement') }}</a></li>
    												@elseif(Auth::user()->role_id == 103)
    												<li><a href="#" class="dropdown-item">{{ __('titles.customer_data_report') }}</a></li>
    												@endif
    												@if (Auth::user()->role_id == 103 || Auth::user()->role_id == 104)
    												<li><a href="{{url('/Invoices/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.buy_report') }} </a></li>
    												<li><a href="{{url('/Invoices/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.sales_report') }} </a></li>
    												<li><a href="#" class="dropdown-item">{{ __('titles.discount_notices') }} </a></li>
    												@endif
    												@if (Auth::user()->role_id == 102 || Auth::user()->role_id == 104)
    												<li><a href="{{url('/Cash/Purchasing/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_payments_reports') }} </a></li>
    												<li><a href="{{url('/Cash/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_receipts_reports') }}  </a></li>
    												<li><a href="{{url('/Permissions/Receipt/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_receive_cash') }} </a></li>

    				
    												<li><a href="{{url('/Cash/Sales/Report/Create')}}" class="dropdown-item">{{ __('titles.cash_receipts_reports') }} </a></li>

    												<li><a href="{{url('/Permissions/Receipt/Report/Create')}}" class="dropdown-item"> {{ __('titles.Permission_receive_cash') }}</a></li>

    												<li><a href="{{url('/Permissions/Payment/Report/Create')}}" class="dropdown-item">{{ __('titles.Permission_exchange_cash') }}  </a></li>
    												<li><a href="{{url('/Cheques/Report/Create')}}" class="dropdown-item"> {{ __('titles.Permission_receive_cheques') }} </a></li>
    												<li><a href="#" class="dropdown-item">{{ __('titles.vat_value_report') }}</a></li>
    												@endif
    												<li><a href="#" class="dropdown-item">{{ __('titles.budget_reports') }}  </a></li>
    												<li><a href="#" class="dropdown-item">{{ __('titles.income_list_report') }} </a></li>
    												<li><a href="{{url('/Clients/Report/Create')}}" class="dropdown-item">{{ __('titles.customer_balances_reports') }} </a></li>
    												<li><a href="{{url('/Suppliers/Report/Create')}}" class="dropdown-item">{{ __('titles.supplier_balances_reports') }} </a></li>
    												<li><a href="{{url('/Items/Report/Create')}}" class="dropdown-item">{{ __('titles.items_reports') }} </a></li>
    										</ul>
    									</li>
    									<li>




    										<a data-toggle="collapse" data-target="#demolibra" href="#">{{ __('titles.transactions_reports') }}<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    										<ul id="demolibra" class="collapse dropdown-header-top">
    											@if (Auth::user()->role_id == 102 || Auth::user()->role_id == 104)
    											<li><a href="{{route('Company-bank-report.index')}}" class="dropdown-item">{{ __('titles.bank_transactions_reports') }}</a></li>
    											<li><a href="{{route('Company-cashBox-report.index')}}" class="dropdown-item">{{ __('titles.cashbox_transactions_reports') }} </a></li>
    											@endif
    											@if (Auth::user()->role_id == 103 || Auth::user()->role_id == 104)
    											<li><a href="{{route('Admin-client-report.index')}}" class="dropdown-item">{{ __('titles.client_transactions_reports') }} </a></li>
    											<li><a href="{{route('Company-supplier-report.index')}}" class="dropdown-item">{{ __('titles.supplier_transactions_reports') }}</a></li>
    											<li><a href="{{route('Company-employee-report.index')}}" class="dropdown-item">{{ __('titles.empolyee_transactions_reports') }}</a></li>
    											<li><a href="{{route('Company-item-report.index')}}" class="dropdown-item">{{ __('titles.items_transactions_reports') }}</a></li>
    											@endif


    										



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