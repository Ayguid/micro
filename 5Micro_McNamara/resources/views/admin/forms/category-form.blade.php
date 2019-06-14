@php
  $cat= new App\Models440\Category();

@endphp

<form method="POST" action="{{route('addCategory')}}">
    @csrf

    {{-- <div class="form-group row">
      <input type="text" name="parent_id" value="" hidden>

      <label for="titulo_es" class="col-md-4 col-form-label text-md-right">titulo_es</label>
      <div class="col-md-6">
          <input id="titulo_es" type="text" class="form-control{{ $errors->has('titulo_es') ? ' is-invalid' : '' }}" name="titulo_es" value="{{ old('titulo_es') }}" autofocus>

          @if ($errors->has('titulo_es'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('titulo_es') }}</strong>
              </span>
          @endif
      </div>
    </div>
      <div class="form-group row">
        <label for="desc_es" class="col-md-4 col-form-label text-md-right">desc_es</label>
        <div class="col-md-6">
            <input id="desc_es" type="text" class="form-control{{ $errors->has('desc_es') ? ' is-invalid' : '' }}" name="desc_es" value="{{ old('desc_es') }}" autofocus>

            @if ($errors->has('desc_es'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('desc_es') }}</strong>
                </span>
            @endif
        </div>
    </div> --}}
    @foreach ($cat->getFillable() as $fValue)
      <div class="form-group row">
        <div class="col-md-6">
          @if ($fValue !=='parent_id')
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


    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Agregar
            </button>
        </div>
    </div>
</form>
