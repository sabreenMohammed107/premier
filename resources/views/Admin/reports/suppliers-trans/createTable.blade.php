@foreach($suppliers as $index => $supplier)
<tr>
    <td></td>
    <td></td>
    <td>{{$supplier->id}}</td>
    <td>{{$supplier->person_name}}</td>
    <td>{{$supplier->phone1}}</td>
    <td>{{$supplier->phone2}}</td>
    <td>{{$supplier->registeration_no}}</td>
    <td>{{$supplier->commercial_register}}</td>
</tr>
@endforeach