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
<input type="hidden" id="compId" value="{{$Company->id}}">
         	<!-- Start Left menu area -->
	<div class="left-sidebar-pro">
		<nav id="sidebar" class="">
			{{-- <div class="sidebar-header">
				<a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
				<strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
			</div> --}}
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

                                <li
                                @if(!request()->clients_page && !request()->suppliers_page && !request()->employees_page)
                                class="active"
                                @endif
                                @isset(request()->employees_page)
                                class="active"
                                @endisset
                                ><a href="#description">الموظفين</a></li>
                                <li
                                @isset(request()->suppliers_page)
                                class="active"
                                @endisset
                                ><a href="#reviews"> الموردين</a></li>
                                <li
                                @isset(request()->clients_page)
                                class="active"
                                @endisset
                                ><a href="#INFORMATION">العملاء</a></li>
							</ul>
							<div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade
                                @if(!request()->clients_page && !request()->suppliers_page && !request()->employees_page)
                                active in
                                @endif
                                @isset(request()->employees_page)
                                active in
                                @endisset
                                " id="description">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" oninput="searchEmp(this.value)" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
									<div class="row">
                                        @if ($EmpCount > 0)
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="review-content-section">
												<div class="chat-discussion" id="employee" style="height: auto">
													{{-- Employees card --}}

                                                    @foreach ($Employees as $Employee)
                                                    {{-- Employee card --}}
													<div class="chat-message">
														<div class="profile-hdtc">
															<img class="message-avatar" src="{{asset("/uploads/person/$Employee->person_logo")}}" alt="">
														</div>
														<div class="message">
															<span class="message-date"><b>{{$Employee->person_name}}</b></span>
															<div class="message-content" style="text-align:right">
																<div class="row">
																	<div class="col-lg-6">
                                                                    <p><b>الهاتف : </b>{{$Employee->phone1}}</p>
																		<p><b>موبايل : </b>{{$Employee->phone2}}</p>
																		<p><b>رصيد الخزينة : </b>{{$Employee->total}}</p>

                                                                        {{-- <p><b>تاريخ التعيين : </b>01-01-2020</p>
																		<p><b>الحالة الإجتماعية : </b>أعزب</p> --}}
																	</div>
																	<div class="col-lg-5">
																		<p><b>الرقم التأميني : </b> {{$Employee->registeration_no}}</p>
																		<p><b>الوظيفة : </b> محاسب</p>
																		<p><b>الكود : </b>{{$Employee->id}}</p>
                                                                        <p><b>الحالة : </b>
                                                                        @if($Employee->active == 1)
                                                                        مفعل
                                                                        @else
                                                                        غير مفعل
                                                                        @endif
                                                                        </p>
																	</div>

																	<div class="col-lg-1"></div>
																</div>
															</div>
															<div class="m-t-md mg-t-10">
                                                            <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp{{$Employee->id}}"><i class="fa fa-eye"></i> عـرض </a>
															</div>
														</div>
													</div>
													@endforeach
												</div>
											</div>
                                        </div>
                                        {{$Employees->links()}}
                                        @endif
										{{-- <div class="custom-pagination">
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link" href="#">التالي</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">السابق</a></li>
												</ul>
											</nav>
										</div> --}}
									</div>
								</div>
                                <div class="product-tab-list tab-pane fade
                                @isset(request()->suppliers_page)
                                active in
                                @endisset
                                " id="reviews">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" oninput="searchSup(this.value)" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="review-content-section">
												<div class="chat-discussion" id="supplier" style="height: auto">
                                                    @foreach ($Suppliers as $Supplier)
														{{-- Supplier Card --}}
													<div class="chat-message">
														<div class="profile-hdtc">
															<img class="message-avatar" src="{{asset("/uploads/person/$Supplier->person_logo")}}" alt="">
														</div>
														<div class="message">
															<span class="message-date mg-b-15"><b>{{$Supplier->person_name}}</b></span><br />
															<div class="message-content" style="text-align:right">
																<div class="row">
																	<div class="col-lg-6">
																		<p><b>رصيد المورد : </b>{{$Supplier->total}}</p>
                                                                    <p><b>الهاتف : </b>{{$Supplier->phone1}}</p>
																		<p><b>موبايل : </b>{{$Supplier->phone2}}</p>
																	</div>
																	<div class="col-lg-5">
																		<p><b>رقم التسجيل : </b> {{$Supplier->registeration_no}}</p>
																		<p><b>الكود : </b>{{$Supplier->id}}</p>
                                                                        <p><b>الحالة : </b>
                                                                            @if($Supplier->active == 1)
                                                                            مفعل
                                                                            @else
                                                                            غير مفعل
                                                                            @endif
                                                                        </p>
																	</div>

																	<div class="col-lg-1"></div>
																</div>
															</div>
															<div class="m-t-md mg-t-10">
																<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Sup{{$Supplier->id}}"><i class="fa fa-eye"></i> عـرض </a>
															</div>
														</div>
													</div>
													@endforeach
												</div>
											</div>
                                        </div>
                                        {{$Suppliers->links()}}
										{{-- <div class="custom-pagination">
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link" href="#">التالي</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">السابق</a></li>
												</ul>
											</nav>
										</div> --}}
									</div>
								</div>
                                <div class="product-tab-list tab-pane fade
                                @isset(request()->clients_page)
                                active in
                                @endisset
                                " id="INFORMATION">
									<div class="breadcome-heading">
										<form role="search" class="sr-input-func">
											<input type="text" oninput="searchClient(this.value)" placeholder="...إبحث هنا" class="search-int form-control" style="text-align:right">
											<a href="#"><i class="fa fa-search"></i></a>
										</form>
									</div>
									<div class="row">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="review-content-section">
                                                <div class="chat-discussion" id="client" style="height: auto">
                                                    {{-- Clients cards --}}
                                                    @foreach ($Clients as $Client)
                                                    {{-- Client card --}}
                                                    <div class="chat-message">
														<div class="profile-hdtc">
															<img class="message-avatar" src="{{asset("/uploads/person/$Client->person_logo")}}" alt="">
														</div>
														<div class="message">
															<span class="message-date mg-b-15"><b>{{$Client->person_name}}</b></span><br />
															<div class="message-content" style="text-align:right">
																<div class="row">
																	<div class="col-lg-6">
																		<p><b>رصيد الخزينة : </b>5000</p>
																		<p><b>الهاتف : </b>{{$Client->phone1}}</p>
																		<p><b>موبايل : </b>{{$Client->phone2}}</p>
																	</div>
																	<div class="col-lg-5">
																		<p><b>رقم التسجيل : </b> {{$Client->registeration_no}}</p>
																		<p><b>الكود : </b>{{$Client->id}}</p>
                                                                        <p><b>الحالة : </b>
                                                                            @if($Client->active == 1)
                                                                            مفعل
                                                                            @else
                                                                            غير مفعل
                                                                            @endif
                                                                        </p>
																	</div>

																	<div class="col-lg-1"></div>
																</div>
															</div>
															<div class="m-t-md mg-t-10">
                                                            <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Cus{{$Client->id}}"><i class="fa fa-eye"></i> عـرض </a>
															</div>
														</div>
													</div>
                                                    @endforeach

												</div>
											</div>
                                        </div>
                                        {{$Clients->links()}}
										{{-- <div class="custom-pagination">
											<nav aria-label="Page navigation example">
												<ul class="pagination">
													<li class="page-item"><a class="page-link" href="#">التالي</a></li>
													<li class="page-item"><a class="page-link" href="#">3</a></li>
													<li class="page-item"><a class="page-link" href="#">2</a></li>
													<li class="page-item"><a class="page-link" href="#">1</a></li>
													<li class="page-item"><a class="page-link" href="#">السابق</a></li>
												</ul>
											</nav>
										</div> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="profile-info-inner">
							<div class="profile-img">
								<img src="{{ asset("/uploads/companies/$Company->company_logo") }}" alt="" />
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
												<li><i class="fa fa-angle-left"></i> <b>رأس المال: </b>{{$Company->equity_capital}} </li>
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
												<li><i class="fa fa-angle-left"></i> <b>مأموريه الضرائب:</b> {{$Company->tax_authority}}</li>
												{{-- <li><i class="fa fa-angle-left"></i> <b>مأموريه الضرائب:</b> العمرانية</li> --}}
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
												<li><i class="fa fa-angle-left"></i> <b>الرصيد الافتتاحي:</b> {{$Safe->open_balance}}</li>
												<li><i class="fa fa-angle-left"></i> <b>تاريخ بداية الترصيد:</b> {{$Safe->balance_start_date}}</li>
												<li><i class="fa fa-angle-left"></i> <b>رصيدالخزينه الحالى:</b> {{$SafeTotal}}</li>
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
                                                    <li><i class="fa fa-angle-left"></i> <b>الرصيد الافتتاحي:</b> {{$Bank->open_balance}}</li>
                                                    <li><i class="fa fa-angle-left"></i> <b>تاريخ بداية الترصيد:</b> {{$Bank->balance_start_date}}</li>
                                                    <li><i class="fa fa-angle-left"></i> <b>رصيدالبنك الحالى:</b> {{$BankTotal}}</li>
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
@if ($EmpCount > 0)
@foreach ($Employees as $EmployeeModal)
<div id="Emp{{$EmployeeModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title"style="text-align:right">عرض بيانات الموظف</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="message-avatar" src="img/contact/1.jpg" alt="">
                <h2>{{$EmployeeModal->person_name}}</h2>
                <h4>محاسب قانوني</h4>
                <br />
                <div class="message-content" style="text-align:right">
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>رصيد المورد : </b>{{$EmployeeModal->total}}</p>
                            <p><b>الهاتف : </b>{{$EmployeeModal->phone1}}</p>
                            <p><b>موبايل : </b>{{$EmployeeModal->phone2}}</p>
                            {{-- <p><b>تاريخ التعيين : </b>01-01-2020</p>
                            <p><b>الحالة الإجتماعية : </b>أعزب</p> --}}
                        </div>
                        <div class="col-lg-5">
                            <p><b>الرقم التأميني : </b> {{$EmployeeModal->registeration_no}}</p>
                            <p><b>الكود : </b>{{$EmployeeModal->id}}</p>
                            <p><b>الحالة : </b>
                            @if($EmployeeModal->active == 1)
                            مفعل
                            @else
                            غير مفعل
                            @endif
                            </p>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

@foreach ($Suppliers as $SupplierModal)
<div id="Sup{{$SupplierModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">عرض بيانات المورد</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                <h2>{{$SupplierModal->person_name}}</h2>
                <br />
                <div class="message-content" style="text-align:right">
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>رصيد المورد : </b>{{$SupplierModal->total}}</p>
                            <p><b>الهاتف : </b>{{$SupplierModal->phone1}}</p>
                            <p><b>موبايل : </b>{{$SupplierModal->phone2}}</p>
                        </div>
                        <div class="col-lg-5">
                            <p><b>رقم التسجيل : </b> {{$SupplierModal->registeration_no}}</p>
                            <p><b>الكود : </b>{{$SupplierModal->id}}</p>
                            <p><b>الحالة : </b>
                                @if($SupplierModal->active == 1)
                                مفعل
                                @else
                                غير مفعل
                                @endif
                            </p>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach ($Clients as $ClientModal)
<div id="Cus{{$ClientModal->id}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">عرض بيانات العميل</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                <h2>{{$ClientModal->person_name}}</h2>
                <br />
                <div class="message-content" style="text-align:right">
                    <div class="row">
                        <div class="col-lg-6">
                            <p><b>رصيد الخزينة : </b>{5000}</p>
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
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            </div>
        </div>
    </div>
</div>
@endforeach

        <!--/Modal-->

        @endsection
        @section('scripts')
<script src="{{ asset("/webassets/js/ajax.js") }}"></script>
<script>
    var CompanyId = $('#compId').val();
    function searchEmp(data) {

        $.ajax({
            type:'GET',
            url:"{{url('/Company/Employee/Search')}}",
            data:{
            id : CompanyId,
            data : data,
            },
            success:function(data) {

                $('#employee').empty();
                                        data.forEach(Employee => {
                                            if (Employee.active == 1) {
                                                                  var active = 'مفعل';
                                                                } else {
                                                                    var active = 'غير مفعل';
                                                                }
                                            var card = '<div class="chat-message">' +
                                            '<div class="profile-hdtc">' +
                                                '<img class="message-avatar" src="{{asset("/uploads/person/")}}/'+Employee.person_logo+'" alt="">' +
                                            '</div>' +
                                            '<div class="message">' +
                                                '<span class="message-date"><b>'+ Employee.person_name +'</b></span>' +
                                                '<div class="message-content" style="text-align:right">' +
                                                    '<div class="row">' +
                                                        '<div class="col-lg-6">' +
                                                            '<p><b>الهاتف : </b>' + Employee.phone1 + '</p>' +
                                                            '<p><b>موبايل : </b>' + Employee.phone2 + '</p>' +
                                                        '</div>' +
                                                        '<div class="col-lg-5">' +
                                                            '<p><b>الرقم التأميني : </b>'+ Employee.registeration_no+'</p>' +
                                                            '<p><b>الوظيفة : </b> محاسب</p>' +
                                                            '<p><b>الكود : </b>'+Employee.id+'</p>' +
                                                            '<p><b>الحالة : </b>' +
                                                                active + '</p>' +
                                                        '</div>' +
                                                        '<div class="col-lg-1">' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                                '<div class="m-t-md mg-t-10">' +
                                                '<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp'+ Employee.id+'"><i class="fa fa-eye"></i> عـرض </a>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>';
                                            $('#employee').append(card);
                                        });
                console.table(data);
            },
            error: function (request, status, error) {
                alert(request.responseText);
            }
        });
    }
    function searchSup(data) {

        $.ajax({
            type:'GET',
            url:"{{url('/Company/Supplier/Search')}}",
            data:{
            id : CompanyId,
            data : data,
            },
            success:function(data) {

                $('#supplier').empty();
                                data.forEach(Supplier => {
                                    if (Supplier.active == 1) {
                                                          var active = 'مفعل';
                                                        } else {
                                                            var active = 'غير مفعل';
                                                        }
                                    var card = '<div class="chat-message">' +
                                    '<div class="profile-hdtc">' +
                                        '<img class="message-avatar" src="{{asset("/uploads/person/")}}/'+Supplier.person_logo+'" alt="">' +
                                    '</div>' +
                                    '<div class="message">' +
                                        '<span class="message-date"><b>'+ Supplier.person_name +'</b></span>' +
                                        '<div class="message-content" style="text-align:right">' +
                                            '<div class="row">' +
                                                '<div class="col-lg-6">' +
                                                    '<p><b>الهاتف : </b>' + Supplier.phone1 + '</p>' +
                                                    '<p><b>موبايل : </b>' + Supplier.phone2 + '</p>' +
                                                '</div>' +
                                                '<div class="col-lg-5">' +
                                                    '<p><b>الرقم التأميني : </b>'+ Supplier.registeration_no+'</p>' +
                                                    '<p><b>الوظيفة : </b> محاسب</p>' +
                                                    '<p><b>الكود : </b>'+Supplier.id+'</p>' +
                                                    '<p><b>الحالة : </b>' +
                                                        active + '</p>' +
                                                '</div>' +
                                                '<div class="col-lg-1">' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                        '<div class="m-t-md mg-t-10">' +
                                        '<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp'+ Supplier.id+'"><i class="fa fa-eye"></i> عـرض </a>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>';
                                    $('#supplier').append(card);
                                });
        console.table(data);
        },
        error: function (request, status, error) {
            alert(request.responseText);
        }
        });
    };
    function searchClient(data) {
$.ajax({
    type:'GET',
    url:"{{url('/Company/Client/Search')}}",
    data:{
    id : CompanyId,
    data : data,
    },
    success:function(data) {

        $('#client').empty();
                        data.forEach(Client => {
                            if (Client.active == 1) {
                                                  var active = 'مفعل';
                                                } else {
                                                    var active = 'غير مفعل';
                                                }
                            var card = '<div class="chat-message">' +
                            '<div class="profile-hdtc">' +
                                '<img class="message-avatar" src="{{asset("/uploads/person/")}}/'+Client.person_logo+'" alt="">' +

                            '</div>' +
                            '<div class="message">' +
                                '<span class="message-date"><b>'+ Client.person_name +'</b></span>' +
                                '<div class="message-content" style="text-align:right">' +
                                    '<div class="row">' +
                                        '<div class="col-lg-6">' +
                                            '<p><b>الهاتف : </b>' + Client.phone1 + '</p>' +
                                            '<p><b>موبايل : </b>' + Client.phone2 + '</p>' +
                                        '</div>' +
                                        '<div class="col-lg-5">' +
                                            '<p><b>الرقم التأميني : </b>'+ Client.registeration_no+'</p>' +
                                            '<p><b>الوظيفة : </b> محاسب</p>' +
                                            '<p><b>الكود : </b>'+Client.id+'</p>' +
                                            '<p><b>الحالة : </b>' +
                                                active + '</p>' +
                                        '</div>' +
                                        '<div class="col-lg-1">' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="m-t-md mg-t-10">' +
                                '<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp'+ Client.id+'"><i class="fa fa-eye"></i> عـرض </a>' +
                                '</div>' +
                            '</div>' +
                        '</div>';
                            $('#client').append(card);
                        });
console.table(data);
},
error: function (request, status, error) {
    alert(request.responseText);
}
});
}

</script>

        @endsection
