
        @foreach($rows as $index => $row)
        <tr id="thisr" value="">
            <td>{{$index+1}}</td>
            <td><?php
             $date = date_create($row->cash_date) ?>
                {{ date_format($date,"d-m-Y") }}</td>
            <td style="width: 30%;">{{$row->statement}}</td>
            <td>{{$row->exit_permission_code}}</td>
            <td>
                <div class="input-mark-inner mg-b-22">
                    <input type="text" name="detailed_criterion{{$row->id}}"  onblur="fillForm({{$row->id}})" value="{{$row->detailed_criterion}}" class="form-control" >
                </div>
            </td>
            <td>
                <select name="guided_item_id{{$row->id}}" onchange="fillSelect({{$row->id}})" class="form-control">
                <option selected disabled>Please select one option</option>
                @foreach($guided_items as $item)
                   <option value="{{$item->id}}" @if($row->guided_item_id == $item->id) selected='selected' @else Select @endif >{{$item->guided_item_name}}</option>
                   @endforeach
                </select>
            </td>
            <td>
                <div class="bt-df-checkbox">
                    <input class="radio-checked" name="confirmed{{$row->id}}" onchange="fillCheck({{$row->id}})" type="checkbox"  @if($row->confirm==1) checked @endif   >
                  
                    <label><b> معتمد </b></label>
                </div>
            </td>
            <td>10000</td>
            <td>
                <div class="product-buttons">
                    <button title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></button>
                    <!-- <button data-toggle="modal" data-target="#del" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button> -->
                </div>
            </td>
        </tr>
@endforeach
 