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
    @isset($data)
      <div class="">
        <h3>{{$data['category']->desc_es}}</h3>
          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFormAdd" aria-expanded="false" aria-controls="collapseFormAdd">
            Agregar un producto
          </button>

        <div class="collapse" id="collapseFormAdd">
          <div class="card card-body">

            @switch($data['category']->table_name)
                @case('cilindros')
                    @include('admin.forms.cilindro-form' , ['cat'=>$data['category']])
                    @break
                @case('valvulas')
                    <span>No Form</span>
                    @break

                @default
                    <span>No Form</span>
            @endswitch





          </div>
        </div>
      </div>



      <hr>

      @isset($data['products'])

        {{-- necesitamos descripcion /titulo --}}
        <div class="row">
          @foreach ($data['products'] as $product)
            <div class="col-md-6 col-sm-12 mb-4">
              <a href="#">{{$product->id}}</a>
              <table style="width:100%">
                {{-- {{$product->details()}} --}}

                @foreach ($product->details() as $key => $value)
                  <tr>
                    <th>{{$key}}</th>
                    <td>{{$value}}</td>
                  </tr>

                @endforeach

              </table>






            </div>
            <br>
            <br>
          @endforeach
        </div>
        {{ $data['products']->links() }}

      @endisset
    @endisset


  </div>
@endsection
