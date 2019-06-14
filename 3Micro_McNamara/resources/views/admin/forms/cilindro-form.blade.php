
@isset($cat)

{{-- {{dd($cat)}} --}}
<form class="" action="{{route('addProduct')}}" method="post">
  <form method="POST" action="{{ route('register') }}">
      @csrf

      <input type="number" name="category_id" value="{{$cat->id}}" hidden>
      <input type="text" name="Familia" value="{{$cat->desc_es}}" hidden>
      <input type="text" name="table_name" value="{{$cat->table_name}}" hidden>
      {{-- {{dd($cat->desc_es)}} --}}
      {{-- {{dd($cat)}} --}}
      <div class="form-group row">
          <label for="C_digo" class="col-md-4 col-form-label text-md-right">{{ __('C_digo') }}</label>

          <div class="col-md-6">
              <input id="C_digo" type="text" class="form-control{{ $errors->has('C_digo') ? ' is-invalid' : '' }}" name="C_digo" value="{{ old('C_digo') }}" required autocomplete="C_digo" autofocus>

              @if ($errors->has('C_digo'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('C_digo') }}</strong>
                  </span>
              @endif
          </div>
      </div>
      <div class="form-group row">
          <label for="Modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

          <div class="col-md-6">
              <input id="Modelo" type="text" class="form-control{{ $errors->has('Modelo') ? ' is-invalid' : '' }}" name="Modelo" value="{{ old('Modelo') }}" required autocomplete="Modelo" autofocus>

              @if ($errors->has('Modelo'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('Modelo') }}</strong>
                  </span>
              @endif
          </div>
      </div>

      <div class="form-group row">
          <label for="Tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

          <div class="col-md-6">
              <input id="Tipo" type="text" class="form-control{{ $errors->has('Tipo') ? ' is-invalid' : '' }}" name="Tipo" value="{{ old('Tipo') }}" required autocomplete="Tipo" autofocus>

              @if ($errors->has('Tipo'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('Tipo') }}</strong>
                  </span>
              @endif
          </div>
      </div>



      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  Agregar Producto
              </button>
          </div>
      </div>
  </form>


{{--
'category_id', 'model_id', 'Familia', 'Modelo', 'Tipo', 'Descripci_n_1', 'Norma', 'Basado_en_la_norma', 'Di_metro', 'Carrera', 'Operaci_n', 'Resorte', 'C_S_IMAN',
'C_S_AMORT', 'Column_1Vast_2Vast', 'Column_1Pist_n_2Pist_n', 'Torque_Nm', 'Ajuste_fino', 'Rosca_vast', 'C_digo', 'Descripci_n', 'P_gina', 'Fotos', 'CAD_2D', 'CAD_3D'

 --}}
</form>

@endisset
