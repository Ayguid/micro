@extends('layouts.appAdmin')

@section('content')

  <div class="container">
    @if(Session::has('alert-success'))
      <div class="alert alert-success"><i class="fa fa-check" aria-hidden="true"></i> <strong>{!! session('alert-success') !!}</strong></div>
    @endif
    @if(Session::has('alert-danger'))
      <div class="alert alert-danger"><i class="fa fa-times" aria-hidden="true"></i> <strong>{!! session('alert-danger') !!}</strong></div>
    @endif



    @isset($category)
      <h3>View</h3>
      @if ($category->parent_id)
        <a href="{{route('showCategory', $category->parent_id)}}">{{$category->father()->first()->title_es}}</a>
      @endif

      <div class="">
        <h3>{{$category->title_es}}</h3>
      </div>

      <div class="row">
        <div class="col-6">
          <a href="{{route('editCategory', $category->id)}}" class="btn btn-primary">Edit</a>
        </div>
        <div class="col-6">
          <form class="" action="{{route('deleteCategory', $category->id)}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" name="button" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>


      <br>
      <br>


      @if (!$category->parent_id)
        <h4>Atributos</h4>
        <div class="">
          @foreach ($category->attributes as $attr)
            {{$attr->name}}<br>
          @endforeach
        </div>



        <br>
        <br>



        <div id="accordion2">
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  Agregar Atributos
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse "aria-labelledby="headingTwo" data-parent="#accordion2">
              <div class="card-body">
                @include('admin.forms.attribute-category-form', ['category'=>$category])
              </div>
            </div>
          </div>
        </div>
      @endif


      <br>
      <br>


      @if ($category->children->count()>0)
        <div class="sub-cats">
          <h4>Sub Categorias</h4>
          <div class="row">
            @foreach ($category->children as $child)
              <div class="col-3">
                <a href="{{route('showCategory', $child->id)}}" class="btn btn-primary btn-lg btn-block">{{$child->title_es}}</a>
              </div>
            @endforeach
          </div>
        </div>
      @endif


      <br>

      @if (!$category->parent_id)
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Agregar Sub Categoria
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse "aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              @include('admin.forms.category-children-form', ['cat'=>$category])
            </div>
          </div>
        </div>
      </div>
    @endif




      @if ($category->father()->count()>0)

        <div class="">
          <div id="accordionProduct">
            <div class="card">
              <div class="card-header" id="headingProduct">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseProduct">
                    Agregar Producto
                  </button>
                </h5>
              </div>
              <div id="collapseProduct" class="collapse "aria-labelledby="headingProduct" data-parent="#accordionProduct">
                <div class="card-body">
                  @include('admin.forms.add-product-form', ['category'=>$category])
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="">
          @foreach ($pag = $category->products()->paginate(5) as $prod)
            <div class="mt-2 border border-secondary p-2">
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
          </div>
          @endforeach
            {{$pag->links() }}
        </div>

      @endif





    @endisset

  </div>
@endsection
