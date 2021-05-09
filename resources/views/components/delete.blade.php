<form action="{{$link}}" method="post" class="d-inline">
  @csrf
  @method('DELETE')
  <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
</form>