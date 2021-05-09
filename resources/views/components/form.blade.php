<form action="{{$act}}" method="post" enctype="multipart/form-data">
  @CSRF
  @method("$method")
  {{$slot}}
</form>