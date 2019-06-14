@extends('layouts.app')

@section('content')
<div class="container">
    <div class="">


            <h3>{{session('country.country_desc')}}</h3>
            {{Lang::get('messages.welcome')}}
            <br>

            @isset($data['categories'])
              @foreach ($data['categories'] as $cat)
                <div class="btn-group">
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <button type="button" class="btn btn-primary">{{$cat->titulo_es}}</button>&nbsp;
                  <div class="dropdown-menu">
                    @foreach ($cat->getSubCategories as $sub)
                      <a class="dropdown-item" href="{{route('productsCat', $sub->id)}}">{{$sub->titulo_es}}</a>
                    @endforeach
                  </div>
                </div>
              @endforeach
            @endisset


            <div class="row">

            @isset($data['products'])
              @foreach ($data['products'] as $product)
                <div class="col-3 border">
                <br>
                <h5>{{$product->titulo_es}}</h5>
                <h6>{{$product->product_code}}</h6>
                <img class="productPic" width="100%" src="{{asset('storage/product_images/'.$product->image_path)}}" alt="">
                <h6>{{$product->desc_es}}</h6>
                @foreach ($product->attributes as $att)
                  <strong>{{$att->attribute->name}}</strong><br>
                  {{$att->value}} <br>
                @endforeach
              </div>
              @endforeach
            @endisset
          </div>

<div class="d-flex justify-content-around">
  @if (count($data['products'])>0)
    {{ $data['products']->links() }}
  @endif
</div>




    </div>
</div>

@endsection
