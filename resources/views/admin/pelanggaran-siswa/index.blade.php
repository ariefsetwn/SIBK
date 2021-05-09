@extends('layouts.master')

@section('title', 'Data Pelanggaran siswa')
<!-- ########## pelanggaran siswa Index  ########## -->
@section('content')

<!-- Button Tambah -->
<a href="/pelanggaran-siswa/create" class="btn btn-primary">Tambah Pelanggaran</a>

{{-- <form action="/pelanggaran-siswa" method="GET" enctype="multipart/form-data">
  <div class="form-group row mt-3">
    
    <label for="tahun_ajaran" class="ml-3 mr-3 col-form-label">Tahun ajaran :</label>
    <div class="">
      <select id="tahun_ajaran" name="tahun_ajaran" class="form-control" onchange="location = this.value;">
        <option value="">Pilih</option>
      
        @foreach ($tahun_ajaran as $t)
        
      <option value="/pelanggaran-siswa/{{$t->id}}">
        {{$t->nama}}
          </option>
        
        @endforeach
      </select>
    </div>

    <label for="kelas" class="ml-3 mr-1 col-form-label">Kelas :</label>
    <div class="">
      <select id="kelas" name="kelas" class="form-control" onchange="location = this.value;">
        <option value="">Pilih</option>
      
        @foreach ($kelas as $k)
        
      <option value="/pelanggaran-siswa/{{$k->id}}"> {{$k->nama}}</option>
        
        @endforeach
      </select>
    </div>
    
  </div>
  </form> --}}

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
      <th>NIS</th>
      <th>Nama</th>
      <th>Tanggal</th>
      <th>Kategori Pelanggaran</th>
      <th>Poin</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($pelanggaran_siswa as $p)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{ $p->nis }}</td>
      <td>{{ $p->siswa->nama ?? '' }}</td>
      <td>{{ date("d-m-Y", strtotime($p->tanggal)) }}</td>
      <td>{{ $p->kategori->nama ?? '' }}</td>
      <td>{{ $p->kategori->poin ?? '' }}</td>
      <td>
        <a href="/pelanggaran-siswa/{{$p->id}}/detail" class="btn btn-info btn-sm">Detail</a>
        <a href="/pelanggaran-siswa/{{$p->id}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/pelanggaran-siswa/{{$p->id}}/destroy" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <input type="hidden" name="id_kategori" value="{{$p->kategori_id}}">
          <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
@endsection