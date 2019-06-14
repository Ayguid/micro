@extends('layouts.appAdmin')

@section('content')
<div class="container">

  <div class="col-md-6 col-md-offset-3">
    @if(Session::has('alert-success'))
      <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
    @endif
    @if(Session::has('alert-danger'))
      <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
    @endif
  </div>



      @isset($cat)
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseAddCat" aria-expanded="false" aria-controls="collapseAddCat">
          Agregar Categoria
        </button>

      <div class="collapse" id="collapseAddCat">
        <div class="card card-body">

          <form method="POST" action="{{route('addCategory')}}">
              @csrf

              <div class="form-group row">
                <input type="text" name="parent_id" value="{{$cat->id}}" hidden>

                  <label for="desc_es" class="col-md-4 col-form-label text-md-right">desc_es</label>
                  <div class="col-md-6">
                      <input id="desc_es" type="text" class="form-control{{ $errors->has('desc_es') ? ' is-invalid' : '' }}" name="desc_es" value=""  autocomplete="name" autofocus>

                      @if ($errors->has('desc_es'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('desc_es') }}</strong>
                          </span>
                      @endif
                  </div>
                <input type="text" name="table_name" value="{{$cat->table_name}}" hidden>
              </div>


              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                      <button type="submit" class="btn btn-primary">
                          Agregar
                      </button>
                  </div>
              </div>
          </form>

        </div>
      </div>








          {{-- {{$cat->getSubCategories}} --}}
          <div class="row">
          @foreach ($cat->getSubCategories as $sub)



          <div id="{{'a'.$sub->id}}"  class="col-md-6 col-sm-12 mb-1">

            <div class="card">
              <div class="card-header" id="headingOne">

                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-link " data-toggle="collapse" data-target="{{'#b'.$sub->id}}" aria-expanded="true" aria-controls="collapseOne">
                    {{$sub->desc_es}}
                    </button>
                  </div>
                  <a class="col-6 text-right btn btn-light" href="{{route('productsInCat', $sub->id)}}"> Productos en esta Categoria</a>
                </div>
              </div>

              <div id="{{'b'.$sub->id}}" class="collapse "aria-labelledby="headingOne" data-parent="{{'#a'.$sub->id}}">
                <div class="card-body">
                  <form method="POST" action="{{ route('updateCat', $sub->id) }}">
                      @csrf

                      <div class="form-group row">
                        <input type="text" name="parent_id" value="{{$cat->id}}" hidden>

                          <label for="desc_es" class="col-md-4 col-form-label text-md-right">Nombre español</label>
                          <div class="col-md-6">
                              <input id="desc_es" type="text" class="form-control{{ $errors->has('desc_es') ? ' is-invalid' : '' }}" name="desc_es" value="{{$sub->desc_es}}"  autocomplete="name" autofocus>

                              @if ($errors->has('desc_es'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('desc_es') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">

                                  Modificar
                              </button>
                          </div>
                      </div>
                  </form>


                </div>
              </div>
            </div>


          </div>


          @endforeach
        </div>
      @endisset






</div>
@endsection
