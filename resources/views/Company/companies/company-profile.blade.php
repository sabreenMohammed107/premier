@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> {{$Company->company_official_name}}<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.company_details') }}</span>
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
    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row res-rtl row-rtl">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="profile-img">
                            <img src="{{ asset("/uploads/companies/$Company->company_logo") }}" alt="" />
                        </div>
                        <div class="profile-details-hr row-dir dir-rtl ">
                            <div class="row mg-b-15">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="skill-title">
                                                <a href="{{ url("/Company/edit")}}" class="btn btn-primary waves-effect waves-light mg-b-15" style="display: block;"> {{ __('titles.edit') }}</a>
                                                <h2>
                                                {{ __('titles.basic_data') }}
                                                </h2>

                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-pro dir-rtl">
                                        <ul>
                                            <li> <b>{{ __('titles.company_official_name') }}:</b>{{$Company->company_official_name}}</li>
                                            <li> <b>{{ __('titles.registeration_no') }}:</b>{{$Company->registeration_no}}</li>
                                            <li> <b>  {{ __('titles.chairman_person_name') }}:</b> {{$Company->chairman_person_name}}</li>
                                            <li> <b>{{ __('titles.legal_entity') }}:</b> {{$Company->legal_entity}}</li>
                                            <li></i> <b>{{ __('titles.equity_capital') }}: </b>{{$Company->equity_capital}} </li>
                                            <li> <b>{{ __('titles.cash_box') }}: </b>
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
                                            <h2>
                                                {{ __('titles.tax_data') }}
                                                </h2>

                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-pro">
                                        <ul>
                                            <li> <b>{{ __('titles.taxable') }}:</b>&nbsp;{{ $Company->taxable ? __('titles.yes') :  __('titles.no') }}</li>
                                            <li> <b>{{ __('titles.tax_authority') }}:</b> {{$Company->tax_authority}}</li>
                                            {{-- <li> <b>{{ __('titles.tax_authority') }}:</b> العمرانية</li> --}}
                                            <li> <b>{{ __('titles.tax_card') }}:</b> {{$Company->tax_card}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-b-15">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="skill-title">
                                                <h2>
                                                {{ __('titles.phone_data') }}
                                                </h2>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-pro">
                                        <ul>
                                            <li> <b>  {{ __('titles.email') }}:</b> {{$Company->email}}</li>
                                            <li> <b>  {{ __('titles.website') }}:</b> {{$Company->website}}</li>
                                            <li> <b>  {{ __('titles.contact_person_mobile') }}:</b> {{$Company->contact_person_mobile}}</li>
                                            <li> <b>  {{ __('titles.contact_person_name') }}:</b>{{$Company->contact_person_name}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->role_id != 103)
                            <div class="row mg-b-15">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="skill-title">
                                                <h2>{{ __('titles.safe_data') }}</h2>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-pro">
                                        @if ($Safe)
                                        <ul>
                                            <li> <b>{{ __('titles.open_blance_amount') }}:</b> {{$Safe->open_balance}}</li>
                                            <li> <b>{{ __('titles.open_balance_date') }}:</b> {{$Safe->balance_start_date}}</li>
                                            <li> <b>{{ __('titles.current_balance') }}:</b> {{$SafeTotal}}</li>
                                        </ul>
                                        @else
                                        {{ __('titles.no_safe_data') }}
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="row mg-b-15">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="skill-title">
                                                <h2> {{ __('titles.bank_data') }}</h2>
                                                <hr />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ex-pro">
                                        @if ($Bank)
                                        <ul>
                                            <li> <b>{{ __('titles.open_blance_amount') }}:</b> {{$Bank->open_balance}}</li>
                                            <li> <b>{{ __('titles.open_balance_date') }}:</b> {{$Bank->balance_start_date}}</li>
                                            <li> <b>{{ __('titles.current_balance') }}:</b> {{$BankTotal}}</li>
                                        </ul>
                                        @else
                                        {{ __('titles.no_bank_data') }}
                                        @endif

                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st analysis-progrebar-ctn">
                        @if (Auth::user()->role_id == 103)
                        <ul id="myTabedu1" class="tab-review-design row-dir dir-rtl">

                            <li @if(!request()->clients_page && !request()->suppliers_page && !request()->employees_page)
                                class="active"
                                @endif
                                @isset(request()->employees_page)
                                class="active"
                                @endisset
                                ><a href="#description">{{ __('titles.employees') }}</a></li>
                            <li @isset(request()->suppliers_page)
                                class="active"
                                @endisset
                                ><a href="#reviews"> {{ __('titles.suppliers') }}</a></li>
                            <li @isset(request()->clients_page)
                                class="active"
                                @endisset
                                ><a href="#INFORMATION">{{ __('titles.clients') }}</a></li>
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
                                        <input type="text" oninput="searchEmp(this.value)" placeholder="{{ __('titles.search_here') }}" class="search-int form-control" style="text-align:right">
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
                                                        <div class="message-content txt-right">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <p><b>{{$Employee->person_name}}</b></p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <p><b>{{ __('titles.phone') }} : </b>{{$Employee->phone1}}</p>
                                                                    <p><b>{{ __('titles.phone') }} : </b>{{$Employee->phone2}}</p>
                                                                    <p><b>{{ __('titles.current_balance') }} : </b>{{$Employee->total}}</p>

                                                                    {{-- <p><b>{{ __('titles.job_date') }} : </b>01-01-2020</p>
																		<p><b>{{ __('titles.status') }}  : </b>أعزب</p> --}}
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <p><b>{{ __('titles.insurance_num') }} : </b> {{$Employee->registeration_no}}</p>
                                                                    <p><b>{{ __('titles.job') }} : </b> محاسب</p>
                                                                    <p><b>{{ __('titles.code') }} : </b>{{$Employee->id}}</p>
                                                                    <p><b>{{ __('titles.status') }} : </b>
                                                                        @if($Employee->active == 1)
                                                                        {{ __('titles.active') }}
                                                                        @else
                                                                        {{ __('titles.not_active') }}
                                                                        @endif
                                                                    </p>
                                                                </div>

                                                                <div class="col-lg-1"></div>
                                                            </div>
                                                        </div>
                                                        <div class="m-t-md mg-t-10">
                                                            <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp{{$Employee->id}}"><i class="fa fa-eye"></i> {{ __('titles.show') }} </a>
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
													<li class="page-item"><a class="page-link" href="#">{{ __('titles.next') }}</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">{{ __('titles.prev') }}</a></li>
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
                                    <input type="text" oninput="searchSup(this.value)" placeholder="{{ __('titles.search_here') }}" class="search-int form-control" style="text-align:right">
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
                                                    <div class="message-content txt-right">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <p><b>{{$Supplier->person_name}}</b></p>
                                                            </div>
                                                            <div class="col-lg-6 dir-rtl">
                                                                <p><b>رصيد المورد : </b>{{$Supplier->total}}</p>
                                                                <p><b>{{ __('titles.phone') }} : </b>{{$Supplier->phone1}}</p>
                                                                <p><b>{{ __('titles.mobile') }} : </b>{{$Supplier->phone2}}</p>
                                                            </div>
                                                            <div class="col-lg-5 dir-rtl">
                                                                <p><b>{{ __('titles.registeration_no') }} : </b> {{$Supplier->registeration_no}}</p>
                                                                <p><b>{{ __('titles.code') }} : </b>{{$Supplier->id}}</p>
                                                                <p><b>{{ __('titles.status') }} : </b>
                                                                    @if($Supplier->active == 1)
                                                                    {{ __('titles.active') }}
                                                                    @else
                                                                    {{ __('titles.not_active') }}
                                                                    @endif
                                                                </p>
                                                            </div>

                                                            <div class="col-lg-1"></div>
                                                        </div>
                                                    </div>
                                                    <div class="m-t-md mg-t-10">
                                                        <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Sup{{$Supplier->id}}"><i class="fa fa-eye"></i> {{ __('titles.show') }} </a>
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
													<li class="page-item"><a class="page-link" href="#">{{ __('titles.next') }}</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">{{ __('titles.prev') }}</a></li>
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
                                <input type="text" oninput="searchClient(this.value)" placeholder="{{ __('titles.search_here') }}" class="search-int form-control" style="text-align:right">
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
                                                <div class="message-content txt-right">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p><b>{{$Client->person_name}}</b></p>
                                                        </div>
                                                        <div class="col-lg-6 dir-rtl">
                                                            <p><b>{{ __('titles.cash_box_balance') }} : </b>5000</p>
                                                            <p><b>{{ __('titles.phone') }} : </b>{{$Client->phone1}}</p>
                                                            <p><b>{{ __('titles.mobile') }} : </b>{{$Client->phone2}}</p>
                                                        </div>
                                                        <div class="col-lg-5 dir-rtl">
                                                            <p><b>{{ __('titles.registeration_no') }} : </b> {{$Client->registeration_no}}</p>
                                                            <p><b>{{ __('titles.code') }} : </b>{{$Client->id}}</p>
                                                            <p><b>{{ __('titles.status') }} : </b>
                                                                @if($Client->active == 1)
                                                                {{ __('titles.active') }}
                                                                @else
                                                                {{ __('titles.not_active') }}
                                                                @endif
                                                            </p>
                                                        </div>

                                                        <div class="col-lg-1"></div>
                                                    </div>
                                                </div>
                                                <div class="m-t-md mg-t-10">
                                                    <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Cus{{$Client->id}}"><i class="fa fa-eye"></i> {{ __('titles.show') }} </a>
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
													<li class="page-item"><a class="page-link" href="#">{{ __('titles.next') }}</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">{{ __('titles.prev') }}</a></li>
                            </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>

            @else
            <div style="text-align: right;">{{ __('titles.no_data_found') }}</div>
            @endif
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
                <h4 class="modal-title text-right">{{ __('titles.employee_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <img class="message-avatar" src="img/contact/1.jpg" alt="">
                <h2>{{$EmployeeModal->person_name}}</h2>
                <h4>محاسب قانوني</h4>
                <br />
                <div class="message-content text-right">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">
                            <p><b>رصيد المورد : </b>{{$EmployeeModal->total}}</p>
                            <p><b>{{ __('titles.phone') }} : </b>{{$EmployeeModal->phone1}}</p>
                            <p><b>{{ __('titles.mobile') }} : </b>{{$EmployeeModal->phone2}}</p>
                            {{-- <p><b>{{ __('titles.job_date') }} : </b>01-01-2020</p>
                            <p><b>{{ __('titles.status') }} الإجتماعية : </b>أعزب</p> --}}
                        </div>
                        <div class="col-lg-5">
                            <p><b>{{ __('titles.insurance_num') }} : </b> {{$EmployeeModal->registeration_no}}</p>
                            <p><b>{{ __('titles.code') }} : </b>{{$EmployeeModal->id}}</p>
                            <p><b>{{ __('titles.status') }} : </b>
                                @if($EmployeeModal->active == 1)
                                {{ __('titles.active') }}
                                @else
                                {{ __('titles.not_active') }}
                                @endif
                            </p>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
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
                <h4 class="modal-title text-right" >{{ __('titles.supplier_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                <h2>{{$SupplierModal->person_name}}</h2>
                <br />
                <div class="message-content txt-right">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">
                                                    <p><b>رصيد المورد : </b>{{$SupplierModal->total}}</p>
                            <p><b>{{ __('titles.phone') }} : </b>{{$SupplierModal->phone1}}</p>
                            <p><b>{{ __('titles.mobile') }} : </b>{{$SupplierModal->phone2}}</p>
                        </div>
                        <div class="col-lg-5 dir-rtl">
                            <p><b>{{ __('titles.registeration_no') }} : </b> {{$SupplierModal->registeration_no}}</p>
                            <p><b>{{ __('titles.code') }} : </b>{{$SupplierModal->id}}</p>
                            <p><b>{{ __('titles.status') }} : </b>
                                @if($SupplierModal->active == 1)
                                {{ __('titles.active') }}
                                @else
                                {{ __('titles.not_active') }}
                                @endif
                            </p>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
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
                <h4 class="modal-title text-right" >{{ __('titles.client_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                <h2>{{$ClientModal->person_name}}</h2>
                <br />
                <div class="message-content txt-right">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dir-rtl">
                                                    <p><b>{{ __('titles.cash_box_balance') }} : </b>{5000}</p>
                            <p><b>{{ __('titles.phone') }} : </b>02 2215 321</p>
                            <p><b>{{ __('titles.mobile') }} : </b>010 215 321</p>
                        </div>
                        <div class="col-lg-5 dir-rtl">
                            <p><b>{{ __('titles.registeration_no') }} : </b> 805</p>
                            <p><b>{{ __('titles.code') }} : </b>2215</p>
                            <p><b>{{ __('titles.status') }} : </b>  {{ __('titles.active') }}</p>
                        </div>

                        <div class="col-lg-1"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }}</a>
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
            type: 'GET',
            url: "{{url('/Company/Employee/Search')}}",
            data: {
                id: CompanyId,
                data: data,
            },
            success: function(data) {

                $('#employee').empty();
                data.forEach(Employee => {
                    if (Employee.active == 1) {
                    } else {
                        var active = ' {{ __("titles.not_active") }}';
                    }
                    var card = '<div class="chat-message">' +
                        '<div class="profile-hdtc">' +
                        '<img class="message-avatar" src="{{asset("/uploads/person/")}}/' + Employee.person_logo + '" alt="">' +
                        '</div>' +
                        '<div class="message">' +

                        '<div class="message-content txt-right" >' +
                        '<div class="row">' +
                        '<span><b>' + Employee.person_name + '</b></span>' +
                        '<div class="col-lg-6">' +
                        '<p><b>{{ __("titles.phone") }} : </b>' + Employee.phone1 + '</p>' +
                        '<p><b>{{ __("titles.mobile") }} : </b>' + Employee.phone2 + '</p>' +
                        '</div>' +
                        '<div class="col-lg-5">' +
                        '<p><b>{{ __("titles.registeration_no") }} : </b>' + Employee.registeration_no + '</p>' +
                        '<p><b>{{ __("titles.job") }} : </b> محاسب</p>' +
                        '<p><b>{{ __("titles.code") }} : </b>' + Employee.id + '</p>' +
                        '<p><b>{{ __("titles.status") }} : </b>' +
                        active + '</p>' +
                        '</div>' +
                        '<div class="col-lg-1">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="m-t-md mg-t-10">' +
                        '<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp' + Employee.id + '"><i class="fa fa-eye"></i> عـرض </a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $('#employee').append(card);
                });
                console.table(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }

    function searchSup(data) {

        $.ajax({
            type: 'GET',
            url: "{{url('/Company/Supplier/Search')}}",
            data: {
                id: CompanyId,
                data: data,
            },
            success: function(data) {

                $('#supplier').empty();
                data.forEach(Supplier => {
                    if (Supplier.active == 1) {
                        var active = '{{ __("titles.active") }}';
                    } else {
                        var active = '{{ __("titles.not_active") }}';
                    }
                    var card = '<div class="chat-message">' +
                        '<div class="profile-hdtc">' +
                        '<img class="message-avatar" src="{{asset("/uploads/person/")}}/' + Supplier.person_logo + '" alt="">' +
                        '</div>' +
                        '<div class="message">' +

                        '<div class="message-content txt-right" >' +
                        '<div class="row">' +
                        '<span ><b>' + Supplier.person_name + '</b></span>' +
                        '<div class="col-lg-6">' +
                        '<p><b>{{ __("titles.phone") }} : </b>' + Supplier.phone1 + '</p>' +
                        '<p><b>{{ __("titles.mobile") }} : </b>' + Supplier.phone2 + '</p>' +
                        '</div>' +
                        '<div class="col-lg-5">' +
                        '<p><b>{{ __("titles.registeration_no") }} : </b>' + Supplier.registeration_no + '</p>' +
                        '<p><b>{{ __("titles.job") }} : </b> محاسب</p>' +
                        '<p><b>{{ __("titles.code") }} : </b>' + Supplier.id + '</p>' +
                        '<p><b>{{ __("titles.status") }} : </b>' +
                        active + '</p>' +
                        '</div>' +
                        '<div class="col-lg-1">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="m-t-md mg-t-10">' +
                        '<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp' + Supplier.id + '"><i class="fa fa-eye"></i> عـرض </a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $('#supplier').append(card);
                });
                console.table(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    };

    function searchClient(data) {
        $.ajax({
            type: 'GET',
            url: "{{url('/Company/Client/Search')}}",
            data: {
                id: CompanyId,
                data: data,
            },
            success: function(data) {

                $('#client').empty();
                data.forEach(Client => {
                    if (Client.active == 1) {
                        var active = '{{ __("titles.active") }}';
                    } else {
                        var active = '{{ __("titles.not_active") }}';
                    }
                    var card = '<div class="chat-message">' +
                        '<div class="profile-hdtc">' +
                        '<img class="message-avatar" src="{{asset("/uploads/person/")}}/' + Client.person_logo + '" alt="">' +

                        '</div>' +
                        '<div class="message">' +

                        '<div class="message-content txt-right" >' +
                        '<div class="row">' +
                        '<span ><b>' + Client.person_name + '</b></span>' +
                        '<div class="col-lg-6">' +
                        '<p><b>{{ __("titles.phone") }} : </b>' + Client.phone1 + '</p>' +
                        '<p><b>{{ __("titles.mobile") }} : </b>' + Client.phone2 + '</p>' +
                        '</div>' +
                        '<div class="col-lg-5">' +
                        '<p><b>{{ __("titles.registeration_no") }} : </b>' + Client.registeration_no + '</p>' +
                        '<p><b>{{ __("titles.job") }} : </b> محاسب</p>' +
                        '<p><b>{{ __("titles.code") }} : </b>' + Client.id + '</p>' +
                        '<p><b>{{ __("titles.status") }} : </b>' +
                        active + '</p>' +
                        '</div>' +
                        '<div class="col-lg-1">' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="m-t-md mg-t-10">' +
                        '<a class="btn btn-xs btn-success" data-toggle="modal" data-target="#Emp' + Client.id + '"><i class="fa fa-eye"></i> عـرض </a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $('#client').append(card);
                });
                console.table(data);
            },
            error: function(request, status, error) {
                alert(request.responseText);
            }
        });
    }
</script>

@endsection