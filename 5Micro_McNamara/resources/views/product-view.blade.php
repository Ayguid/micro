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
                @if ($images = $product->hasImages())
                  @foreach ($images as $image)
                    <img class="productPic" width="100%" src="{{asset('storage/product_images/'.$image->file_path)}}" alt="">
                  @endforeach
                  @else
                    <img class="productPic" width="100%" src="{{asset('storage/product_images/'.'default.jpeg')}}" alt="">
                @endif
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

            @if ($pdfs = $product->hasPdfs())
              @foreach ($pdfs as $pdf)
                <a target="_blank" class="btn" role="button" href="{{asset('storage/pdfs/'.$pdf->file_path)}}" >
                  <i class="far fa-file-pdf bigIcon"></i>{{$pdf->file_path}}</a>
              @endforeach
              @else
                <p>
                  No Contiene archivos Pdf.
                </p>
            @endif

        </div>

        <div class="tab-pane fade" id="files3d" role="tabpanel" aria-labelledby="contact-tab">{{asset('storage/cads2d/FR_QBM1_G14_5U.dwg')}}
            <a href="{{asset('storage/FR_QBM1_G14_40U.stl')}}">{{asset('storage/FR_QBM1_G14_40U.stl')}}</a>

            <iframe src="//sharecad.org/cadframe/load?url=http://www.cnccookbook.com/dxf-downloads/Donkey.dxf" width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
            {{-- <iframe src="//sharecad.org/cadframe/load?url=https://drive.google.com/open?id=0B-aM0jXWkJlWRTF4M1AzdHhZUjVseWZUR2czald3NGU2M3Nn" width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe> --}}

            {{-- <iframe id="2d" src="https://docs.google.com/a/drive.google/viewer?url=https://drive.google.com/open?id=0B-aM0jXWkJlWRTF4M1AzdHhZUjVseWZUR2czald3NGU2M3Nn"  width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe> --}}

            <iframe id="3d_viewer" src="{{asset('Online3DViewer-master/website/index.html')}}"  width="100%" height="500" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
        </div>
      </div>
    @endisset



  </div>

@endsection
<script type="text/javascript">
  var hashLocate={!! json_encode(asset('storage/FR_QBM1_G14_40U.stl')) !!};
  // console.log(hashLocate);
</script>
