


<div class="">
  @foreach ($products as $product)
    <div class="">
        <div class="mt-2 border border-secondary p-2">
          <ul>
            <li>{{$product->title_es}}</li>
            <li>{{$product->product_code}}</li>
          </ul>
          {{-- @foreach ($product->files as $file)
            @if ($file->extension = 'png' || $file->extension = 'jpg')
              <img class="productPic" width="100%" src="{{asset('storage/product_images/'.$file->file_path)}}" alt="">
            @endif
          @endforeach --}}
          @foreach ($product->attributes()->get() as $pV)
            {{$pV->attribute->name}}<br>
            {{$pV->value}}<br>
            <br>
          @endforeach
        <a href="{{route('editProduct', $product->id)}}">edit</a>
        <form class="" action="{{route('destroyProduct', $product->id)}}" method="post">
          @csrf
          <input name="_method" type="hidden" value="DELETE">
          <button type="submit" name="button">delete</button>
        </form>
      </div>
    </div>
  @endforeach
    {{$products->links() }}
</div>
