@extends('layouts.app')

@section('content')
  <div class="container">


    @isset($data['categories'])
      @include('partials.categories_menu', ['categories'=>$data['categories'], 'cat'=>$data['cat'], ])
    @endisset

    @isset($data['models'])
      @include('partials.models', ['models'=>$data['models'], 'cat'=>$data['cat'], 'masterCat'=>$data['masterCat'] ])
      @include('partials.products', ['products'=>$data['products']])

    @endisset

  </div>
@endsection
