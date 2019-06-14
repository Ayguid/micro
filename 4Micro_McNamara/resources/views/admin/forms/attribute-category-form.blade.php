<form class="" action="{{route('addCatAttribute', $category->id)}}" method="post">
{{ csrf_field() }}


  <div class="form-group row">
    <div class="col-md-6">


  <label for="Atributo">Atributo</label>
  <input class="form-control" type="text" name="attribute_name" value="">
  <input class="form-control" type="number" name="category_id" value="{{$category->id}}" hidden>

  <label for="Atributo">Tipo</label><br>
  {{-- <input class="form-control" type="text" name="attribute_name" value=""> --}}
  <input type="radio" value="string" name="attribute_desc">string<br>
  <input type="radio" value="int" name="attribute_desc">int<br>
  <input type="radio" value="float" name="attribute_desc">float<br>
  <input type="radio" value="date" name="attribute_desc">date<br>
  <input type="radio" value="mail" name="attribute_desc">mail<br>
  <input type="radio" value="password" name="attribute_desc">password<br>
  <input type="radio" value="textarea" name="attribute_desc">textarea<br>

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
