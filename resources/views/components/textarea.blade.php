<div class="form-group row">
  <label for="{{$name}}" class="col-sm-2 col-form-label">{{$text}}</label>
  <div class="col-sm-10">
  @if (Request::segment(2) == 'create' || Request::segment(3) == 'create')
  <textarea id="{{$name}}" name="{{$name}}" placeholder="{{$ex}}" class="form-control @error($name) is-invalid @enderror" cols="20" rows="2">{{old("$name")}}</textarea>
  @else
    <textarea id="{{$name}}" name="{{$name}}" placeholder="{{$ex}}" class="form-control @error($name) is-invalid @enderror" cols="20" rows="2">{{old("$name") == '' ? $value : old("$name")}}</textarea>
  @endif
  @error($name)
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
