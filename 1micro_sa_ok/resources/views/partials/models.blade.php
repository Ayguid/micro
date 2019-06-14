
<div class="">
    <h3>{{$masterCat->desc_es}}-->{{$cat->desc_es}}</h3>
</div>

@foreach ($models as $model)

    <a class="btn btn-primary" href="{{route('productsModel',[$cat->id ,$model->Modelo])}}">{{$model->Modelo}}</a>

@endforeach
