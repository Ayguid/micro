@extends('layouts.appAdmin')

@section('content')

  <div class="container">
    @if(Session::has('alert-success'))
      <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
    @endif
    @if(Session::has('alert-danger'))
      <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
    @endif







    @isset($data['products'])

      <div class="">
        @foreach ($data['products'] as $prod)
          {{$prod}}
          {{-- <div class="mt-2 border border-secondary p-2">
            <ul>
              <li>{{$prod->title_es}}</li>
            </ul>
            @foreach ($prod->attributes()->get() as $pV)
              {{$pV->attribute->name}}<br>
              {{$pV->value}}<br>
              <br>
            @endforeach
          <a href="{{route('editProduct', $prod->id)}}">edit</a>
          <form class="" action="{{route('destroyProduct', $prod->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" name="button">delete</button>
          </form>
        </div> --}}
        @endforeach
          {{$data['products']->links() }}
      </div>

    @endisset


  </div>
@endsection
