<div class="form-group row">
<label for="{{$name}}" class="col-sm-2 col-form-label">{{$text}}</label>
  <div class="col-sm-10">
  <input type="file" id="{{$name}}" name="{{$name}}" value="{{old($name)}}" class="form-control @error($name) is-invalid @enderror">
  @error($name)
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>