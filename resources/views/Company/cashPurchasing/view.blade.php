@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <a href="#"></a> {{ __('titles.cash_payments') }}<span class="bread-slash"> / </span>
    </li>
	@else
   
    <li>
        <a href="#"></a> {{ __('titles.cash_payments') }}<span class="bread-slash"> / </span>
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
                    <div class="">
                        <a href="{{url('/Cash/Purchasing')}}" class="btn btn-primary waves-effect waves-light">{{ __('titles.back') }}</a>
                    </div>
                </div>
                <div class="product-status-wrap drp-lst dir-rtl">
                <h4 >{{ __('titles.purchasing') }}</h4>
                            <h3 >{{$Company->company_official_name}} {{__('titles.supp_stock')}}</h3><br />
                       
                </div>
                <div class="product-payment-inner-st" style="padding-top:0px">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">
                                    <form action="/upload" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                        @if(str_replace('_', '-', app()->getLocale())=='ar')
                                        <div class="row res-rtl" style="display: flex ;flex-direction: row-reverse ;">
                                            @else
                                            <div class="row ">
                                                @endif
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.date')}}</label>
                                                        <input name="" type="date" class="form-control" value="{{date('Y-m-d', strtotime($Cash->cash_date))}}" style="text-align:right" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.status')}}</label>
                                                        <input name="" type="text" class="form-control" @if ($Cash->approved == 1)
                                                        value="{{__('titles.yes')}}"
                                                        @else
                                                        value="{{__('titles.no')}}"
                                                        @endif
                                                        disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.mony_amount')}}</label>
                                                        <input name="" type="text" class="form-control" value="الخزينة" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.comm_industr_prof_tax')}}</label>
                                                        <input name="" type="number" class="form-control" value="{{$Cash->comm_industr_prof_tax}}" placeholder="00" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.net_value')}}</label>
                                                        <input name="" type="number" class="form-control" value="{{$Cash->net_value}}" placeholder="2500" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 dir-rtl">

                                                    <div class="form-group">
                                                        <label class="">{{__('titles.permission_no')}}</label>
                                                        <input name="" type="text" class="form-control" value="{{$Cash->exit_permission_code}}" placeholder="102 " disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.declaration')}}</label>
                                                        <input name="" type="text" class="form-control" value="{{$Cash->statement}}" placeholder="البيان" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.amount')}}</label>
                                                        <input name="" type="number" class="form-control" value="{{$Cash->cash_amount}}" placeholder="20000" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.outgoings_type')}}</label>
                                                        <input name="" type="text" class="form-control" @if ($Cash->outgoing_type_id == 100)
                                                        value="{{__('titles.commodity')}}"
                                                        @elseif ($Cash->outgoing_type_id == 101)
                                                        value=" {{__('titles.Services')}}"
                                                        @else
                                                        value=" {{__('titles.other')}}"
                                                        @endif
                                                        placeholder=" {{__('titles.Services')}}" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="">{{__('titles.vat_value')}}</label>
                                                        <input name="" type="number" class="form-control" value="{{$Cash->vat_value}}" placeholder="0" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <a href="{{url('/Cash/Purchasing')}}" type="submit" class="btn btn-primary waves-effect waves-light">{{__('titles.back')}}</a>
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