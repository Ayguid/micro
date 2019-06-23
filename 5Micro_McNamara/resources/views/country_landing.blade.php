@extends('layouts.app')
@section('content')
  <div class="container">


    <h3>{{session('country.country_desc')}}</h3>
    {{Lang::get('messages.welcome')}}


    @isset($data['categories'])


      <div class="d-flex flex-wrap justify-content-start">
        <div class="row mt-4">

          @foreach ($data['categories'] as $cat)

            <div class="col-3">
              <div class="row">
                <div class="btn-group col-12 mb-1">
                  <button type="button" class="btn btn-primary dropdown-toggle w-100" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$cat->title_es}}</button>
                  <div class="dropdown-menu">
                    @foreach ($cat->getSubCategories as $sub)
                      <a class="dropdown-item bg-light" href="{{route('productsCat', $sub->id)}}">{{$sub->title_es}}</a>
                    @endforeach
                  </div>
                </div>
                @if (!$data['products'])
                  <div class="col-12">
                    <img src="{{$cat->image_path}}" alt="" width="100%">
                  </div>
                @endif
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endisset


    @isset($data['category'])
      <h4 class="m-2">{{$data['category']->father->title_es}} -> {{$data['category']->title_es}} </h4>
    @endisset


    <div class="row ">
      @isset($data['products'])
        @php
        $admin=Auth::guard('admin');
        @endphp
        @foreach ($data['products'] as $product)

          <div class="col-3 border mt-2 pt-2">
            <a href="{{route('showProduct', $product)}}">
              <h5>{{$product->title_es}} </h5>
              <h6>{{$product->product_code}}</h6>
              
              @if ($images = $product->hasImages())
                @foreach ($images as $image)
                  <img class="productPic" width="100%" src="{{asset('storage/product_images/'.$image->file_path)}}" alt="">
                @endforeach
                @else
                  <img class="productPic" width="100%" src="{{asset('storage/product_images/'.'default.jpeg')}}" alt="">
              @endif

            </a>
            <h6>{{$product->desc_es}}</h6>
            @foreach ($product->attributes as $att)
              <strong>{{$att->attribute->name}}</strong><br>
              {{$att->value}} <br>
            @endforeach

            @if ($admin)
              <a href="{{route('editProduct', $product->id)}}">edit</a>
            @endif

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

@endsection
