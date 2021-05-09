@extends('layouts.master')

@section('title', 'Kategori Pelanggaran')
<!-- ########## kategori Index  ########## -->
@section('content')

<!-- Button Tambah -->
@if (auth()->user()->role->nama == 'Admin' || auth()->user()->role->nama == 'Gurubk')
  <a href="/kategori/create" class="btn btn-primary">Tambah Kategori</a>
@endif
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
      <th>No</th>
      <th>Kategori Pelanggaran</th>
      <th>Poin</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
  @php $j = 1 @endphp
  @foreach ($kategori as $i)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $i->nama }}</td>
      <td>{{ $i->poin}}</td>
      <td>
        <a href="/kategori/{{$i->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/kategori/{{$i->id}}/destroy" method="post" class="d-inline">
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