@if ($type == 'أخرى')
<input type="text" name="person_name" id="other_text" class="form-control" placeholder="">
@else
<select data-placeholder="Choose a Country..." class="chosen-select" id="person_id" tabindex="-1">
    <option disabled selected>أختر {{$type}}</option>
    @foreach ($Persons as $Person)
        <option value="{{$Person->id}}">{{$Person->person_name}}</option>
    @endforeach
</select>

@endif

