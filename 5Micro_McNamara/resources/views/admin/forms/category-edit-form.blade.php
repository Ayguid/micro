<form class="" action="{{route('updateCat', $category->id)}}" method="post">
{{ csrf_field() }}
@foreach ($category->getFillable() as $fKey => $fValue)


  <div class="form-group row">
    <div class="col-md-6">
@foreach ($category->getAttributes() as $aKey => $aValue)


  @if ($aKey == $fValue && $aKey!=='parent_id')
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
<button type="submit" name="button" class="btn btn-primary">Guardar</button>
</form>
{{--
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email">

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div> --}}
