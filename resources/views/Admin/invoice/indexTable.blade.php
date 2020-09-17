@foreach ($Invoices as $i => $Invoice)

<tr>
    <td>{{$i+1}}</td>
    
    
    <td><?php
             $date = date_create($Invoice->inv_date) ?>
                {{ date_format($date,"d-m-Y") }}</td>
    <td>{{$Invoice->serial}}</td>
    <td>
        @if ($Invoice->approved == 1)
        معتمد
        @else
        غير معتمد
        @endif
    </td>
    <td>{{$Invoice->net_invoice}}</td>
    <td>{{$Invoice->outgoing->outgoing_type_name ?? ''}}</td>
    <td>{{$Invoice->purchasing_type->purchasing_types_name ?? ''}}</td>
    <td>{{$Invoice->service_type->service_type ?? ''}}</td>
    <td>
        <div class="product-buttons">
            <a href="{{ route('invoicePurch-show',$Invoice->id) }}" title="View" class="pd-setting-ed"><i class="fa fa-file" aria-hidden="true"></i></ش>
        </div>
    </td>
</tr>
@endforeach