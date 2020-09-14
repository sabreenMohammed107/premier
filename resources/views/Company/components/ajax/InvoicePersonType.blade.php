
    <option disabled selected value="">أختر {{$type}}</option>
    @foreach ($Persons as $Person)
        <option value="{{$Person->id}}">{{$Person->person_name}}</option>
    @endforeach


