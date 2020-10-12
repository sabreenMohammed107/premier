@foreach($employees as $index => $employee)
<tr>
    <td></td>
    <td></td>
    <td>{{$employee->id}}</td>
    <td>{{$employee->person_name}}</td>
    <td>{{$employee->phone1}}</td>
    <td>{{$employee->phone2}}</td>
    <td>{{$employee->registeration_no}}</td>
    <td>{{$employee->commercial_register}}</td>
</tr>
@endforeach