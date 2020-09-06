@extends('Layout.company')

@section('style')
<style>
    .pagination-info {
        display: none !important;
    }

    .page-list {
        display: none !important;
    }

    .pagination ul li {
        float: right !important;
    }

    .search input:-ms-input-placeholder {
        color: white !important;
    }

    #table td, th {
        text-align: right;
    }
    .shadow{
        -webkit-box-shadow: 10px 10px 5px -9px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px -9px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px -9px rgba(0,0,0,0.75);
    }
    .shadow2{
        -webkit-box-shadow: 0px 0px 11px 1px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 11px 1px rgba(0,0,0,0.75);
box-shadow: 0px 0px 11px 1px rgba(0,0,0,0.75);
    }
    .input-mask-title{
        text-align:right !important;
    }
</style>
@endsection

@section('crumb')

<ul class="breadcome-menu">
    <li>
        <a href="#"></a> الشركات<span class="bread-slash"> / </span>
    </li>
    <li>
        <span class="bread-blod"> المبيعات </span>
    </li>
</ul>
@endsection

@section('content')
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-23">
                    <div class="">
                        <!--<div class="btn-back">
                            <a href="#">حــفـظ</a>
                        </div>-->                    <a href="{{url('/Invoices/Sales')}}" class="btn btn-primary waves-effect waves-light">إلغاء</a>

                        {{-- <button class="btn btn-primary waves-effect waves-light" onclick="saveInvoice()">حــفـظ</button> --}}
                        <!--<div class="btn-cancel">
                            <a href="#">إلــغاء</a>
                        </div>
                        <div class="btn-save">
                            <a href="#">حــفـظ</a>
                        </div>-->
                    </div>
                </div>
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1 style="direction:rtl">المبيعات</h1><br />
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="chosen-select-single mg-b-20" style="direction:rtl;">
                                <h3><span>شركة : </span> {{$Company->company_official_name}} (حركة الموردين+حركة المخزون)</h3>
                            </div>
                            <div class="form-group-inner" style="margin-right:10px;">
                                <div class="row res-rtl"style="display: flex ;flex-direction: row-reverse ;">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15" style="direction:rtl">
                                        <div class="row" style="margin-top:5px;">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="text" disabled id="invoice_no" value="{{$Invoice->serial}}" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="input-mask-title">
                                                    <label><b>رقم الفاتورة</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="input-mark-inner mg-b-22">
                                                <input type="date" disabled value="{{date('Y-m-d', strtotime($Invoice->inv_date))}}" id="inv_date" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="input-mask-title">
                                                    <label><b>تاريخ الفاتورة</b></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    @if ($Invoice->approved == 1)
                                                        معتمد
                                                    @else
                                                        غير معتمد
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">الحالة</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    @if ($Invoice->service_type_id == 101)
                                                    توريد
                                                    @else
خدمة
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">الخدمات</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    @if ($Invoice->outgoing_type_id == 100)
سلع
                                                    @elseif($Invoice->outgoing_type_id == 101)
خدمات
                                                    @else
 ألات ومعدات
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">نوع المصروف</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    @if ($Invoice->purchasing_type_id == 100)
                                                        مستورد
                                                    @else
                                                        محلي
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">المدفوعات</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="type" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                                                            <input type="text" name="person_name" disabled value="{{$Invoice->person_name}}" id="other_text" class="form-control" placeholder="">


                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox">
                                                    {{$type}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                    <input type="text" value="{{$Invoice->total_items_price}}" id="total_items_price" readonly class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>الإجمالي</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" value="{{$Invoice->total_items_discount}}" id="total_items_discount" readonly class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>الخصومات</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" value="{{$Invoice->total_vat}}" id="total_vat" readonly class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>اجمالى ضريبه قيمه مضافه</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" value="{{$Invoice->total_comm_industr_tax}}" id="total_comm_industr_tax" readonly class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>اجمالى ض تجاريه صناعيه</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" value="{{$Invoice->total_price_post_discounts}}" id="total_price_post_discounts" readonly class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>اجمالى بعد الخصم</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" value="{{$Invoice->net_invoice}}" id="net_invoice_total" readonly class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>إجمالى الصافى</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <!--<input type="text" class="form-control" placeholder="">-->
                                                    <textarea disabled id="notes" class="form-control">{{$Invoice->notes}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                    <div class="input-mask-title">
                                                        <label><b>ملاحظات</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <style>
                            th ,td{
                            text-align:center !important;
                            }
                            </style>
                            <h3 style="text-align:right">الأصناف</h3>
                            {{-- <button id="add" onclick="ajax_row('{{url('Invoice/Purchasing/AddRow')}}')" class="btn btn-primary waves-effect waves-light">إضافة صنف</button> --}}
                            <table class="table-striped" id="puchasetable"
                            data-locale="ar-SA"
                            data-pagination="true"
                            data-pagination-pre-text="السابق"
                            data-pagination-next-text="التالي"
                            data-show-export="true"
                            data-minimum-count-columns="2"
                            data-page-list="[10, 25, 50, 100, all]"
                            data-sort-name="index"
                            data-sort-order="desc"
                            data-search="true"
                            style="direction:rtl"
                            data-toggle="table"
                                data-show-columns="true"
                                data-show-pagination-switch="true"
                                data-show-refresh="true"
                                data-key-events="true"
                                data-resizable="true"
                                data-cookie="true"
                                data-toolbar="#toolbar"
                                data-show-toggle="true"
                                data-show-fullscreen="true"
                                data-show-columns-toggle-all="true">
                            <thead>
                                <tr>
                                    <th data-field="index" data-sortable="true">#</th>
                                    <th data-field="storeItem" data-sortable="true">مخزون</th>
                                    <th data-field="item" data-sortable="true">البيان</th>
                                    <th data-field="price" data-sortable="true">سعر الوحدة</th>
                                    <th data-field="qty" data-sortable="true">الكمية</th>
                                    <th data-field="total" data-sortable="true">الاجمالى</th>
                                    <th data-field="discount" data-sortable="true">الخصومات</th>
                                    <th data-field="totalAfterDiscount" data-sortable="true">اجمالى بعد الخصم</th>
                                    <th data-field="exemption" data-sortable="true">اعفاء ضريبى</th>
                                    <th data-field="vat" data-sortable="true">ض.القيمه المضافه</th>
                                    <th data-field="cit" data-sortable="true">ض.أ.ت.ص</th>
                                    <th data-field="net" data-sortable="true">صافى القيمه</th>
                                    <th data-field="del" data-sortable="true">حذف</th>
                                </tr>
                            </thead>
                                <tbody id="rows">
                                    @php
                                        $rowCount = count($InvoiceItems);
                                    @endphp
                                    @foreach ($InvoiceItems as $Item)
                                    <tr data-id="{{$rowCount}}">
                                        <td>{{$rowCount}}</td>
                                        <td >
                                            <div class="bt-df-checkbox">
                                            @if ($Item->store_item == 1)
                                                نعم
                                            @else
                                                لا
                                            @endif
                                            </div>
                                        </td>
                                        <td>
                                            {{$Item->item_text}}
                                        </td>
                                        <td>
                                            <div class="input-mark-inner mg-b-22">
                                            <input type="number" disabled id="itemprice{{$rowCount}}" value="{{$Item->item_price}}" class="form-control item_price" placeholder="">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-mark-inner mg-b-22">
                                            <input type="number" disabled  id="qty{{$rowCount}}" value="{{$Item->item_quantity}}" class="form-control item_quantity" placeholder="">
                                            </div>
                                        </td>
                                        <td id="total{{$rowCount}}" class="total_item_price">
                                            {{$Item->total_item_price}}
                                        </td>
                                        <td>
                                            <div class="input-mark-inner mg-b-22">
                                                <input type="number" disabled id="discount{{$rowCount}}" value="{{$Item->item_discount}}" class="form-control item_discount" placeholder="">
                                            </div>
                                        </td>
                                        <td id="totalafterdiscount{{$rowCount}}" class="total_after_discounts">
                                            {{$Item->total_after_discounts}}
                                        </td>
                                        <td>
                                        <div class="bt-df-checkbox">
                                            <input class="radio-checked tax_exemption"
                                            @if ($Item->tax_exemption == 1)
                                            checked
                                            @endif
                                            type="checkbox" disabled id="optionsRadioscheck{{$rowCount}}" name="optionsRadioscheck{{$rowCount}}">
                                        </div>
                                        </td>
                                        <td id="totalvat{{$rowCount}}" class="input-mark-inner mg-b-22 vat_tax_value">
                                            {{$Item->vat_tax_value}}
                                        </td>
                                        <td  id="totalcit{{$rowCount}}" class="input-mark-inner mg-b-22 comm_industr_tax">
                                            {{$Item->comm_industr_tax}}
                                        </td>
                                        <td>
                                        <div id="nettotal{{$rowCount}}" class="input-mark-inner mg-b-22 net_value">
                                            {{$Item->net_value}}
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        --$rowCount;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Static Table End -->
@endsection

@section('modal')
<!--Modal-->

        <!--/Modal-->

        @endsection
        @section('scripts')
        @endsection
