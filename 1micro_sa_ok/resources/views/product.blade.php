@extends('layouts.app')

@section('content')
  <div class="container">


    @isset($product)
      {{$product}}
      {{$product->details()}}
    @endisset

  </div>
@endsection
