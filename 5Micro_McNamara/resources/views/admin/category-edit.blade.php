@extends('layouts.appAdmin')

@section('content')
    <div class="container">
      @if ($category->parent_id)
        <a href="{{route('showCategory', $category->parent_id)}}">{{$category->father()->first()->titulo_es}}</a>
      @endif
      <div class="col-md-6 col-md-offset-3">
        @if(Session::has('alert-success'))
          <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
        @endif
        @if(Session::has('alert-danger'))
          <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
        @endif
      </div>
      <h3>Edit</h3>
      @isset($category)




      @include('admin.forms.category-edit-form', ['category'=>$category])








      @endisset



    </div>
@endsection
