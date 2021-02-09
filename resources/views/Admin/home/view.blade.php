@extends('Layout.web')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="{{url('/')}}"> {{ __('titles.home') }} <span class="bread-slash"> / </span></a> 
    </li>
    <li>
        <span class="bread-blod"> {{ __('titles.company') }} </span>
    </li>
	@else
   
    <li>
        <span class="bread-blod"> {{ __('titles.company') }} /</span>
        <li>
        <a href="{{url('/')}}"> {{ __('titles.home') }}
    </li>
   
	@endif
</ul>

@endsection

@section('content')

<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row row-ltr">
        <input type="hidden"  id="company_id" value="{{$companyrow->id}}">

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                    <ul id="myTabedu1" class="tab-review-design dir-rtl" >
                        <li class="active"><a href="#description">{{ __('titles.employees') }}</a></li>
                        <li><a href="#reviews"> {{ __('titles.suppliers') }}</a></li>
                        <li><a href="#INFORMATION">{{ __('titles.clients') }}</a></li>
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
                    <div class="profile-details-hr dir-rtl">
                        <div class="row row-ltr mg-b-15">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="skill-title">
                                            <h2>{{ __('titles.basic_data') }}
                                            <a class="btn btn-primary waves-effect waves-light" style="margin-right:40% ;" href="{{route('home.index')}}">{{ __('titles.cancel') }}</a>
                                            </h2>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div class="ex-pro">
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.company_official_name') }}:</b> {{$companyrow->company_official_name}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.registeration_no') }}:</b>{{$companyrow->registeration_no}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.chairman_person_name') }}:</b>{{$companyrow->chairman_person_name}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.legal_entity') }}:</b> {{$companyrow->legal_entity}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.equity_capital') }}: </b>{{$companyrow->equity_capital}} </li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.cash_box') }}: </b>{{$companyrow->safe->safe_name ?? ''}} </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row row-ltr mg-b-15">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="skill-title">
                                        {{ __('titles.tax_data') }}
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div class="ex-pro">
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.taxable') }}:</b>
                                        @if($companyrow->taxable ==1) {{ __('titles.yes') }} @else {{ __('titles.no') }} @endif </li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.tax_authority') }}:</b> {{$companyrow->tax_authority}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.tax_card') }}:</b> {{$companyrow->tax_card}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row row-ltr mg-b-15">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="skill-title">
                                        {{ __('titles.phone_data') }}
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                                <div class="ex-pro">
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.email') }}:</b> {{$companyrow->email}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.website') }}:</b> {{$companyrow->website}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.contact_person_mobile') }}:</b> {{$companyrow->contact_person_mobile}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.contact_person_name') }}:</b> {{$companyrow->contact_person_name}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row row-ltr mg-b-15">
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
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.open_blance_amount') }}:</b> {{$companyrow->safe->open_balance ?? ''}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.open_balance_date') }}:</b>
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
                        <div class="row row-ltr mg-b-15">
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
                                    <ul>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.open_blance_amount') }}:</b> {{$companyrow->bank->open_balance ?? ''}}</li>
                                        <li><i class="fa fa-angle-left"></i> <b>{{ __('titles.open_balance_date') }}:</b> <?php
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