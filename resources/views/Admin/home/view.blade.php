@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
    <li>
    <a href="{{url('/')}}">الرئيسية<span class="bread-slash"> / </span></a> 
    </li>
    <li>
        <span class="bread-blod">عرض الشركة</span>
    </li>
</ul>

@endsection

@section('content')

<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
        <input type="hidden"  id="company_id" value="{{$companyrow->id}}">

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul id="myTabedu1" class="tab-review-design" style="direction:rtl">
                        <li class="active"><a href="#description">الموظفين</a></li>
                        <li><a href="#reviews"> الموردين</a></li>
                        <li><a href="#INFORMATION">العملاء</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            @include('Admin.home.employee')
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            @include('Admin.home.supplier')
                        </div>
                        <div class="product-tab-list tab-pane fade" id="INFORMATION">
                            @include('Admin.home.client')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="profile-info-inner">
                    <div class="profile-img">
                        <img src="{{ asset('uploads/companies/'.$companyrow->company_logo)}}" style="width: 100%;height:300px" alt="" />
                    </div>
                    <div class="profile-details-hr" style="direction:rtl;">
                        <div class="row mg-b-15">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="skill-title">
                                            <h2>البيانات الأساسية
                                            <a class="btn btn-primary waves-effect waves-light" style="margin-right:40% ;" href="{{route('home.index')}}">إلغــاء</a>
                                            </h2>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div class="ex-pro">
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>إسم الشركة:</b> {{$companyrow->company_official_name}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>رقم التسجيل:</b>{{$companyrow->registeration_no}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>رئيس مجلس الاداره:</b>{{$companyrow->chairman_person_name}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>الكيان القانونى:</b> {{$companyrow->legal_entity}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>رأس المال: </b>{{$companyrow->equity_capital}} </li>
                                        <li><i class="fa fa-angle-left"></i> <b>الخزينة: </b>{{$companyrow->safe->safe_name ?? ''}} </li>
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
                                        <li><i class="fa fa-angle-left"></i> <b>خاضعه لضريبة القيمة المضافة:</b>
                                        @if($companyrow->taxable ==1) نعم @else لا @endif </li>
                                        <li><i class="fa fa-angle-left"></i> <b>مأموريه الضرائب:</b> {{$companyrow->tax_authority}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>رقم الملف الضريبى:</b> {{$companyrow->tax_card}}</li>
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
                                        <li><i class="fa fa-angle-left"></i> <b>البريد الالكترونى:</b> {{$companyrow->email}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>موقع الكترونى:</b> {{$companyrow->website}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>موبايل التواصل:</b> {{$companyrow->contact_person_mobile}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>شخص للتواصل:</b> {{$companyrow->contact_person_name}}</li>
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
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>الرصيد الافتتاحي:</b> {{$companyrow->safe->open_balance ?? ''}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>تاريخ بداية الترصيد:</b>
                                            <?php
                                            $date = null;
                                            if ($companyrow->safe) {
                                                $date = date_create($companyrow->safe->balance_start_date);
                                            }
                                            ?> @if($date){{ date_format($date,"d-m-Y")  }}@endif</li>
                                        <!-- <li><i class="fa fa-angle-left"></i> <b>رصيدالخزينه الحالى:</b> 500000</li> -->
                                    </ul>
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
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>الرصيد الافتتاحي:</b> {{$companyrow->bank->open_balance ?? ''}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>تاريخ بداية الترصيد:</b> <?php
                                                                                                            $bank_date = null;
                                                                                                            if ($companyrow->bank) {
                                                                                                                $bank_date = date_create($companyrow->bank->balance_start_date);
                                                                                                            }
                                                                                                            ?> @if($bank_date){{ date_format($bank_date,"d-m-Y")  }}@endif</li>
                                        <!-- <li><i class="fa fa-angle-left"></i> <b>رصيدالبنك الحالى:</b> 500000</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Modal-->



<!--/Modal-->

</div>

@endsection

@section('scripts')
<script>
    function empSearch(){
        event.preventDefault();
        var text=$('#searchEmp').val();
        $.ajax({
                data: {
                    searchEmp: $('#searchEmp').val(),
                    company_id: $('#company_id').val(),
                },
                url: "{{ route('search_emp') }}" ,
                success: function(data) {

                    $('#description').html(data);
                    $('#searchEmp').val(text);
                }
            });
    }

    function clientSearch(){
        event.preventDefault();
        var text=$('#searchClient').val();
        $.ajax({
                data: {
                    searchClient: $('#searchClient').val(),
                    company_id: $('#company_id').val(),
                },
                url: "{{ route('search_client') }}" ,
                success: function(data) {

                    $('#INFORMATION').html(data);
                    $('#searchClient').val(text);
                }
            });
    }

    function supplierSearch(){
        event.preventDefault();
        var text=$('#searchSup').val();
        $.ajax({
                data: {
                    searchSup: $('#searchSup').val(),
                    company_id: $('#company_id').val(),
                },
                url: "{{ route('search_sup') }}" ,
                success: function(data) {

                    $('#reviews').html(data);
                    $('#searchSup').val(text);
                }
            });
    }

    $(document).ready(function() {

        $(document).on('click', '#emp .pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        $(document).on('click', '#clientPag .pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_clientdata(page);
        });

        $(document).on('click', '#supp .pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            fetch_suppdata(page);
        });

        function fetch_data(page) {
            $.ajax({
                data: {
                    company_id: $('#company_id').val(),
                },
                url: "{{ route('fetch_emp') }}?page=" + page,
                success: function(data) {

                    $('#description').html(data);
                }
            });
        }


        function fetch_clientdata(page) {
            $.ajax({
                data: {
                    company_id: $('#company_id').val(),
                },
                url: "{{ route('fetch_client') }}?page=" + page,
                success: function(data) {

                    $('#INFORMATION').html(data);
                }
            });
        }


        function fetch_suppdata(page) {
            $.ajax({
                data: {
                    company_id: $('#company_id').val(),
                },
                url: "{{ route('fetch_supplier') }}?page=" + page,
                success: function(data) {

                    $('#reviews').html(data);
                }
            });
        }
    });
</script>
@endsection