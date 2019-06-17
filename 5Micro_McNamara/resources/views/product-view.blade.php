@extends('layouts.app')
@php
  $product = $data['product'];
  $categories = $data['categories'];
@endphp
@section('content')
  <div class="container">

    <h3>{{session('country.country_desc')}}</h3>
    {{Lang::get('messages.welcome')}}


    @isset($categories)


      <div class="d-flex flex-wrap justify-content-start">
        <div class="row mt-4">

          @foreach ($categories as $cat)
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

              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endisset


    @isset($data['category'])
      <h4 class="m-2">{{$data['category']->father->title_es}} -> <a href="{{ url()->previous() }}">{{$data['category']->title_es}}</a> </h4>
    @endisset

    @isset($product)


      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="datos-tab" data-toggle="tab" href="#datos" role="tab" aria-controls="datos" aria-selected="true">Datos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pdfs-tab" data-toggle="tab" href="#pdfs" role="tab" aria-controls="pdfs" aria-selected="false">Pdfs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="files3d-tab" data-toggle="tab" href="#files3d" role="tab" aria-controls="files3d" aria-selected="false">Archivos CAD</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="datos" role="tabpanel" aria-labelledby="datos-tab">
          <div class="col-12 border mt-2 pt-2">

            <h5>{{$product->title_es}} </h5>
            <h6>{{$product->product_code}}</h6>

            <div class="row">
              <div class="col-4">
                @foreach ($product->files as $file)
                  @if ($file->extension = 'png' || $file->extension = 'jpg')
                    <img class="productPic" width="100%" src="{{asset('storage/product_images/'.$file->file_path)}}" alt="">
                  @endif
                @endforeach
              </div>

              <div class="col-8">
                <h6>{{$product->desc_es}}</h6>
                @foreach ($product->attributes as $att)
                  <strong>{{$att->attribute->name}}</strong><br>
                  {{$att->value}} <br>
                @endforeach
              </div>
            </div>
          </div>

        </div>

        <div class="tab-pane fade" id="pdfs" role="tabpanel" aria-labelledby="pdfs-tab">
            @foreach ($product->files as $file)
              @if ($file->extension() == "pdf")
                <a target="_blank" class="btn" role="button" href="{{asset('storage/pdfs/'.$file->file_path)}}" >
                  <i class="far fa-file-pdf bigIcon"></i>{{$file->file_path}}</a>
              @endif
            @endforeach
        </div>

        <div class="tab-pane fade" id="files3d" role="tabpanel" aria-labelledby="contact-tab">..3.

        </div>
      </div>
    @endisset




  </div>

@endsection
