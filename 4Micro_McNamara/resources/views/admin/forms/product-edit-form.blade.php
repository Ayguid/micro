


<form class="" action="{{route('updateProduct')}}" method="post">
  {{ csrf_field() }}


  <h4>El producto se encuentra en</h4>

  @foreach ($data['product']->possibleCountries() as $country)
    <label for="{{$country->country_desc}}">{{$country->country_desc}}</label>&nbsp;&nbsp;&nbsp;
    <input type="checkbox" name="country_id[]" value="{{$country->id}}" {{$data['product']->isInCountry($country->id)? ' checked' : '' }}>
  @endforeach




  @foreach ($data['product']->getFillable() as $fKey => $fValue)


    <div class="form-group row">
      <div class="col-md-6">
        @foreach ($data['product']->getAttributes() as $aKey => $aValue)

          @if ($aKey == $fValue && $aKey !=='category_id')
            <label for="">{{$fValue}}</label>
            <input class="form-control{{ $errors->has($fValue) ? ' is-invalid' : '' }}" type="text" name="{{$aKey}}" value="{{$aValue}}">
            @if ($errors->has($fValue))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first($fValue) }}</strong>
              </span>
            @endif
          @endif
        @endforeach
      </div>
    </div>
  @endforeach



  @foreach ($data['original_cat']->attributeValues()->get() as $cVal)

    <div class="form-group row">

    @php
      $y = $data['product']->attributeValue($cVal->attribute->id)?$data['product']->attributeValue($cVal->attribute->id)->attribute_value_desc:'';
    @endphp

    <div class="col-md-6">
      @if ($cVal->attribute->attribute_desc=="textarea")
        <label for="">{{$cVal->attribute->attribute_name}}</label>
        <textarea rows="8" cols="80" name="attributes[{{$cVal->attribute->id}}]" value="">{{$y}}</textarea>
      @endif
      @if ($cVal->attribute->attribute_desc=="float")
        <label for="">{{$cVal->attribute->attribute_name}}</label>
        <input class="form-control{{ $errors->has($cVal->attribute->attribute_name) ? ' is-invalid' : '' }}"
         type="number" step="0.1" name="attributes[{{$cVal->attribute->id}}]"
        value="{{$y }}">
      @endif
      @if ($cVal->attribute->attribute_desc=="string")
        <label for="">{{$cVal->attribute->attribute_name}}</label>
        <input class="form-control{{ $errors->has($cVal->attribute->attribute_name) ? ' is-invalid' : '' }}" type="text"
         name="attributes[{{$cVal->attribute->id}}]" value="{{$y}}">
      @endif
    </div>

  </div>


@endforeach



<input type="text" name="product_id" value="{{$data['product']->id}}" hidden>
<button type="submit" name="button" class="btn btn-primary">Guardar</button>
</form>
