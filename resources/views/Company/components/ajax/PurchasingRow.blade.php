<tr data-id="{{$rowCount}}">
    <td>{{$rowCount}}</td>
    <td >
        <div class="bt-df-checkbox">
        <input type="hidden" name="" class="inv_type" value="new">
        <input class="isStored" onclick="editRadioStored({{$rowCount}})" type="radio" value="no" id="optionsRadios{{$rowCount}}" name="optionsRadios{{$rowCount}}">
            <label><b> لا </b></label>
            <input class="radio-checked isStored" checked="" onclick="editRadioStored({{$rowCount}})" type="radio"  value="yes" id="optionsRadios{{$rowCount}}sec" name="optionsRadios{{$rowCount}}">
            <label><b> نعم </b></label>
        </div>
    </td>
    <td>
        <div id="outitem{{$rowCount}}" class="input-mark-inner mg-b-22 outitem">
        <input type="text" class="item_arabic_name" id="item_arabic_name{{$rowCount}}" disabled style="display: none" oninput="editVal({{$rowCount}})" name="item_arabic_name" class="form-control item_text" placeholder="اسم المنتج">

        </div>
    <select id="select{{$rowCount}}" onchange="editSelectVal({{$rowCount}})" class="chosen-select try item_id"  tabindex="-1" placeholder="أختر المنتج">
            @foreach ($Items as $Item)
                <option value="{{$Item->id}}">{{$Item->item_arabic_name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
            <input type="number" id="itemprice{{$rowCount}}" oninput="itemPrice({{$rowCount}})" value="0" class="form-control item_price" placeholder="">
        </div>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
            <input type="number" oninput="itemQty({{$rowCount}})" id="qty{{$rowCount}}" value="0" class="form-control item_quantity" placeholder="">
        </div>
    </td>
    <td id="total{{$rowCount}}" class="total_item_price">
        0
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
            <input type="number" oninput="itemDiscount({{$rowCount}})" id="discount{{$rowCount}}" value="0" class="form-control item_discount" placeholder="">
        </div>
    </td>
    <td id="totalafterdiscount{{$rowCount}}" class="total_after_discounts">
0
    </td>
    <td>
    <div class="bt-df-checkbox">
    <input class="radio-checked tax_exemption" onkeypress="enterForRow(event,{{$rowCount}})" onchange="taxExemptionCheck({{$rowCount}})" checked type="checkbox" id="optionsRadioscheck{{$rowCount}}" name="optionsRadioscheck{{$rowCount}}">
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
0
        </div>
    </td>
    <td>
        <div class="product-buttons">
        <button id="del{{$rowCount}}" onclick="deleteRow({{$rowCount}})" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </div>
    </td>
</tr>

