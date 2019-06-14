@if ($cat)
  <div class="">
    <h3>{{$cat->desc_es}}</h3>
  </div>
@endif


<div class="row">


@isset($categories)
  @foreach ($categories as $cat)

    @if ($cat->getSubCategories->count()>0)
      <div class="col-4">
      <a href="{{route('landing', $cat->id)}}" class="btn btn-light">{{$cat->desc_es}} <br> <img width="100%" src="{{$cat->image_path}}" alt=""></a>
    </div>
    @else
      <a href="{{route('productsCat', $cat->id)}}" class="btn btn-primary">{{$cat->desc_es}}</a>
    @endif

  @endforeach
  @endisset


</div>
