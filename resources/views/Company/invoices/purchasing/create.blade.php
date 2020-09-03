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
        <span class="bread-blod"> إضافة المشتريات </span>
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
                        </div>-->
                    <a href="{{url('/Invoices/Purchasing')}}" class="btn btn-primary waves-effect waves-light">إلغاء</a>

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
                                                    <input type="text" id="invoice_no" class="form-control" placeholder="">
                                                    <input type="hidden" id="compid" class="form-control" value="{{$Company->id}}" placeholder="">
                                                    <input type="hidden" id="invoice_type" class="form-control" value="0" placeholder="">
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
                                                    <input type="date" id="inv_date" class="form-control" placeholder="">
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
                                                <input class="" type="radio"  value="1" id="optionsRadios9" name="optionsRadios10">
                                                    <label><b> معتمد </b></label>
                                                <input class="radio-checked " type="radio" checked="checked" value="0" id="optionsRadios10" name="optionsRadios10">
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
                                                <input class="radio-checked" type="radio" checked="" value="101" id="optionsRadios1" name="optionsRadiosser1">
                                                    <label><b> توريد </b></label>
                                                    <input class="" type="radio" value="100" id="optionsRadios2" name="optionsRadiosser1">
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
                                                <input class="radio-checked" type="radio" checked="" value="100" id="optionsRadios3" name="optionsRadiostype4">
                                                    <label><b> سلع </b></label>
                                                    <input class="" type="radio" value="101" id="optionsRadios1" name="optionsRadiostype4">
                                                    <label><b> خدمات </b></label>
                                                    <input class="" type="radio"  value="102" id="optionsRadios2" name="optionsRadiostype4">
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
                                                    <input class="radio-checked" type="radio" checked="" value="101" id="optionsRadios1" name="optionsRadiospur3">
                                                    <label><b> محلي </b></label>
                                                    <input class="" type="radio" value="100" id="optionsRadios2" name="optionsRadiospur3">
                                                    <label><b> مستورد </b></label>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <label class="login2">المدفوعات</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div id="type" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">

                                                <select data-placeholder="Choose a supplier..." class="chosen-select" id="person_id" tabindex="-1">
                                                    <option disabled selected>أختر المورد</option>
                                                    @foreach ($Suppliers as $Supplier)
                                                        <option value="{{$Supplier->id}}">{{$Supplier->person_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                <div class="bt-df-checkbox">
                                                    <input class="radio-checked" type="radio" checked="" value="101" id="optionsRadios1 person_type_id" name="person">
                                                    <label><b> موردين </b></label>
                                                    <input class="" type="radio" value="102" id="optionsRadios2" name="person">
                                                    <label><b> موظفين </b></label>
                                                    <input class="" type="radio" value="other" id="optionsRadios2" name="person">
                                                    <label><b> أخري </b></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 shadow mg-b-15">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                                    <div class="input-mark-inner mg-b-22">
                                                        <input type="text" id="total_items_price" readonly class="form-control" placeholder="">
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
                                                        <input type="text" id="total_items_discount" readonly class="form-control" placeholder="">
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
                                                        <input type="text" id="total_vat" readonly class="form-control" placeholder="">
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
                                                        <input type="text" id="total_comm_industr_tax" readonly class="form-control" placeholder="">
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
                                                        <input type="text" id="total_price_post_discounts" readonly class="form-control" placeholder="">
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
                                                        <input type="text" id="net_invoice_total" readonly class="form-control" placeholder="">
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
                            <button id="add" onclick="ajax_row('{{url('Invoice/Purchasing/AddRow')}}')" class="btn btn-primary waves-effect waves-light">إضافة صنف</button>
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
        <script>
             //Start row functions
             function editSelectVal(index) {
                debugger;
                var select_value = $('#select'+index+' option:selected').val();
                $('#select'+index+' option:selected').siblings().attr('selected',false);
                $('#select'+index+' option:selected').attr('selected','selected');
            }
            function editVal(index){
                debugger;
                var input_value = $("#item_arabic_name"+index).val();
                $("#item_arabic_name"+index).attr('value',input_value);
            }
            function editRadioStored(index) {
                debugger;
                // alert(checked);
                var parent = $("#item_arabic_name"+index);
                var select = $("#select"+index);

                if($('input[type=radio][name=optionsRadios'+index+']:checked').val() == 'no'){
                    $(parent).css('display','inline-block').attr('disabled',false).removeClass('select2-offscreen');
                    $(select).css('display','none').attr('disabled','disabled');
                }else{
                    $(parent).css('display','none').attr('disabled','disabled');
                    $(select).css('display','inline-block').attr('disabled',false).removeClass('select2-offscreen');
                }
                $("input[type=radio][name=optionsRadios"+index+"]:checked").siblings().attr('checked',false);
                $("input[type=radio][name=optionsRadios"+index+"]:checked").attr('checked','checked');
            }
            function enterForRow(e, index) {
                if(e.keyCode == 13) {
                    ajax_row('{{url('Invoice/Purchasing/AddRow')}}');
                }
            }
            function deleteRow(index) {
                $('tr[data-id='+index+']').remove();
                var trs = $('#puchasetable > tbody').html();
                $('#puchasetable').bootstrapTable('destroy');
                $('#rows').html(trs);
                $('#puchasetable').bootstrapTable();
                headCalculations(index);
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
                    debugger;
                    total += parseFloat($('#total'+index).text());
                    total_after_discounts += parseFloat($('#totalafterdiscount'+index).text());
                    vat_tax_value += parseFloat($('#totalvat'+index).text());
                    comm_industr_tax += parseFloat($('#totalcit'+index).text());
                    net_value += parseFloat($('#nettotal'+index).text());
                    total_discount += parseFloat($('#discount'+index).val());
                    console.log(total);
                    console.log(total_after_discounts);
                    console.log(vat_tax_value);
                    console.log(comm_industr_tax);
                    console.log(net_value);
                    console.log(total_discount);
                    --index;
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
            function saveInvoice() {
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
                        invoice_no: $('#invoice_no').val(),
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
                    }
                var details = [];
                var i = $('#puchasetable > tbody  > tr').length;
                $('#puchasetable > tbody  > tr').each(function(index) {
                    ++index;
                    // alert($('input[type=radio][name=optionsRadios'+i+']:checked').val());
                    // alert($('#item_arabic_name'+i+'').val());
                    debugger
                    if($('input[type=radio][name=optionsRadios'+i+']:checked').val() == 'no'){
                        var item_arabic_name = $('#item_arabic_name'+i+'').val();
                        var item_id = null;
                    }else{
                        var item_arabic_name = $('#select'+i+' option:selected').text();
                        var item_id = $('#select'+i+' option:selected').val();
                    }
                    if($("#optionsRadioscheck"+i+"").is(':checked') == true){
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
                        is_stored : $('input[type=radio][name=optionsRadios'+i+']:checked').val(),
                        item_text : item_arabic_name,
                        item_id : item_id,
                        item_price : $(this).find('.item_price').val(),
                        item_quantity : $(this).find('.item_quantity').val(),
                        tax_exemption : tax_exemption,
                    }
                    details.push(detail);
                    --i;
                });
                console.table(master);
                console.table(details);
                $.ajax({
                type:'POST',
                url:"{{url('/Invoices/Purchasing/Create')}}",
                data:{
                    "_token": "{{ csrf_token() }}",
                    invoice : master,
                    invoice_items : details,
                },
                success:function(data) {
                    window.location.href = data;
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
                });
            }

            $('input[type=radio][name=optionsRadios10]').on('change',function(){
                $('#puchasetable > tbody  > tr').each(function(index) {
                    ++index;
                    var price = $('#itemprice'+index).val();
                    var qty = $('#qty'+index).val();

                    var discount = $('#discount'+index).val();

                    var cit = $('#cit').val();
                    var vat = $('#vat').val();
                    var totalAfterDiscount = ((price * qty) - discount);
                    if($('input[type=radio][name=optionsRadios10]:checked').val() == 0){;
                        cit =0;
                        vat = 0;
                    }
                    if($("input[name=optionsRadioscheck"+index+"]").is(':checked') == true){
                        cit =0;
                        vat = 0;
                    }
                        $('#totalvat'+index).text((totalAfterDiscount*(vat/100)).toFixed(2));
                        $('#totalcit'+index).text((totalAfterDiscount*(cit/100)).toFixed(2));
                        $('#nettotal'+index).text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
                        headCalculations();

                });
            })
            $('input[type=radio][name=person]').change(function() {
                    var compid = $('#compid').val();
                    var url = "";
                    if (this.value == '102') {
                        url = "{{url('/Invoice/Purchasing/Add/fetch/Employees')}}";
                        fetchPersons(url, compid)
                    }
                    else if (this.value == '101') {
                        url = "{{url('/Invoice/Purchasing/Add/fetch/Suppliers')}}";
                        fetchPersons(url, compid)
                    }else{
                        // $('#type').html('<input type="text" name="person_name" class="form-control" placeholder="">')
                        url = "{{url('/Invoice/Purchasing/Add/fetch/Other')}}";
                        fetchPersons(url, compid)
                    }

            });

        $('input[type=radio][name=optionsRadiosser1]').change(function(){
                if(this.value == 101){
                    $('#cit').val("{{$CIT_Items->item_value}}")
                }else{
                    $('#cit').val("{{$CIT_Services->item_value}}")
                }
                $('#puchasetable > tbody  > tr').each(function(index) {
                    ++index;
                    var price = $('#itemprice'+index).val();
                    var qty = $('#qty'+index).val();

                    var discount = $('#discount'+index).val();

                    var cit = $('#cit').val();
                    var vat = $('#vat').val();
                    var totalAfterDiscount = ((price * qty) - discount);
                    if($('input[type=radio][name=optionsRadios10]:checked').val() == 0){;
                        cit =0;
                        vat = 0;
                    }
                    if($("input[name=optionsRadioscheck"+index+"]").is(':checked') == true){
                        cit =0;
                        vat = 0;
                    }
                        $('#totalvat'+index).text((totalAfterDiscount*(vat/100)).toFixed(2));
                        $('#totalcit'+index).text((totalAfterDiscount*(cit/100)).toFixed(2));
                        $('#nettotal'+index).text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
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
                        $('#type').html(data);
                        $('.chosen-select').select2();
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
                });
        }
        </script>
        @endsection
