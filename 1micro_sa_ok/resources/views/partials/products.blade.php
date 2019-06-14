


    @isset($products)
      <div class="row">

      @foreach ($products as $product)
        <div class="col-3">

            <div class="card text-center">
              <div class="card-header">
                Featured
              </div>
              <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>

                {{$product->details()}}

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="{{route('showProduct', $product->id)}}" class="btn btn-primary">Mas Detalles</a>
              </div>

            </div>

            <br>

          </div>
      @endforeach

    </div>
    {{ $products->links() }}

    @endisset
