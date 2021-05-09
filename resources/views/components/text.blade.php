<div class="form-group row">
  <label for="{{$name}}" class="col-sm-2 col-form-label">{{$text}}</label>
    <div class="col-sm-10">
      @if (Request::segment(2) == 'create' || Request::segment(3) == 'create')
        <input type="text" class="form-control @error($name) is-invalid @enderror" id="{{$name}}" name="{{$name}}" value="{{old("$name")}}" placeholder="{{$ex}}">
      @else
        <input type="text" class="form-control @error($name) is-invalid @enderror" id="{{$name}}" name="{{$name}}" value="{{old("$name") == '' ? $value : old("$name")}}" placeholder="{{$ex}}">
      @endif
      @error($name)
        <div class="invalid-feedback"> {{ $message }} </div>
      @enderror
    </div>
</div>