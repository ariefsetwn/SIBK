@extends('layouts.master')

@section('title', 'Tahun Ajaran')
<!-- ########## Tahun Ajaran Index  ########## -->
@section('content')

<!-- Button Tambah -->
<a href="/tahun-ajaran/create" class="btn btn-primary">Tambah Tahun Ajaran</a>
<div class="table-responsive mt-3">
<!-- Session Alert Success  -->
@if (!empty(session('pesan')))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{session('pesan')}}</strong>
</div>
@endif
<!-- Data Table -->
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th style="width: 10%">No</th>
      <th>Tahun Ajaran</th>
      <th>Status</th>
      <th style="width: 40%">Opsi</th>
    </tr>
  </thead>
  <tbody>
  @php $i = 1 @endphp
    
    @foreach ($tahun_ajaran as $ta)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $ta->nama }}</td>
      <td>{{ $ta->is_active}}</td>
      <td>
        <a href="/tahun-ajaran/{{$ta->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/tahun-ajaran/{{$ta->id}}/destroy" method="post" class="d-inline">
          @CSRF
          @method('DELETE')
          <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection