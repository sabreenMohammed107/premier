
    <option disabled selected value="">{{ __('titles.select') }} {{$type}}</option>
    @foreach ($Persons as $Person)
        <option value="{{$Person->id}}">{{$Person->person_name}}</option>
    @endforeach


