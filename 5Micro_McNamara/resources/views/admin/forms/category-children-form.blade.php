

<form method="POST" action="{{route('addCategory')}}">
    @csrf
    <input type="text" name="parent_id" value="{{$cat->id}}" hidden>

    <div class="form-group ">
      @foreach ($cat->getFillable() as $fValue)
        <div class="form-group row">
          <div class="col-md-6">
            @if ($fValue !=='parent_id')
              <label for="">{{$fValue}}</label>
              <input class="form-control{{ $errors->has($fValue) ? ' is-invalid' : '' }}" type="text" name="{{$fValue}}" value="">
              @if ($errors->has($fValue))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first($fValue) }}</strong>
                </span>
              @endif
            @endif
          </div>
        </div>
      @endforeach
    </div>



    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Agregar
            </button>
        </div>
    </div>
</form>
