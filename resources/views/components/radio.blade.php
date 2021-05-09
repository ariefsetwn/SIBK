<div class="form-group row">
<label for="{{$name}}" class="col-sm-2 col-form-label">{{$text}}</label>
  <div class="col-sm-10">
    <div class="form-check">
      @if (Request::segment(2) == 'create')
        <input class="form-check-input @error($name) is-invalid @enderror" type="radio"
        name="{{$name}}" id="pria" value="Pria"  @if(old($name) == 'Pria') checked @endif>
      @else
        <input class="form-check-input @error($name) is-invalid @enderror" type="radio"
        name="{{$name}}" id="pria" value="Pria" {{$value == 'Pria' ? 'checked' : ''}}>
      @endif
      <label class="form-check-label" for="pria"> Pria </label>
    </div>
    <div class="form-check">
      @if (Request::segment(2) == 'create')
        <input class="form-check-input @error($name) is-invalid @enderror" type="radio"
        name="{{$name}}" id="wanita" value="Wanita" @if(old($name) == 'Wanita') checked @endif>
      @else
        <input class="form-check-input @error($name) is-invalid @enderror" type="radio"
        name="{{$name}}" id="wanita" value="Wanita"  {{$value == 'Wanita' ? 'checked' : ''}}>
      @endif
      <label class="form-check-label" for="wanita"> Wanita </label>
      @error($name)
      <div class="invalid-feedback"> {{ $message }} </div>
     @enderror
    </div>
  </div>
</div>