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
        <span class="bread-blod"> تعديل المشتريات </span>
    </li>
</ul>
@endsection

@section('content')
@php
    if($Invoice->approved == 1){
        $approved_yes = 'checked="checked"';
    }else{
        $approved_no = 'checked="checked"';
    }
    if($Invoice->service_type_id == 101){
        $supply = 'checked="checked"';
    }else{
        $service = 'checked="checked"';
    }
    if($Invoice->outgoing_type_id == 100){
        $items = 'checked="checked"';
    }elseif ($Invoice->outgoing_type_id == 101) {
        $serve = 'checked="checked"';
    }else{
        $machine = 'checked="checked"';
    }
    if($Invoice->purchasing_type_id == 100){
        $import = 'checked="checked"';
    }else{
        $local = 'checked="checked"';
    }
    if($Person->person_type_id == 100){
        $client = 'checked="checked"';
        $type = 'عميل';
    }
    elseif ($Person->person_type_id == 101) {
        $supplier = 'checked="checked"';
        $type = 'مورد';
    }elseif($Person->person_type_id == 102){
        $employee = 'checked="checked"';
        $type = 'موظف';
    }else{
        $other = 'checked="checked"';
        $type = 'أخرى';
    }
@endphp
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mg-b-23">
                    <div class="">
                        <!--<div class="btn-back">
                            <a href="#">حــفـظ</a>
                        </div>-->
                    <a href="{{url('/Invoices/Sales')}}" class="btn btn-primary waves-effect waves-light">إلغاء</a>

                        <button class="btn btn-primary waves-effect waves-light" onclick="saveInvoice()">حــفـظ</button>
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
                            <h1 style="direction:rtl">المشتريات</h1><br />
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
                                                <input type="text" id="invoice_no" value="{{$Invoice->serial}}" class="form-control" placeholder="">
                                                    <input type="hidden" id="compid" class="form-control" value="{{$Company->id}}" placeholder="">
                                                    <input type="hidden" id="invoice_type" class="form-control" value="1" placeholder="">
                                                    <input type="hidden" id="inv_id" class="form-control" value="{{$Invoice->id}}" placeholder="">
                                                    <input type="hidden" id="vat" class="form-control" value="{{$VAT->item_value}}" placeholder="">
                                                    <input type="hidden" id="cit" class="form-control" value="{{$CIT_Items->item_value}}" placeholder="">

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
                                                <input type="date" value="{{date('Y-m-d', strtotime($Invoice->inv_date))}}" id="inv_date" class="form-control" placeholder="">
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
                                                <input class="" type="radio" {{$approved_yes ?? ''}} value="1" id="optionsRadios9" name="optionsRadios10">
                                                    <label><b> معتمد </b></label>
                                                <input class="radio-checked " type="radio" {{$approved_no ?? ''}} value="0" id="optionsRadios10" name="optionsRadios10">
                                                    <label><b> غير معتمد </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">الحالة</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                <input class="radio-checked" type="radio" {{$supply ?? ''}} value="101" id="optionsRadios1" name="optionsRadiosser1">
                                                    <label><b> توريد </b></label>
                                                    <input class="" type="radio" value="100" {{$service ?? ''}} id="optionsRadios2" name="optionsRadiosser1">
                                                    <label><b> خدمة </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">الخدمات</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                <input class="radio-checked" {{$items ?? ''}} type="radio" value="100" id="optionsRadios3" name="optionsRadiostype4">
                                                    <label><b> سلع </b></label>
                                                    <input class="" type="radio" {{$serve ?? ''}} value="101" id="optionsRadios1" name="optionsRadiostype4">
                                                    <label><b> خدمات </b></label>
                                                    <input class="" type="radio" {{$machine ?? ''}} value="102" id="optionsRadios2" name="optionsRadiostype4">
                                                    <label><b> ألات ومعدات </b></label>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">نوع المصروف</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" {{$local ?? ''}} type="radio" checked="" value="101" id="optionsRadios1" name="optionsRadiospur3">
                                                    <label><b> محلي </b></label>
                                                    <input class="" type="radio" value="100" {{$import ?? ''}} id="optionsRadios2" name="optionsRadiospur3">
                                                    <label><b> مستورد </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">المدفوعات</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                            <input type="text" value="{{$Person->person_name}}" name="person_name" id="other_text" class="form-control"
                                                @if ($Person->person_type_id != 'other')
                                                style="display: none;"
                                                disabled
                                                @endif
                                                placeholder="">
                                                <select data-width="100%" id="person_id" name="person_id" class="selectpicker"
                                                @if ($Person->person_type_id == 'other')
                                                style="display: none;"
                                                disabled
                                                @endif
                                                data-live-search="true" tabindex="-1">
                                                    <option disabled selected>أختر {{$type ?? ''}}</option>
                                                        @foreach ($Persons as $InvPerson)
                                                            <option
                                                            @if ($Invoice->person_id == $InvPerson->id)
                                                                selected
                                                            @endif
                                                            value="{{$InvPerson->id}}">{{$InvPerson->person_name}}</option>
                                                        @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" {{$client ?? ''}} type="radio" checked="" value="100" id="optionsRadios1 person_type_id" name="person">
                                                    <label><b> عملاء </b></label>
                                                    <input class="" type="radio" {{$employee ?? ''}} value="102" id="optionsRadios2" name="person">
                                                    <label><b> موظفين </b></label>
                                                    <input class="" type="radio" {{$other ?? ''}} value="other" id="optionsRadios2" name="person">
                                                    <label><b> أخري </b></label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon">جم</div>
                                                          <input value="{{$Invoice->total_items_price}}" type="text" id="total_items_price" readonly class="form-control" placeholder="">
                                                        </div>
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
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon">جم</div>
                                                          <input value="{{$Invoice->total_items_discount}}" type="text" id="total_items_discount" readonly class="form-control" placeholder="">
                                                        </div>
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
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon">جم</div>
                                                          <input value="{{$Invoice->total_vat}}" type="text" id="total_vat" readonly class="form-control" placeholder="">
                                                        </div>
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
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon">جم</div>
                                                          <input value="{{$Invoice->total_comm_industr_tax}}" type="text" id="total_comm_industr_tax" readonly class="form-control" placeholder="">
                                                        </div>
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
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon">جم</div>
                                                          <input value="{{$Invoice->total_price_post_discounts}}" type="text" id="total_price_post_discounts" readonly class="form-control" placeholder="">
                                                        </div>
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
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                                        <div class="input-group">
                                                          <div class="input-group-addon">جم</div>
                                                          <input value="{{$Invoice->net_invoice}}" type="text" id="net_invoice_total" readonly class="form-control" placeholder="">
                                                        </div>
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
                                                        <textarea id="notes" class="form-control"></textarea>
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

                            </div>
                            <style>
                            th ,td{
                            text-align:center !important;
                            }
                            </style>
                            <h3 style="text-align:right">الأصناف</h3>

                            <div style="direction:rtl;text-align:right;"><input type="text" id="search" class="form-control" style="display: inline-block;width:200px" placeholder="بحث">

                            <button id="add" style="float: left;" onclick="ajax_row('{{url('Invoice/Purchasing/AddRow')}}')" class="btn btn-primary waves-effect waves-light">إضافة صنف</button></div>
                            <br>
                            <table class="table-striped" id="puchasetable"
                            data-locale="ar-SA"
                            data-pagination="false"
                            data-pagination-pre-text="السابق"
                            data-pagination-next-text="التالي"
                            data-show-export="true"
                            data-minimum-count-columns="2"
                            data-page-list="[10, 25, 50, 100, all]"
                            data-sort-name="index"
                            data-sort-order="asc"
                            style="direction:rtl"
                            data-toggle="table"
                                data-key-events="true"
                                data-resizable="true"
                                data-cookie="true"
                                data-toolbar="#toolbar"
                                data-show-fullscreen="true"
                                >
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
        @if ($Person->person_type_id == 'other')
            <script>
                $('.selectpicker').selectpicker('refresh');
                $(document).ready(function(){

                    $('.dropdown.bootstrap-select.bs3').css({'display':'none'});
                })
            </script>
        @endif
        <script>
            if ($('input[type=radio][name=optionsRadiosser1]:checked').val() == 101) {
                $('#cit').val("{{$CIT_Items->item_value}}")
            }else{
$('#cit').val("{{$CIT_Services->item_value}}")
            }
            fetch_items("{{url('/Invoices/Purchasing/FetchItems')}}");
            $('#puchasetable #optionsRadios').focus();


            function saveInvoice() {
                debugger;
                var person_type = $('input[type=radio][name=person]:checked').val();
                if (person_type == 'other') {
                    var person_id = null;
                    var person_name = $('#other_text').val();
                } else {
                    var person_id = $('#person_id option:selected').val();
                    var person_name = $('#person_id option:selected').text();
                }
                var master = {
                        invoice_type : $('#invoice_type').val(),
                        inv_date:$('#inv_date').val(),
                        approved:$('input[type=radio][name=optionsRadios10]:checked').val(),
                        serial: $('#invoice_no').val(),
                        person_id:person_id,
                        person_name:person_name,
                        company_id:$('#compid').val(),
                        outgoing_type_id:$('input[type=radio][name=optionsRadiostype4]:checked').val(),
                        purchasing_type_id:$('input[type=radio][name=optionsRadiospur3]:checked').val(),
                        service_type_id:$('input[type=radio][name=optionsRadiosser1]:checked').val(),
                        total_items_price:$('#total_items_price').val(),
                        total_items_discount:$('#total_items_discount').val(),
                        total_price_post_discounts:$('#total_price_post_discounts').val(),
                        total_vat:$('#total_vat').val(),
                        total_comm_industr_tax:$('#total_comm_industr_tax').val(),
                        net_invoice:$('#net_invoice_total').val(),
                        notes:$('#notes').val(),
                        inv_id : $('#inv_id').val(),
                    }
                    var newDetails = [];
                    var oldDetails = [];
                    // var i = $('#puchasetable > tbody  > tr').length;
                $('#puchasetable > tbody  > tr').each(function(index) {
                    var row_num = $(this).attr('data-id');
                    debugger;
                    ++index;
                    // alert($('input[type=radio][name=optionsRadios'+index+']:checked').val());
                    if($('input[type=radio][name=optionsRadios'+row_num+']:checked').val() == 'no'){
                        var item_arabic_name = $('#item_arabic_name'+row_num+'').val();
                        var item_id = null;
                    }else{
                        var item_arabic_name = $('#select'+row_num+' option:selected').text();
                        var item_id = $('#select'+row_num+' option:selected').val();
                    }
                    if($("#optionsRadioscheck"+row_num+"").is(':checked') == true){
                        var tax_exemption = 1;
                    }else{
                        var tax_exemption = 0;
                    }
                    // alert(item_arabic_name);
                    // alert(tax_exemption);
                    var detail = {
                        total_item_price : parseFloat($(this).children('.total_item_price').text()),
                        total_after_discounts : parseFloat($(this).children('.total_after_discounts').text()),
                        vat_tax_value : parseFloat($(this).children('.vat_tax_value').text()),
                        comm_industr_tax : parseFloat($(this).children('.comm_industr_tax').text()),
                        net_value : parseFloat($(this).find('.net_value').text()),
                        item_discount : parseFloat($(this).find('.item_discount').val()),
                        is_stored : $('input[type=radio][name=optionsRadios'+row_num+']:checked').val(),
                        item_text : item_arabic_name,
                        item_id : item_id,
                        item_price : $(this).find('.item_price').val(),
                        item_quantity : $(this).find('.item_quantity').val(),
                        tax_exemption : tax_exemption,
                        inv_id : $('#inv_id').val(),
                    }
                    if($('#inv_type'+row_num).val() == 'update'){
                        detail.type = 'update';
                        // detail.inv_id = $('#inv_id').val();
                        detail.id = $('#id'+row_num).val();
                        oldDetails.push(detail);
                    }else{
                        detail.type = 'new';
                        newDetails.push(detail);
                    }
                    // --i;
                });

                console.table(master);
                console.log('new');
                console.table(newDetails);
                console.log('update');
                console.table(oldDetails);
                $.ajax({
                type:'POST',
                url:"{{url('/Invoices/Sales/Update')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    invoice : master,
                    new_invoice_items : newDetails,
                    old_invoice_items : oldDetails,
                },
                success:function(data) {
                    window.location.href = data;
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
                });
            }
             //Start row functions
             function DeleteInvoiceItem(id,index) {
                debugger;
                $("#del"+index).modal('hide');
                $('.modal-backdrop.fade.in').remove();
                $('.modal-open').css('overflow-y','scroll');
                $.ajax({
                    type:'GET',
                    url:"{{url('/Invoices/Purchasing/Remove/Item')}}",
                    data:{
                        id : id,
                        compid : $('#compid').val(),
                    },
                    success:function(data) {
                        debugger;
                        $('tr[data-id='+index+']').remove();
                        var trs = $('#puchasetable > tbody').html();
                        $('#puchasetable').bootstrapTable('destroy');
                        $('#rows').html(trs);
                        $('#puchasetable').bootstrapTable();
                        headCalculations(index);
                        $('#puchasetable > tbody  > tr').each(function(index) {
                            var row_num = $(this).attr('data-id');
                            $('#hashed'+row_num).text(++index);
                            debugger;
                            // var isLastElement = index == $('#puchasetable > tbody  > tr').length -1;
                            if ($('#select' + row_num).hasClass("select2-offscreen")) {
                                // Select2 has been initialized
                                $('#s2id_select' + row_num).remove();
                                var _select = '#select' + row_num;
                                $(_select).select2();
                            }
                            else{
                                $('#select' + row_num).select2();
                            }
                            if (index == ($('#puchasetable > tbody  > tr').length)) {
                                $("#optionsRadios"+row_num+"sec").focus();
                            }
                            if($('input[type=radio][name=optionsRadios'+row_num+']:checked').val() == 'no'){
                                var design_select = $('#s2id_select'+row_num);
                                $(design_select).css('display','none').attr('disabled','disabled');
                            }
                        });
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                });
                headCalculations(index);
            }
             function editSelectVal(index) {
                debugger;
                var select_value = $('#select'+index+' option:selected').val();
                var select_text = $('#select'+index+' option:selected').text();
                $('#select'+index+' option:selected').siblings().attr('selected',false);
                $('#select'+index+' option:selected').attr('selected','selected');
                $('#select'+index).attr('value',select_value);
                $('#item_val'+index).text(select_text);
            }
            function editVal(index){
                debugger;
                var input_value = $("#item_arabic_name"+index).val();
                $("#item_arabic_name"+index).attr('value',input_value);
                $('#item_val'+index).text(input_value);
            }
            function editRadioStored(index) {
                debugger;
                // alert(checked);
                var parent = $("#item_arabic_name"+index);
                var select = $("#select"+index);
                var design_select = $('#s2id_select'+index);

                if($('input[type=radio][name=optionsRadios'+index+']:checked').val() == 'no'){
                    $(parent).css('display','inline-block').attr('disabled',false);
                    $(select).attr('disabled','disabled');
                    $(design_select).css('display','none').attr('disabled','disabled');
                }else{
                    $(parent).css('display','none').attr('disabled','disabled');
                    $(select).attr('disabled',false).addClass('select2-offscreen');
                    $(design_select).css('display','inline-block').attr('disabled',false);
                }
                $('input[type=radio][name=optionsRadios'+index+']:checked').siblings().attr('checked',false);
                $('input[type=radio][name=optionsRadios'+index+']:checked').attr('checked','checked');
            }
            function enterForRow(e, index) {
                if(e.keyCode == 13) {
                    ajax_row('{{url('Invoice/Purchasing/AddRow')}}');
                }
            }
            function updateTxtVal(index) {
                var txt = $('#item_arabic_name'+index).val();
                $('#item_arabic_name'+index).attr('value',txt);
            }
            function deleteRow(index) {
                $('tr[data-id='+index+']').remove();
                var trs = $('#puchasetable > tbody').html();
                $('#puchasetable').bootstrapTable('destroy');
                $('#rows').html(trs);
                $('#puchasetable').bootstrapTable();
                headCalculations(index);
                $('#puchasetable > tbody  > tr').each(function(index) {
                    var row_num = $(this).attr('data-id');
                    $('#hashed'+row_num).text(++index);
                    debugger;
                    // var isLastElement = index == $('#puchasetable > tbody  > tr').length -1;
                    if ($('#select' + row_num).hasClass("select2-offscreen")) {
                        // Select2 has been initialized
                        $('#s2id_select' + row_num).remove();
                        var _select = '#select' + row_num;
                        $(_select).select2();
                    }
                    else{
                        $('#select' + row_num).select2();
                    }
                    if (index == ($('#puchasetable > tbody  > tr').length)) {
                        $("#optionsRadios"+row_num+"sec").focus();
                    }
                    if($('input[type=radio][name=optionsRadios'+x+']:checked').val() == 'no'){
                        var design_select = $('#s2id_select'+x);
                        $(design_select).css('display','none').attr('disabled','disabled');
                    }
                });
            }
            function taxExemptionCheck(index) {
                debugger;
                var price = $("#itemprice"+index+"").val();
                var qty = $("#qty"+index+"").val();
                var discount = $("#discount"+index+"").val();
                var cit = $('#cit').val()
                var vat = $('#vat').val();
                var totalAfterDiscount = ((price * qty) - discount);
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("#optionsRadioscheck"+index).is(':checked') == false){
                    $("#totalvat"+index).text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit"+index).text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal"+index).text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
                }else{
                    $("#totalvat"+index+"").text(0);
                    $("#totalcit"+index+"").text(0);
                    $("#nettotal"+index+"").text(totalAfterDiscount);

                }
                if($("#optionsRadioscheck"+index).is(':checked') == true){
                    $("#optionsRadioscheck"+index).attr('checked','checked');
                }else{
                    $("#optionsRadioscheck"+index).attr('checked',false);
                }

                headCalculations(index);
            }
            function itemPrice(index) {
                var price = $("#itemprice"+index+"").val();
                var qty = $("#qty"+index+"").val();
                // total(price, qty);
                $("#total"+index+"").text(price * qty);
                var discount = $("#discount"+index+"").val();
                $("#totalafterdiscount"+index+"").text(((price * qty) - discount));
                var cit = $('#cit').val();
                var vat = $('#vat').val();
                var totalAfterDiscount = ((price * qty) - discount);
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("#optionsRadioscheck"+index).is(':checked') == false){
                    $("#totalvat"+index+"").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit"+index+"").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal"+index+"").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

                }else{
                    $("#totalvat"+index+"").text(0);
                    $("#totalcit"+index+"").text(0);
                    $("#optionsRadioscheck"+index).attr('checked',true);
                    $("#nettotal"+index+"").text((totalAfterDiscount));
                }
                headCalculations(index);
                $("#itemprice"+index).attr('value',price);
            }
            function itemQty(index) {
                var price = $("#itemprice"+index+"").val();
                var qty = $("#qty"+index+"").val();
                var discount = $("#discount"+index+"").val();
                var cit = $('#cit').val();
                var vat = $('#vat').val();
                $("#total"+index+"").text(price * qty);
                $("#totalafterdiscount"+index+"").text(((price * qty) - discount));
                var totalAfterDiscount = ((price * qty) - discount);
                // alert($('input[type=radio][name=optionsRadios10]:checked').val());
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("#optionsRadioscheck"+index).is(':checked') == false){
                    $("#totalvat"+index+"").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit"+index+"").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal"+index+"").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

                }else{
                    $("#totalvat"+index+"").text(0);
                    $("#totalcit"+index+"").text(0);
                    $("#optionsRadioscheck"+index).attr('checked',true);
                    $("#nettotal"+index+"").text((totalAfterDiscount));
                }
                headCalculations(index);
                $("#qty"+index).attr('value',qty);
            }
            function itemDiscount(index) {
                var price = $("#itemprice"+index+"").val();
                var qty = $("#qty"+index+"").val();
                var discount = $("#discount"+index+"").val();
                var cit = $('#cit').val();
                var vat = $('#vat').val();
                $("#total"+index+"").text(price * qty);
                $("#totalafterdiscount"+index+"").text(((price * qty) - discount));
                var totalAfterDiscount = ((price * qty) - discount);
                // alert($('input[type=radio][name=optionsRadios10]:checked').val());
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("#optionsRadioscheck"+index).is(':checked') == false){
                    $("#totalvat"+index+"").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit"+index+"").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal"+index+"").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

                }else{
                    $("#totalvat"+index+"").text(0);
                    $("#totalcit"+index+"").text(0);
                    $("#optionsRadioscheck"+index).attr('checked',true);
                    $("#nettotal"+index+"").text((totalAfterDiscount));
                }
                headCalculations(index);
                $("#discount"+index).attr('value',discount);
            }
            //End or row functions
            // headCalculations(index);
            function headCalculations(index) {
                    index = $('#puchasetable > tbody > tr').length;
                    var total = 0;
                    var total_after_discounts = 0;
                    var vat_tax_value = 0;
                    var comm_industr_tax = 0;
                    var net_value = 0;
                    var total_discount = 0;
                $('#puchasetable > tbody  > tr').each(function() {
                    var row_num = $(this).attr('data-id');
                    debugger;
                    total += parseFloat($('#total'+row_num).text());
                    total_after_discounts += parseFloat($('#totalafterdiscount'+row_num).text());
                    vat_tax_value += parseFloat($('#totalvat'+row_num).text());
                    comm_industr_tax += parseFloat($('#totalcit'+row_num).text());
                    net_value += parseFloat($('#nettotal'+row_num).text());
                    total_discount += parseFloat($('#discount'+row_num).val());
                    console.log(total);
                    console.log(total_after_discounts);
                    console.log(vat_tax_value);
                    console.log(comm_industr_tax);
                    console.log(net_value);
                    console.log(total_discount);
                    // --index;
                })
                console.log(total_discount);
                $('#total_items_price').val(total.toFixed(2));
                $('#total_items_discount').val(total_discount.toFixed(2));
                $('#total_vat').val(vat_tax_value.toFixed(2));
                $('#total_comm_industr_tax').val(comm_industr_tax.toFixed(2));
                $('#total_price_post_discounts').val(total_after_discounts.toFixed(2));
                $('#net_invoice_total').val(net_value.toFixed(2));
            }
            //--------------------
            $('input[type=radio][name=optionsRadios10]').on('change',function(){
                $('#puchasetable > tbody  > tr').each(function(index) {
                    var row_num = $(this).attr('data-id');
                    // ++index;
                    var price = $('#itemprice'+row_num).val();
                    var qty = $('#qty'+row_num).val();

                    var discount = $('#discount'+row_num).val();

                    var cit = $('#cit').val();
                    var vat = $('#vat').val();
                    var totalAfterDiscount = ((price * qty) - discount);
                    if($('input[type=radio][name=optionsRadios10]:checked').val() == 0){;
                        cit =0;
                        vat = 0;
                    }
                    if($("input[name=optionsRadioscheck"+row_num+"]").is(':checked') == true){
                        cit =0;
                        vat = 0;
                    }
                        $('#totalvat'+row_num).text((totalAfterDiscount*(vat/100)).toFixed(2));
                        $('#totalcit'+row_num).text((totalAfterDiscount*(cit/100)).toFixed(2));
                        $('#nettotal'+row_num).text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
                        headCalculations();

                });
            })
            $('input[name=person]').change(function() {
                // alert($('input[name=person]:checked').val());
                if($('input[name=person]:checked').val() == 100){
                    fetchPersons("{{url('/Invoice/Sales/Add/fetch/Clients')}}","{{session('company_id')}}");
                }else if($('input[name=person]:checked').val() == 101){
                    fetchPersons("{{url('/Invoice/Sales/Add/fetch/Suppliers')}}","{{session('company_id')}}");
                }else if($('input[name=person]:checked').val() == 102){
                    fetchPersons("{{url('/Invoice/Sales/Add/fetch/Employees')}}","{{session('company_id')}}");
                }else{
                    $('.dropdown.bootstrap-select.bs3').css({'display':'none'});
                    $('#person_id').attr('disabled','disabled');
                    //fetchPersons("{{url('/Cash/Sales/Others')}}","{{session('company_id')}}");
                    $('#other_text').css({'display':'block'}).attr('disabled',false);
                }
            })

        $('input[type=radio][name=optionsRadiosser1]').change(function(){
                if(this.value == 101){
                    $('#cit').val("{{$CIT_Items->item_value}}")
                }else{
                    $('#cit').val("{{$CIT_Services->item_value}}")
                }
                $('#puchasetable > tbody  > tr').each(function(index) {
                    var row_num = $(this).attr('data-id');
                    ++index;
                    var price = $('#itemprice'+row_num).val();
                    var qty = $('#qty'+row_num).val();

                    var discount = $('#discount'+row_num).val();

                    var cit = $('#cit').val();
                    var vat = $('#vat').val();
                    var totalAfterDiscount = ((price * qty) - discount);
                    if($('input[type=radio][name=optionsRadios10]:checked').val() == 0){;
                        cit =0;
                        vat = 0;
                    }
                    if($("input[name=optionsRadioscheck"+row_num+"]").is(':checked') == true){
                        cit =0;
                        vat = 0;
                    }
                        $('#totalvat'+row_num).text((totalAfterDiscount*(vat/100)).toFixed(2));
                        $('#totalcit'+row_num).text((totalAfterDiscount*(cit/100)).toFixed(2));
                        $('#nettotal'+row_num).text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
                        headCalculations();

                });
            })
        function fetchPersons(url, compid) {
                $.ajax({
                    type:'GET',
                    url:url,
                    data:{
                        compid : compid
                    },
                        success:function(data) {
                            $('#other_text').css({'display':'none'}).attr('disabled','disabled');
                            $('.dropdown.bootstrap-select.bs3').css({'display':'block'});
                            $('#person_id').attr('disabled',false);
                            $('#person_id').html(data);
                            $('#person_id').selectpicker('refresh');
                    },
                    error: function (request, status, error) {
                        console.log(request.responseText);
                    }
                    });
            }
        </script>
                            {{-- @foreach ($Invoice->invoice_items as $i => $inv_item_script)
                            @php
                                ++$i;
                            @endphp


                            @endforeach --}}
        @endsection
