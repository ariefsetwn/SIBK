@extends('layouts.master')

@section('title', 'Pelanggaran Siswa')
<!-- ########## pelanggaran-siswa Index  ########## -->
@section('content')

<div class="table-responsive mt-3">
<!-- Data Table -->
<table class="table table-striped" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>Tanggal Pelanggaran</th>
      <th>Kategori Pelanggaran</th>
      <th>Poin</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
  @php $i = 1 @endphp
  @foreach ($pelanggaran_siswa as $p)
    <tr>
      <td>{{ $i++ }}</td>
      <td>{{ date("d-m-Y", strtotime($p->tanggal)) }}</td>
      <td>{{ $p->kategori->nama }}</td>
      <td>{{ $p->kategori->poin}}</td>
      <td>{{ $p->keterangan}}</td>
    </tr>
  @endforeach
  </tbody>
  {{-- <tfoot>
    <tr>
      <th colspan="2">Jumlah Poin</th>
      <td>{{ $jumlah }}</td>
    </tr>
  </tfoot> --}}
</table>
@endsection