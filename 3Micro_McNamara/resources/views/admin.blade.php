@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>ADMIN!</strong>


                    <br>

                    <div id="accordion">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Administrar Productos
                            </button>
                          </h5>
                        </div>

                        <div id="collapseOne" class="collapse "aria-labelledby="headingOne" data-parent="#accordion">
                          <div class="card-body">

                            @foreach (App\Models440\Category::all()->where('parent_id', null) as $cat)

                              <a href="{{route('showCategoryChilden', $cat->id)}}" class="btn btn-primary btn-lg btn-block">{{$cat->desc_es}}</a>
                            @endforeach


                          </div>
                        </div>
                      </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Buscar producto
                            </button>
                          </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                          <div class="card-body">

                            <form class="form-inline">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

                          </div>
                        </div>
                      </div>
                      <div class="card">
                          <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Administrar un país
                              </button>
                            </h5>
                          </div>
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">

                              @foreach (App\Models440\Country::all() as $country)
                                <a href="#" class="btn btn-primary">{{$country->country_desc}}</a>
                              @endforeach

                            </div>
                          </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
