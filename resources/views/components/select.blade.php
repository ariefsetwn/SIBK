<div class="form-group row">
  <label for="{{$name}}" class="col-sm-2 col-form-label">{{$text}}</label>
  <div class="col-sm-10">
  <select class="form-control @error($name) is-invalid @enderror" id="{{$name}}" name="{{$name}}">
    @if (Request::segment(2) == 'create')
    <option value="">Pilih</option>
    @endif
    {{$slot}}
  </select>
  @error($name)
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>