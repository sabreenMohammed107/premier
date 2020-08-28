<tr data-id="{{$rowCount}}">
    <td>{{$rowCount}}</td>
    <td >
        <div class="bt-df-checkbox">
        <input type="hidden" name="" class="inv_type" value="new">
        <input class="isStored" checked="" type="radio" value="no" id="optionsRadios{{$rowCount}}" name="optionsRadios{{$rowCount}}">
            <label><b> لا </b></label>
            <input class="radio-checked isStored" type="radio"  value="yes" id="optionsRadios{{$rowCount}}sec" name="optionsRadios{{$rowCount}}">
            <label><b> نعم </b></label>
        </div>
    </td>
    <td>
        <div id="outitem{{$rowCount}}" class="input-mark-inner mg-b-22 outitem">
        <input type="text" class="item_arabic_name" id="item_arabic_name{{$rowCount}}" name="item_arabic_name" class="form-control item_text" placeholder="اسم المنتج">

        </div>
    <select id="select{{$rowCount}}" disabled style="display: none" class="form-control try item_id" placeholder="أختر المنتج">
            @foreach ($Items as $Item)
                <option value="{{$Item->id}}">{{$Item->item_arabic_name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
            <input type="number" id="itemprice{{$rowCount}}" class="form-control item_price" placeholder="">
        </div>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
            <input type="number"  id="qty{{$rowCount}}" class="form-control item_quantity" placeholder="">
        </div>
    </td>
    <td id="total{{$rowCount}}" class="total_item_price">

    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
            <input type="number" id="discount{{$rowCount}}" class="form-control item_discount" placeholder="">
        </div>
    </td>
    <td id="totalafterdiscount{{$rowCount}}" class="total_after_discounts">

    </td>
    <td>
    <div class="bt-df-checkbox">
        <input class="radio-checked tax_exemption" checked type="checkbox" id="optionsRadioscheck{{$rowCount}}" name="optionsRadioscheck{{$rowCount}}">
    </div>
    </td>
    <td id="totalvat{{$rowCount}}" class="input-mark-inner mg-b-22 vat_tax_value">
        0
    </td>
    <td  id="totalcit{{$rowCount}}" class="input-mark-inner mg-b-22 comm_industr_tax">
        0
    </td>
    <td>
    <div id="nettotal{{$rowCount}}" class="input-mark-inner mg-b-22 net_value">

        </div>
    </td>
    <td>
        <div class="product-buttons">
        <button id="del{{$rowCount}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </div>
    </td>
</tr>

<script>
            var id = "{{$rowCount}}";
            $("input[type=radio][name=optionsRadios{{$rowCount}}]").change(function() {
                // alert(checked);
                var parent = $("#outitem{{$rowCount}}");
                var select = $("#select{{$rowCount}}");

                if(this.value == 'no'){
                    $(parent).html('<input type="text" name="item_arabic_name" class="form-control" placeholder="اسم المنتج">')
                    $(select).css('display','none').attr('disabled','disabled');
                }else{
                    $(parent).empty();
                    $(select).css('display','inline-block').attr('disabled',false).removeClass('select2-offscreen');
                }
            })
            $(document).on('keypress',function(e) {
                if(e.which == 13 && $("input[name=optionsRadioscheck{{$rowCount}}]").is(':focus')) {
                    ajax_row('{{url('Invoice/Purchasing/AddRow')}}');
                }
            });

            $("#del{{$rowCount}}").click(function() {

                $('tr[data-id={{$rowCount}}]').remove();
                headCalculations();
            })

            $("input[name=optionsRadioscheck{{$rowCount}}]").change(function() {
                var price = $("#itemprice{{$rowCount}}").val();
                var qty = $("#qty{{$rowCount}}").val();
                var discount = $("#discount{{$rowCount}}").val();
                var cit = $('#cit').val()
                var vat = $('#vat').val();
                var totalAfterDiscount = ((price * qty) - discount);
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$rowCount}}]").is(':checked') == false){
                    $("#totalvat{{$rowCount}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit{{$rowCount}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));
                }else{
                    $("#totalvat{{$rowCount}}").text(0);
                    $("#totalcit{{$rowCount}}").text(0);
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount));

                }
                headCalculations();
            })

            $("#itemprice{{$rowCount}}").on('input',function() {
                var price = $("#itemprice{{$rowCount}}").val();
                var qty = $("#qty{{$rowCount}}").val();
                // total(price, qty);
                $("#total{{$rowCount}}").text(price * qty);
                var discount = $("#discount{{$rowCount}}").val();
                $("#totalafterdiscount{{$rowCount}}").text(((price * qty) - discount));
                var cit = $('#cit').val();
                var vat = $('#vat').val();
                var totalAfterDiscount = ((price * qty) - discount);
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$rowCount}}]").is(':checked') == false){
                    $("#totalvat{{$rowCount}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit{{$rowCount}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

                }else{
                    $("#totalvat{{$rowCount}}").text(0);
                    $("#totalcit{{$rowCount}}").text(0);
                    $('input[name=optionsRadioscheck{{$rowCount}}]').attr('checked',true);
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount));
                }
                headCalculations();
            })

            $("#qty{{$rowCount}}").on('input',function() {
                var price = $("#itemprice{{$rowCount}}").val();
                var qty = $("#qty{{$rowCount}}").val();
                var discount = $("#discount{{$rowCount}}").val();
                var cit = $('#cit').val();
                var vat = $('#vat').val();
                $("#total{{$rowCount}}").text(price * qty);
                $("#totalafterdiscount{{$rowCount}}").text(((price * qty) - discount));
                var totalAfterDiscount = ((price * qty) - discount);
                // alert($('input[type=radio][name=optionsRadios10]:checked').val());
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$rowCount}}]").is(':checked') == false){
                    $("#totalvat{{$rowCount}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit{{$rowCount}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

                }else{
                    $("#totalvat{{$rowCount}}").text(0);
                    $("#totalcit{{$rowCount}}").text(0);
                    $('input[name=optionsRadioscheck{{$rowCount}}]').attr('checked',true);
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount));
                }
                headCalculations();
            })

            $('#discount'+id).on('input',function() {
                var price = $("#itemprice{{$rowCount}}").val();
                var qty = $("#qty{{$rowCount}}").val();
                var discount = $("#discount{{$rowCount}}").val();
                var cit = $('#cit').val();
                var vat = $('#vat').val();
                $("#total{{$rowCount}}").text(price * qty);
                $("#totalafterdiscount{{$rowCount}}").text(((price * qty) - discount));
                var totalAfterDiscount = ((price * qty) - discount);
                // alert($('input[type=radio][name=optionsRadios10]:checked').val());
                if($('input[type=radio][name=optionsRadios10]:checked').val() == 1 && $("input[name=optionsRadioscheck{{$rowCount}}]").is(':checked') == false){
                    $("#totalvat{{$rowCount}}").text((totalAfterDiscount*(vat/100)).toFixed(2));
                    $("#totalcit{{$rowCount}}").text((totalAfterDiscount*(cit/100)).toFixed(2));
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount + totalAfterDiscount*((vat-cit)/100)).toFixed(2));

                }else{
                    $("#totalvat{{$rowCount}}").text(0);
                    $("#totalcit{{$rowCount}}").text(0);
                    $('input[name=optionsRadioscheck{{$rowCount}}]').attr('checked',true);
                    $("#nettotal{{$rowCount}}").text((totalAfterDiscount));
                }
                headCalculations();
            })



</script>
