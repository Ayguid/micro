<form class="" action="{{route('addCatAttribute', $category->id)}}" method="post">
{{ csrf_field() }}

@php
  $attr= new App\Models440\Attribute() ;
@endphp

  <div class="form-group row">
    <div class="col-md-6">


  <label for="Atributo">Atributo</label>
  <input class="form-control" type="text" name="name" value="">
  <input class="form-control" type="number" name="category_id" value="{{$category->id}}" hidden>

  <label for="Atributo">Tipo</label><br>
  @foreach ($attr->types() as $key => $value)
    <input type="radio" value="{{$value}}" name="type">{{$value}}<br>
  @endforeach

</div>
</div>



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
