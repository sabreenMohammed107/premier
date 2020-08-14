@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> بيانات الشركة</span>
    </li>
</ul>

@endsection

@section('content')
         	<!-- Start Left menu area -->
	<div class="left-sidebar-pro">
		<nav id="sidebar" class="">
			<div class="sidebar-header">
				<a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
				<strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
			</div>
		</nav>
	</div>
	<!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">

        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
							<ul id="myTabedu1" class="tab-review-design" style="direction:rtl">
								<li class="active"><a href="#description">الموظفين</a></li>
								<li><a href="#reviews"> الموردين</a></li>
								<li><a href="#INFORMATION">العملاء</a></li>
							</ul>
							<div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
								<div class="product-tab-list tab-pane fade active in" id="description">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="review-content-section">
												<div class="chat-discussion" style="height: auto">
													{{-- Employees card --}}
                                                    @foreach ($Employees as $Employee)
                                                    {{-- Employee card --}}
													<div class="chat-message">
														<div class="profile-hdtc">
															<img class="message-avatar" src="img/contact/1.jpg" alt="">
														</div>
														<div class="message">
															<span class="message-date"><b>{{$Employee->person_name}}</b></span>
															<div class="message-content" style="text-align:right">
																<div class="row">
																	<div class="col-lg-6">
																		<p><b>الهاتف : </b>02 2215 321</p>
																		<p><b>موبايل : </b>010 215 321</p>
																		<p><b>تاريخ التعيين : </b>01-01-2020</p>
																		<p><b>الحالة الإجتماعية : </b>أعزب</p>
																	</div>
																	<div class="col-lg-5">
																		<p><b>الرقم التأميني : </b> 805</p>
																		<p><b>الوظيفة : </b> محاسب</p>
																		<p><b>الكود : </b>2215</p>
																		<p><b>الحالة : </b>مفعل</p>
																	</div>

																	<div class="col-lg-1"></div>
																</div>
															</div>
															<div class="m-t-md mg-t-10">
																<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp1"><i class="fa fa-eye"></i> عـرض </a>
															</div>
														</div>
													</div>
													@endforeach
												</div>
											</div>
										</div>
										<div class="custom-pagination">
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link" href="#">التالي</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">السابق</a></li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
								<div class="product-tab-list tab-pane fade" id="reviews">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="review-content-section">
												<div class="chat-discussion" style="height: auto">
													@foreach ($Suppliers as $Supplier)
														{{-- Supplier Card --}}
													<div class="chat-message">
														<div class="profile-hdtc">
															<img class="message-avatar" src="img/contact/02.jpg" alt="">
														</div>
														<div class="message">
															<span class="message-date mg-b-15"><b>{{$Supplier->contact_person_name}}</b></span><br />
															<div class="message-content" style="text-align:right">
																<div class="row">
																	<div class="col-lg-6">
																		<p><b>رصيد الخزينة : </b>5000</p>
																		<p><b>الهاتف : </b>02 2215 321</p>
																		<p><b>موبايل : </b>010 215 321</p>
																	</div>
																	<div class="col-lg-5">
																		<p><b>رقم التسجيل : </b> 805</p>
																		<p><b>الكود : </b>2215</p>
																		<p><b>الحالة : </b>مفعل</p>
																	</div>

																	<div class="col-lg-1"></div>
																</div>
															</div>
															<div class="m-t-md mg-t-10">
																<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Sup2"><i class="fa fa-eye"></i> عـرض </a>
															</div>
														</div>
													</div>
													@endforeach
												</div>
											</div>
										</div>
										<div class="custom-pagination">
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link" href="#">التالي</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">السابق</a></li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
								<div class="product-tab-list tab-pane fade" id="INFORMATION">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                    {{-- Clients cards --}}
                                                    @foreach ($Clients as $Client)
                                                    {{-- Client card --}}
                                                    <div class="chat-message">
														<div class="profile-hdtc">
															<img class="message-avatar" src="img/contact/02.jpg" alt="">
														</div>
														<div class="message">
															<span class="message-date mg-b-15"><b>{{$Client->contact_person_name}}</b></span><br />
															<div class="message-content" style="text-align:right">
																<div class="row">
																	<div class="col-lg-6">
																		<p><b>رصيد الخزينة : </b>5000</p>
																		<p><b>الهاتف : </b>02 2215 321</p>
																		<p><b>موبايل : </b>010 215 321</p>
																	</div>
																	<div class="col-lg-5">
																		<p><b>رقم التسجيل : </b> 805</p>
																		<p><b>الكود : </b>2215</p>
																		<p><b>الحالة : </b>مفعل</p>
																	</div>

																	<div class="col-lg-1"></div>
																</div>
															</div>
															<div class="m-t-md mg-t-10">
																<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Cus1"><i class="fa fa-eye"></i> عـرض </a>
															</div>
														</div>
													</div>
                                                    @endforeach

												</div>
											</div>
										</div>
										<div class="custom-pagination">
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link" href="#">التالي</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">السابق</a></li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="profile-info-inner">
							<div class="profile-img">
								<img src="{{ asset("/companies/$Company->company_logo") }}" alt="" />
							</div>
							<div class="profile-details-hr"style="direction:rtl;">
								<div class="row mg-b-15">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="skill-title">
                                                <a href="{{ url("/Company/$Company->id/edit")}}" class="btn btn-primary waves-effect waves-light mg-b-15" style="display: block;">تعديل بيانات الشركة</a>
                                                    <h2>
                                                        البيانات الأساسية
                                                    </h2>

													<hr />
												</div>
											</div>
										</div>
										<div class="ex-pro">
											<ul>
												<li><i class="fa fa-angle-left"></i> <b>إسم الشركة:</b>{{$Company->company_official_name}}</li>
                                            <li><i class="fa fa-angle-left"></i> <b>رقم التسجيل:</b>{{$Company->registeration_no}}</li>
												<li><i class="fa fa-angle-left"></i> <b>رئيس مجلس الاداره:</b> {{$Company->chairman_person_name}}</li>
												<li><i class="fa fa-angle-left"></i> <b>الكيان القانونى:</b> {{$Company->legal_entity}}</li>
												<li><i class="fa fa-angle-left"></i> <b>رأس المال: </b>500000 </li>
                                                <li><i class="fa fa-angle-left"></i> <b>الخزينة: </b>
                                                    @isset($Safe)
                                                        {{$Safe->safe_name}}
                                                    @endisset
                                                </li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row mg-b-15">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="skill-title">
													<h2>البيانات الضريبية</h2>
													<hr />
												</div>
											</div>
										</div>
										<div class="ex-pro">
											<ul>
												<li><i class="fa fa-angle-left"></i> <b>خاضعه لضريبة القيمة المضافة:</b>&nbsp;{{ $Company->taxable ? 'نعم' : 'لا' }}</li>
												<li><i class="fa fa-angle-left"></i> <b>مأموريه الضرائب:</b> الاستثمار</li>
												<li><i class="fa fa-angle-left"></i> <b>مأموريه الضرائب:</b> العمرانية</li>
												<li><i class="fa fa-angle-left"></i> <b>رقم الملف الضريبى:</b> {{$Company->tax_card}}</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row mg-b-15">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="skill-title">
													<h2>بيانات الإتصال</h2>
													<hr />
												</div>
											</div>
										</div>
										<div class="ex-pro">
											<ul>
                                            <li><i class="fa fa-angle-left"></i> <b>البريد الالكترونى:</b> {{$Company->email}}</li>
												<li><i class="fa fa-angle-left"></i> <b>موقع الكترونى:</b> {{$Company->website}}</li>
												<li><i class="fa fa-angle-left"></i> <b>موبايل التواصل:</b> {{$Company->contact_person_mobile}}</li>
												<li><i class="fa fa-angle-left"></i> <b>شخص للتواصل:</b>{{$Company->contact_person_name}}</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="row mg-b-15">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="skill-title">
													<h2>بيانات الخزينة</h2>
													<hr />
												</div>
											</div>
										</div>
										<div class="ex-pro">
                                            @if ($Safe)
                                            <ul>
												<li><i class="fa fa-angle-left"></i> <b>الرصيد الافتتاحي:</b> 200000</li>
												<li><i class="fa fa-angle-left"></i> <b>تاريخ بداية الترصيد:</b> 01-01-2020</li>
												<li><i class="fa fa-angle-left"></i> <b>رصيدالخزينه الحالى:</b> 500000</li>
											</ul>
                                            @else
                                            لم يتم تسجيل خزينه
                                            @endif

										</div>
									</div>
								</div>
								<div class="row mg-b-15">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-12">
												<div class="skill-title">
													<h2>بيانات البنك</h2>
													<hr />
												</div>
											</div>
										</div>
										<div class="ex-pro">
                                            @if ($Bank)
                                               <ul>
                                                    <li><i class="fa fa-angle-left"></i> <b>الرصيد الافتتاحي:</b> 200000</li>
                                                    <li><i class="fa fa-angle-left"></i> <b>تاريخ بداية الترصيد:</b> 01-01-2020</li>
                                                    <li><i class="fa fa-angle-left"></i> <b>رصيدالبنك الحالى:</b> 500000</li>
											    </ul>
                                            @else
                                                لم يتم تسجيل بنك
                                            @endif

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

                </div>
            </div>
        </div>

@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
