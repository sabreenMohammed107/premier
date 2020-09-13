@if ($type == 'أخرى')
<input type="text" name="person_name" id="other_text" class="form-control" placeholder="">
@else
<select data-width="100%" class="selectpicker" data-live-search="true" id="person_id" tabindex="-1">
    <option disabled selected value="">أختر {{$type}}</option>
    @foreach ($Persons as $Person)
        <option value="{{$Person->id}}">{{$Person->person_name}}</option>
    @endforeach
</select>

@endif

