@extends('layouts.master')

@section('title', "$siswa->nama $siswa->nis")
<!-- ########## pelanggaran siswa Index  ########## -->
@section('content')
<a href="/laporan/{{$siswa->nis}}/print" class="btn btn-primary">Cetak PDF <i class="fas fa-print"></i></a>
<a href="/laporan" class="btn btn-secondary">Kembali</a>
<div class="table-responsive mt-3">
  
<!-- Session Alert Success  -->
@if (!empty(session('pesan')))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{session('pesan')}}</strong>
</div>
@endif
<!-- Data Table -->
<table class="table table-striped" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th>Tanggal Pelanggaran</th>
      <th>Kategori Pelanggaran</th>
      <th>Poin</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pelanggaran_siswa as $p)
    <tr>
      <td>{{ date("d-m-Y", strtotime($p->tanggal)) }}</td>
      <td>{{ $p->kategori->nama ?? '' }}</td>
      <td>{{ $p->kategori->poin ?? '' }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection