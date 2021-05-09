@extends('layouts.master')

@section('title', 'Data Guru BK')
<!-- ########## Guru BK Index  ########## -->
@section('content')

<!-- Button Tambah -->
<a href="/guru-bk/create" class="btn btn-primary">Tambah Guru BK</a>
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
      <th>NIP</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Telepon</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($guru_bk as $bk)
    <tr>
      <td>{{ $bk->nip }}</td>
      <td>{{ $bk->nama }}</td>
      <td>{{ $bk->jenis_kelamin}}</td>
      <td>{{ $bk->telepon }}</td>
      <td>
        <a href="guru-bk/{{$bk->nip}}/detail" class="btn btn-info btn-sm">Detail</a>
        <a href="/guru-bk/{{$bk->nip}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/guru-bk/{{$bk->nip}}/destroy" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection