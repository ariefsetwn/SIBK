<div class="form-group row">
  <label for="{{$name}}" class="col-sm-2 col-form-label">{{$text}}</label>
  <div class="col-sm-10">
  @if (Request::segment(2) == 'create')
  <input type="date" id="{{$name}}" name="{{$name}}" value="{{old($name)}}" class="form-control @error($name) is-invalid @enderror" min="1960-01-01">
  @else
  <input type="date" id="{{$name}}" name="{{$name}}" value="{{old($name) == '' ? $value : old($name)}}" class="form-control @error($name) is-invalid @enderror" min="1960-01-01">
  @endif
  @error($name)
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>