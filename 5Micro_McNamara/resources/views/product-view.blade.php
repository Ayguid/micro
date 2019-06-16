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

              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endisset


    @isset($data['category'])
      <h4 class="m-2">{{$data['category']->father->title_es}} -> <a href="{{ url()->previous() }}">{{$data['category']->title_es}}</a> </h4>
    @endisset

    @isset($data['product'])


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

            <h5>{{$data['product']->title_es}} </h5>
            <h6>{{$data['product']->product_code}}</h6>

            <div class="row">
              <div class="col-4">
                <img class="productPic" width="100%" src="{{asset('storage/product_images/'.$data['product']->image_path)}}" alt="">
              </div>

              <div class="col-8">
                <h6>{{$data['product']->desc_es}}</h6>
                @foreach ($data['product']->attributes as $att)
                  <strong>{{$att->attribute->name}}</strong><br>
                  {{$att->value}} <br>
                @endforeach
              </div>
            </div>
          </div>

        </div>

        <div class="tab-pane fade" id="pdfs" role="tabpanel" aria-labelledby="pdfs-tab">
          @php
            $route='storage/pdfs/';
            $es = $data['product']->pdf_es;
            $en = $data['product']->pdf_en;
            $pt = $data['product']->pdf_pt;
          @endphp
          <a target="_blank" class="btn {{$es?'':'disabled'}}" aria-disabled="{{$es?'':'true'}}" role="button" href="{{asset($route.$es)}}" >
            <i class="far fa-file-pdf bigIcon"></i>Español</a>
          <a target="_blank" class="btn {{$en?'':'disabled'}}" aria-disabled="{{$en?'':'true'}}" role="button" href="{{asset($route.$en)}}" >
            <i class="far fa-file-pdf bigIcon"></i>English</a>
          <a target="_blank" class="btn {{$pt?'':'disabled'}}" aria-disabled="{{$pt?'':'true'}}" role="button"  href="{{asset($route.$pt)}}">
            <i class="far fa-file-pdf bigIcon"></i>Portugués</a>
          {{-- <a href="#" download><i class="fas fa-download bigIcon"></i></a> --}}
        </div>

        <div class="tab-pane fade" id="files3d" role="tabpanel" aria-labelledby="contact-tab">..3.

        </div>
      </div>
    @endisset




  </div>

@endsection
