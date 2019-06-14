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
                  <button type="button" class="btn btn-primary">{{$cat->desc_es}}</button>&nbsp;
                  <div class="dropdown-menu">
                    @foreach ($cat->getSubCategories as $sub)
                      <a class="dropdown-item" href="{{route('productsCat', $sub->id)}}">{{$sub->desc_es}}</a>
                    @endforeach
                  </div>
                </div>
              @endforeach
            @endisset


            @isset($data['products'])
              {{-- @if (count($data['products'])==0)
                <strong>No products in this country</strong>
              @endif --}}
              @foreach ($data['products'] as $product)
                <br>
                {{$product->C_digo}}<br>
                @foreach ($product->details() as $key => $value)
                  {{$key}}
                  {{$value}}
                @endforeach
                <br>
                <br>
              @endforeach
            @endisset

            @if (count($data['products'])>0)
              {{ $data['products']->links() }}
            @endif




    </div>
</div>

@endsection
