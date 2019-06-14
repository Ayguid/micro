


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


{{-- {{dd($data['original_cat']->attributes()->get())}} --}}
  @foreach ($data['original_cat']->attributes()->get() as $attr)

    <div class="form-group row">

    @php
      $value = $data['product']->attributeValue($attr->id)?$data['product']->attributeValue($attr->id)->value:'';
      // dd($value)
    @endphp

    <div class="col-md-6">
      @if ($attr->type=="textarea")
        <label for="">{{$attr->name}}</label>
        <textarea rows="8" cols="80" name="attributes[{{$attr->id}}]" value="">{{$value}}</textarea>
      @endif
      @if ($attr->type=="float")
        <label for="">{{$attr->name}}</label>
        <input class="form-control{{ $errors->has($attr->name) ? ' is-invalid' : '' }}"
         type="number" step="0.1" name="attributes[{{$attr->id}}]"
        value="{{$value}}">
      @endif
      @if ($attr->type=="string")
        <label for="">{{$attr->name}}</label>
        <input class="form-control{{ $errors->has($attr->name) ? ' is-invalid' : '' }}" type="text"
         name="attributes[{{$attr->id}}]" value="{{$value}}">
      @endif
    </div>

  </div>


@endforeach



<input type="text" name="product_id" value="{{$data['product']->id}}" hidden>
<button type="submit" name="button" class="btn btn-primary">Guardar</button>
</form>
