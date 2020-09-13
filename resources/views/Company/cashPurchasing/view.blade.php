@extends('Layout.company')



@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod">  مدفوعات </span>
    </li>
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
                    <a href="{{url('/Cash/Purchasing')}}" class="btn btn-primary waves-effect waves-light">رجــــــــوع</a>
                    </div>
                </div>
                <div class="product-status-wrap drp-lst">
                    <h4 style="text-align:right">بيان المدفوعات</h4>
                    <h3 style="text-align:right">{{$Company->company_official_name}} (حركة الموردين+حركة المخزون)</h3>
                </div>
                <div class="product-payment-inner-st"style="padding-top:0px">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="review-content-section">
                                <div id="dropzone1" class="pro-ad addcoursepro">
                                    <form action="/upload" class="dropzone dropzone-custom needsclick addcourse" id="demo1-upload">
                                        <div class="row res-rtl"style="display: flex ;flex-direction: row-reverse ;">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="direction:rtl">
                                                <div class="form-group">
                                                    <label class="">التاريخ</label>
                                                    <input name="" type="date" class="form-control" value="{{date('Y-m-d', strtotime($Cash->cash_date))}}" style="text-align:right" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">الحالة</label>
                                                    <input name="" type="text" class="form-control"
                                                    @if ($Cash->approved == 1)
                                                        value="نعم"
                                                    @else
                                                        value="لا"
                                                    @endif
                                                    disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">السيولة</label>
                                                    <input name="" type="text" class="form-control" value="الخزينة" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">ض.أ.ت.ص</label>
                                                    <input name="" type="number" class="form-control" value="{{$Cash->comm_industr_prof_tax}}" placeholder="00" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">صافى القيمه</label>
                                                    <input name="" type="number" class="form-control" value="{{$Cash->net_value}}" placeholder="2500" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="direction:rtl">

                                                <div class="form-group">
                                                    <label class="">رقم اذن الصرف</label>
                                                    <input name="" type="text" class="form-control" value="{{$Cash->exit_permission_code}}" placeholder="102 " disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">البيان</label>
                                                    <input name="" type="text" class="form-control" value="{{$Cash->statement}}" placeholder="البيان" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">المبلغ</label>
                                                    <input name="" type="number" class="form-control" value="{{$Cash->cash_amount}}" placeholder="20000"disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">نوع المصروف</label>
                                                    <input name="" type="text" class="form-control"
                                                    @if ($Cash->outgoing_type_id == 100)
                                                        value="سلع"
                                                    @elseif ($Cash->outgoing_type_id == 101)
                                                        value="خدمات"
                                                    @else
                                                        value="أخرى"
                                                    @endif
                                                    placeholder="خدمة" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label class="">ض.القيمه المضافه</label>
                                                    <input name="" type="number" class="form-control" value="{{$Cash->vat_value}}" placeholder="0"disabled>
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
                                <a href="{{url('/Cash/Purchasing')}}" type="submit" class="btn btn-primary waves-effect waves-light">رجـــوع</a>
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
