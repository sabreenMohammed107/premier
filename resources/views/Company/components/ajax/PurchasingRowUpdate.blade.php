@php
    $counter = count($Invoice_Items);
@endphp
@foreach ($Invoice_Items as $i => $InvItem)
@php


 if($InvItem->store_item == 1){
    $checked_yes = 'checked="checked"';
    $checked_no = '';
    $d_none_inp = 'style=display:none; disabled';
    $d_none_sel = 'style=display:inline-block;';
 }else{
    $checked_no = 'checked="checked"';
    $checked_yes = '';
    $d_none_sel = 'style=display:none; disabled';
    $d_none_inp = 'style=display:inline-block;';
 }
@endphp
<tr data-id="{{$counter}}">
<td>{{$counter}}</td>
    <td >
        <div class="bt-df-checkbox">
        <input id="inv_type{{$counter}}" type="hidden" name="" class="inv_type" value="update">
        <input id="id{{$counter}}" type="hidden" name="" class="id" value="{{$InvItem->id}}">
        <input class="isStored" {{$checked_no ?? ''}} type="radio" value="no" id="optionsRadios{{$counter}}" name="optionsRadios{{$counter}}">
            <label><b> لا </b></label>
            <input class="radio-checked isStored" {{$checked_yes ?? ''}} type="radio"  value="yes" id="optionsRadios{{$counter}}sec" name="optionsRadios{{$counter}}">
            <label><b> نعم </b></label>
        </div>
    </td>
    <td>
        <div id="outitem{{$counter}}"  class="input-mark-inner mg-b-22 outitem">
        <input type="text" {{$d_none_inp ?? ''}} class="item_arabic_name{{$counter}}" id="item_arabic_name{{$counter}}" value="{{$InvItem->item_text}}" name="item_arabic_name" class="form-control item_text" placeholder="اسم المنتج">

        </div>
    <select id="select{{$counter}}" {{$d_none_sel ?? ''}} class="form-control try item_id" placeholder="أختر المنتج">
            @foreach ($Items as $Item)
            <option
            @if ($InvItem->item_id == $Item->id)
                selected
            @endif
            value="{{$Item->id}}">{{$Item->item_arabic_name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
        <input type="number" id="itemprice{{$counter}}" value="{{$InvItem->item_price}}" class="form-control item_price" placeholder="">
        </div>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
        <input type="number" id="qty{{$counter}}" value="{{$InvItem->item_quantity}}" class="form-control item_quantity" placeholder="">
        </div>
    </td>
    <td id="total{{$counter}}" class="total_item_price">
        {{$InvItem->total_item_price}}
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
        <input type="number" id="discount{{$counter}}" value="{{$InvItem->item_discount}}" class="form-control item_discount" placeholder="">
        </div>
    </td>
    <td id="totalafterdiscount{{$counter}}" class="total_after_discounts">
        {{$InvItem->total_after_discounts}}
    </td>
    <td>
    <div class="bt-df-checkbox">
        <input class="radio-checked tax_exemption"
        @if ($InvItem->tax_exemption == 1)
            checked
        @endif
        type="checkbox" id="optionsRadioscheck{{$counter}}" name="optionsRadioscheck{{$counter}}">
    </div>
    </td>
    <td id="totalvat{{$counter}}" class="input-mark-inner mg-b-22 vat_tax_value">
        {{$InvItem->vat_tax_value}}
    </td>
    <td  id="totalcit{{$counter}}" class="input-mark-inner mg-b-22 comm_industr_tax">
        {{$InvItem->comm_industr_tax}}
    </td>
    <td>
    <div id="nettotal{{$counter}}" class="input-mark-inner mg-b-22 net_value">
            {{$InvItem->net_value}}
        </div>
    </td>
    <td>
        <div class="product-buttons">
        <button data-toggle="modal" data-target="#del{{$counter}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </div>
        <!--Delete-->
<div id="del{{$counter}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">حذف بيانات الصنف</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$InvItem->item_text}}</h2>
                <h4>هل تريد حذف جميع بيانات الصنف ؟  </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">إلغــاء</a>
            <a href="{{url("/Invoices/Purchasing/$InvItem->inv_id/Remove/$InvItem->id")}}" onclick="headCalculations();">حـذف</a>
            </div>
        </div>
    </div>
</div>
<!--/Delete-->
    </td>
</tr>

<script>
    var id = "{{$counter}}";
    $("input[type=radio][name=optionsRadios{{$counter}}]").change(function() {
        // alert('checked');
        var parent = $("#outitem{{$counter}}");
        var select = $("#select{{$counter}}");

        if(this.value == 'no'){
            // $(parent).html('<input type="text" name="item_arabic_name" class="form-control" placeholder="اسم المنتج">')
            $("#item_arabic_name{{$counter}}").css('display','inline-block').attr('disabled',false);
            $(select).css('display','none').attr('disabled','disabled');
        }else{
            // $(parent).empty();
            $("#item_arabic_name{{$counter}}").css('display','none').attr('disabled','disabled');

            $(select).css('display','inline-block').attr('disabled',false);
        }
    })
    $(document).on('keypress',function(e) {
        if(e.which == 13 && $("input[name=optionsRadioscheck{{$counter}}]").is(':focus')) {
            ajax_row('{{url('Invoice/Purchasing/AddRow')}}');
        }
    });

    // $("#del{{$counter}}").click(function() {
    //     $('tr[data-id={{$counter}}]').remove();
    // })

    $("input[name=optionsRadioscheck{{$counter}}]").change(function() {
        var price = $("#itemprice{{$counter}}").val();
        var qty = $("#qty{{$counter}}").val();
        var discount = $("#discount{{$counter}}").val();
        var cit = $('#cit').val()
        var vat = $('#vat').val();
        var totalAfterDiscount = ((price * qty) - discount);
        if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$counter}}]").is(':checked') == false){
            $("#totalvat{{$counter}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
            $("#totalcit{{$counter}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
            $("#nettotal{{$counter}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
        }else{
            $("#totalvat{{$counter}}").text(0);
            $("#totalcit{{$counter}}").text(0);
            $("#nettotal{{$counter}}").text((totalAfterDiscount));

        }
        headCalculations();
    })

    $("#itemprice{{$counter}}").on('input',function() {
        var price = $("#itemprice{{$counter}}").val();
        var qty = $("#qty{{$counter}}").val();
        // total(price, qty);
        $("#total{{$counter}}").text(price * qty);
        var discount = $("#discount{{$counter}}").val();
        $("#totalafterdiscount{{$counter}}").text(((price * qty) - discount));
        var cit = $('#cit').val();
        var vat = $('#vat').val();
        var totalAfterDiscount = ((price * qty) - discount);
        if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$counter}}]").is(':checked') == false){
            $("#totalvat{{$counter}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
            $("#totalcit{{$counter}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
            $("#nettotal{{$counter}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

        }else{
            $("#totalvat{{$counter}}").text(0);
            $("#totalcit{{$counter}}").text(0);
            $('input[name=optionsRadioscheck{{$counter}}]').attr('checked',true);
            $("#nettotal{{$counter}}").text((totalAfterDiscount));
        }
        headCalculations();
    })

    $("#qty{{$counter}}").on('input',function() {
        var price = $("#itemprice{{$counter}}").val();
        var qty = $("#qty{{$counter}}").val();
        var discount = $("#discount{{$counter}}").val();
        var cit = $('#cit').val();
        var vat = $('#vat').val();
        $("#total{{$counter}}").text(price * qty);
        $("#totalafterdiscount{{$counter}}").text(((price * qty) - discount));
        var totalAfterDiscount = ((price * qty) - discount);
        // alert($('input[type=radio][name=optionsRadios10]:checked').val());
        if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$counter}}]").is(':checked') == false){
            $("#totalvat{{$counter}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
            $("#totalcit{{$counter}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
            $("#nettotal{{$counter}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

        }else{
            $("#totalvat{{$counter}}").text(0);
            $("#totalcit{{$counter}}").text(0);
            $('input[name=optionsRadioscheck{{$counter}}]').attr('checked',true);
            $("#nettotal{{$counter}}").text((totalAfterDiscount));
        }
        headCalculations();
    })

    $('#discount'+id).on('input',function() {
        var price = $("#itemprice{{$counter}}").val();
        var qty = $("#qty{{$counter}}").val();
        var discount = $("#discount{{$counter}}").val();
        var cit = $('#cit').val();
        var vat = $('#vat').val();
        $("#total{{$counter}}").text(price * qty);
        $("#totalafterdiscount{{$counter}}").text(((price * qty) - discount));
        var totalAfterDiscount = ((price * qty) - discount);
        // alert($('input[type=radio][name=optionsRadios10]:checked').val());
        if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$counter}}]").is(':checked') == false){
            $("#totalvat{{$counter}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
            $("#totalcit{{$counter}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
            $("#nettotal{{$counter}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

        }else{
            $("#totalvat{{$counter}}").text(0);
            $("#totalcit{{$counter}}").text(0);
            $('input[name=optionsRadioscheck{{$counter}}]').attr('checked',true);
            $("#nettotal{{$counter}}").text((totalAfterDiscount));
        }
        headCalculations();
    })



</script>
@php
    --$counter;
@endphp
@endforeach
