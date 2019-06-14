{{-- @extends('layouts.appAdmin')

@section('content')

  <div class="container">
    @if(Session::has('alert-success'))
      <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
    @endif
    @if(Session::has('alert-danger'))
      <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
    @endif




    @isset($data['category'])

      {{$data['category']->titulo_es}}

    <div id="accordionProduct">
      <div class="card">
        <div class="card-header" id="headingProduct">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
              Agregar Producto
            </button>
          </h5>
        </div>
        <div id="collapseProduct" class="collapse "aria-labelledby="headingProduct" data-parent="#accordionProduct">
          <div class="card-body">
            @include('admin.forms.add-product-form', ['category'=>$data['category']])
          </div>
        </div>
      </div>
    </div>

  @endisset


    @isset($data['products'])

      <div class="">


        @foreach ($data['products'] as $prod)
          <div class="mt-2 border border-secondary p-2">
            <ul>
              <li>{{$prod->titulo_es}}</li>
            </ul>
            @foreach ($prod->attributeValues()->get() as $pV)
              {{$pV->attribute->attribute_name}}<br>
              {{$pV->attribute_value_desc}}
              <br>
            @endforeach
          <a href="{{route('editProduct', $prod->id)}}">edit</a>
          <form class="" action="{{route('destroyProduct', $prod->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" name="button">delete</button>
          </form>
        </div>
        @endforeach


          {{ $data['products']->links() }}
      </div>

    @endisset


  </div>
@endsection --}}
