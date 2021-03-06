@extends('layouts.appAdmin')

@section('content')

  <div class="container">
    @if(Session::has('alert-success'))
      <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
    @endif
    @if(Session::has('alert-danger'))
      <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
    @endif



    {{-- {{$product}} --}}

    @php
    $product = $data['product'];
    $productFiles = $product->files;
    $productData = json_encode(
      ['product'=>$product,
      'productFiles'=>$productFiles]
    );
    @endphp
    <drop-zone :data="{{$productData}}"></drop-zone>
    @include('admin.forms.product-edit-form')




  </div>
@endsection
