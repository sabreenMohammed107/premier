@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
@if(str_replace('_', '-', app()->getLocale())=='ar')
    <li>
        <a href="#"></a>  {{ __('titles.home') }} <span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">{{ __('titles.transfer_cheques') }} </span>
    </li>
	@else
   
    <li>
        <span class="bread-blod">{{ __('titles.transfer_cheques') }} </span>
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-ltr">
                <div class="mg-b-15">
                <a href="{{url('/Cheques')}}" class="btn btn-primary waves-effect waves-light">{{ __('titles.back') }}</a>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd dir-rtl">
                            <h4 >{{ __('titles.transfer_cheques') }}</h4>
                            <h3 > {{$Company->company_official_name}}</h3><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright dir-rtl" >
                            <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row row-ltr">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 shadow">
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{$Cheque->cheque_no}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.cheque_no') }} :</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <label class="login2">{{$Cheque->amount}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.mony_amount') }} :</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{date('Y-m-d', strtotime($Cheque->transaction_date))}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.date') }} :</label>
                                            </div>
                                        </div>
                                        @if ($Cheque->person_id)
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{$Cheque->person_name}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.name') }} :</label>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row row-ltr" >
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{date('Y-m-d', strtotime($Cheque->due_date))}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.due_date') }} :</label>
                                            </div>
                                        </div>
                                        @if ($Cheque->person_id)
                                        @php
                                            $Person = $Cheque->person;
                                            $PersonType = $Person->person_type;
                                        @endphp
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{$PersonType->person_type_name}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2"> {{ __('titles.type') }} :</label>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">
                                                    @if ($Cheque->trans_type == 0)
                                                    {{ __('titles.purchasing') }}
                                                    @else
                                                    {{ __('titles.sale_bills') }}
                                                    @endif
                                                </label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.type') }} :</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{date('Y-m-d', strtotime($Cheque->release_date))}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.release_date') }}:</label>
                                            </div>
                                        </div>
                                        <div class="row row-ltr">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <label class="login2">{{$Cheque->bank_name}}</label>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">{{ __('titles.bank') }} :</label>
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
