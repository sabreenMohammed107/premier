@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="#"></a> {{ __('titles.receipts') }}<span class="bread-slash"> / </span>
    </li>
	@else
   
    <li>
        <a href="#"></a> {{ __('titles.receipts') }}<span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="#"></a>  {{ __('titles.home') }}
    </li>
   
	@endif
</ul>

@endsection

@section('content')
<!-- Single pro tab review Start-->
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-15">
                <a href="{{url('/Cash/Sales')}}" class="btn btn-primary waves-effect waves-light"> {{ __('titles.back') }}</a>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                        <h1 class="dir-rtl">{{ __('titles.receipts') }}</h1>
                        <h3>{{$Company->company_official_name}} {{__('titles.supp_stock')}}</h3>                            <br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright" >
                            <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row row-ltr" >
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow">
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="text" class="form-control" value="{{date('Y-m-d', strtotime($Cash->cash_date))}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.date')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="text" class="form-control" value="{{$Cash->cash_receipt_note}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.permission_no')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" class="form-control"
                                                    @if ($Cash->approved == 1)
                                                        value="{{__('titles.yes')}}"
                                                    @else
                                                        value="{{__('titles.no')}}"
                                                    @endif
                                                    disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b> {{__('titles.confirm')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" class="form-control" value="{{$Cash->statement}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.declaration')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" class="form-control" value="الخزينة" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.mony_amount')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="text" class="form-control" value="{{$Cash->person_name}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.name')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                    <input type="text" class="form-control" disabled placeholder="28198211">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.current_balance')}}</b></label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="text" class="form-control" value="{{$Cash->cash_amount}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"><b>{{__('titles.amount')}}</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dropzone.dz-clickable .dz-message {
        display: none;
    }
</style>
@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
