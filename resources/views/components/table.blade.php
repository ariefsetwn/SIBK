{{-- <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama Tag</th>
      <th>Deskripsi</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
   {{$slot}}
  </tbody>
</table> --}}

  <thead>
    <tr>
      @foreach ($title as $th)
        <th>{{$th}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    <tr>
    {{$slot}}
    </tr>
  </tbody>
