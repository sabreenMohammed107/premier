@php
    $i = 0;
@endphp
@foreach ($Invoice_Items as $i => $InvItem)

@php

++$i;
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
<tr id="Item{{$InvItem->id}}" data-id="{{$i}}">
<td id="hashed{{$i}}">{{$i}}</td>
    <td >
        <div class="bt-df-checkbox">
        <input id="inv_type{{$i}}" type="hidden" name="" class="inv_type" value="update">
        <input id="id{{$i}}" type="hidden" name="" class="id" value="{{$InvItem->id}}">
        <input class="radio-checked isStored" onclick="editRadioStored({{$i}})" {{$checked_yes ?? ''}} type="radio"  value="yes" id="optionsRadios{{$i}}sec" name="optionsRadios{{$i}}">
            <label><b> {{ __('titles.yes') }} </b></label><br>
        <input class="isStored" {{$checked_no ?? ''}} onclick="editRadioStored({{$i}})" type="radio" value="no" id="optionsRadios{{$i}}" name="optionsRadios{{$i}}">
            <label><b> {{ __('titles.no') }} </b></label>

        </div>
    </td>
    <td>
        <div id="outitem{{$i}}"  class="input-mark-inner mg-b-22 outitem">
        <input type="text" {{$d_none_inp ?? ''}} oninput="editVal({{$i}})" class="item_arabic_name{{$i}}" id="item_arabic_name{{$i}}" value="{{$InvItem->item_text}}" name="item_arabic_name" class="form-control item_text" placeholder="اسم المنتج">

        </div>
    <select id="select{{$i}}" {{$d_none_sel ?? ''}} onchange="editSelectVal({{$i}})" class="chosen-select try item_id"  tabindex="-1" placeholder="أختر المنتج">
            @foreach ($Items as $Item)
            <option
            @if ($InvItem->item_id == $Item->id)
                selected="selected"
                @php

                @endphp
            @endif
            value="{{$Item->id}}">{{$Item->item_arabic_name}}</option>
            @endforeach
        </select>
        <span id="item_val{{$i}}" style="display:none;">{{$item_arabic_name ?? ''}}</span>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
        <input type="number" oninput="itemPrice({{$i}})" id="itemprice{{$i}}" value="{{$InvItem->item_price}}" class="form-control item_price" placeholder="">
        </div>
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
        <input type="number" oninput="itemQty({{$i}})" id="qty{{$i}}" value="{{$InvItem->item_quantity}}" class="form-control item_quantity" placeholder="">
        </div>
    </td>
    <td id="total{{$i}}" class="total_item_price">
        {{$InvItem->total_item_price}}
    </td>
    <td>
        <div class="input-mark-inner mg-b-22">
        <input type="number" oninput="itemDiscount({{$i}})" id="discount{{$i}}" value="{{$InvItem->item_discount}}" class="form-control item_discount" placeholder="">
        </div>
    </td>
    <td id="totalafterdiscount{{$i}}" class="total_after_discounts">
        {{$InvItem->total_after_discounts}}
    </td>
    <td>
    <div class="bt-df-checkbox">
        <input class="radio-checked tax_exemption"
        @if ($InvItem->tax_exemption == 1)
            checked
        @endif
        type="checkbox" onkeypress="enterForRow(event,{{$i}})" onchange="taxExemptionCheck({{$i}})" id="optionsRadioscheck{{$i}}" name="optionsRadioscheck{{$i}}">
    </div>
    </td>
    <td id="totalvat{{$i}}" class="input-mark-inner mg-b-22 vat_tax_value">
        {{$InvItem->vat_tax_value}}
    </td>
    <td  id="totalcit{{$i}}" class="input-mark-inner mg-b-22 comm_industr_tax">
        {{$InvItem->comm_industr_tax}}
    </td>
    <td>
    <div id="nettotal{{$i}}" class="input-mark-inner mg-b-22 net_value">
            {{$InvItem->net_value}}
        </div>
    </td>
    <td>
        <div class="product-buttons">
        <button data-toggle="modal" data-target="#del{{$i}}" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </div>
        <!--Delete-->
<div id="del{{$i}}" class="modal modal-edu-general fullwidth-popup-InformationproModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-2">
                <h4 class="modal-title" style="text-align:right">{{ __('titles.delete_data') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"> </span>
                <h2>{{$InvItem->item_text}}</h2>
                <h4>{{ __('titles.delete_data_qest') }}   </h4>
            </div>
            <div class="modal-footer info-md">
                <a data-dismiss="modal" href="#">{{ __('titles.cancel') }} </a>
                <a href="#" onclick="DeleteInvoiceItem({{$InvItem->id}},{{$i}});">{{ __('titles.delete') }} </a>
            </div>
        </div>
    </div>
</div>
<!--/Delete-->
    </td>
</tr>

{{-- @php
    ++$i;
@endphp --}}
@endforeach
