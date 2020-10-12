@foreach($clients as $index => $client)
<tr>
    <td></td>
    <td></td>
    <td>{{$client->id}}</td>
    <td>{{$client->person_name}}</td>
    <td>{{$client->phone1}}</td>
    <td>{{$client->phone2}}</td>
    <td>{{$client->registeration_no}}</td>
    <td>{{$client->commercial_register}}</td>
</tr>
@endforeach