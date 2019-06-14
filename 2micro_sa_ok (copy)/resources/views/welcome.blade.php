@extends('layouts.app')

@section('content')


  <div class="container">
    <ul>
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
    @isset($data)
      <div class="row">


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


        @foreach ($data['products'] as $product)
          {{$product->table_name}}<br>
          {{$product->C_digo}}<br>
          {{$product->details()}}
          <br>
          <br>
        @endforeach
      </div>

      @if (count($data['products'])>0)
        {{ $data['products']->links() }}
      @endif

    @endisset
  </div>



@endsection
