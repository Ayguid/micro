@php
$parents = collect([]);
$parent = $category->father;
while(!is_null($parent)) {
  $parents->push($parent);
  $parent = $parent->father;
}
$original_cat= $parents[$parents->count()-1];
@endphp


<form class="" action="{{route('addProduct')}}" method="post">
  {{ csrf_field() }}

  @php
  $prod=new App\Models440\Product();
  @endphp



  <h4>El producto se encuentra en</h4>
  @foreach ($prod->possibleCountries() as $country)
    <input type="checkbox" name="country_id[]" value="{{$country->id}}">
    <label for="{{$country->country_desc}}">{{$country->country_desc}}</label>&nbsp;&nbsp;&nbsp;
  @endforeach






  @foreach ($prod->getFillable() as $fValue)
    <div class="form-group row">
      <div class="col-md-6">
        @if ($fValue =='category_id')
          <input type="text" name="category_id" value="{{$category->id}}" hidden>
        @endif
        @if ($fValue !=='category_id')
          <label for="">{{$fValue}}</label>
          <input class="form-control{{ $errors->has($fValue) ? ' is-invalid' : '' }}" type="text" name="{{$fValue}}" value="">
          @if ($errors->has($fValue))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first($fValue) }}</strong>
            </span>
          @endif
        @endif
      </div>
    </div>
  @endforeach




  @foreach ($original_cat->attributeValues()->get() as $val)
    <div class="form-group row">
      {{-- <div class="col-md-6">
      <label for="">{{$val->attribute->attribute_name}}</label>
      <input class="form-control{{ $errors->has($val->attribute->attribute_name) ? ' is-invalid' : '' }}" type="text" name="attributes[{{$val->attribute->id}}]" value="">
      @if ($errors->has($val->attribute->attribute_name))
      <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first($val->attribute->attribute_name) }}</strong>
    </span>
  @endif
</div> --}}

<div class="col-md-6">
  @if ($val->attribute->attribute_desc=="textarea")
    <label for="">{{$val->attribute->attribute_name}}</label>
    <textarea rows="8" cols="80" name="attributes[{{$val->attribute->id}}]" value=""></textarea>
  @endif
  @if ($val->attribute->attribute_desc=="float")
    <label for="">{{$val->attribute->attribute_name}}</label>
    <input class="form-control{{ $errors->has($val->attribute->attribute_name) ? ' is-invalid' : '' }}" type="number" step="0.1" name="attributes[{{$val->attribute->id}}]" value="">
  @endif
  @if ($val->attribute->attribute_desc=="string")
    <label for="">{{$val->attribute->attribute_name}}</label>
    <input class="form-control{{ $errors->has($val->attribute->attribute_name) ? ' is-invalid' : '' }}" type="text" name="attributes[{{$val->attribute->id}}]" value="">
  @endif
</div>
</div>
@endforeach



<button type="submit" name="button" class="btn btn-primary">Guardar</button>
</form>
