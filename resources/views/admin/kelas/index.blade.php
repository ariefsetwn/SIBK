@extends('layouts.master')

@section('title', 'Kelas')
<!-- ########## Kelas Index  ########## -->
@section('content')

<!-- Button Tambah -->
<a href="/kelas/create" class="btn btn-primary">Tambah Kelas</a>
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
      <th style="width: 10px">No</th>
      <th>Kelas</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    @php $i = 1 @endphp
    @foreach ($kelas as $k)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $k->nama }}</td>
      <td>
        <a href="/kelas/{{$k->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/kelas/{{$k->id}}/destroy" method="post" class="d-inline">
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