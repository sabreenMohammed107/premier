@foreach($items as $index => $item)
<tr>
    <td></td>
    <td></td>
    <td>{{$item->id}}</td>
    <td>{{$item->item_code}}</td>
    <td>{{$item->item_arabic_name}}</td>
    <td>{{$item->item_english_name}}</td>
    <td>{{$item->total_open_balance_qty}}</td>
    <td>{{$item->total_open_balance_cost}}</td>
</tr>
@endforeach