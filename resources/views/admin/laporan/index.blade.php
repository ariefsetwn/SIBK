@extends('layouts.master')

@section('title', 'Laporan Pelanggaran Siswa')
<!-- ########## Laporan Index  ########## -->
@section('content')

<a href="/laporan/cetak_pdf" class="btn btn-primary">Cetak PDF <i class="fas fa-print"></i></a>

<form action="/laporan" method="GET" enctype="multipart/form-data">
  <div class="form-group row mt-3">
    <label for="tahun_ajaran" class="ml-3 mr-3 col-form-label">Tahun ajaran :</label>
    <div class="">
      <select id="tahun_ajaran" name="tahun_ajaran" class="form-control" onchange="location = this.value;">
        <option value="">Pilih</option>
      
        @foreach ($tahun_ajaran as $t)
        
      <option value="/laporan/{{$t->id}}">{{$t->nama}}</option>
        
        @endforeach
      </select>
    </div>

    <label for="kelas" class="ml-3 mr-1 col-form-label">Kelas :</label>
    <div class="">
      <select id="kelas" name="kelas" class="form-control" onchange="location = this.value;">
        <option value="">Pilih</option>
      
        @foreach ($kelas as $k)
        
      <option value="/laporan/{{$k->id}}"> {{$k->nama}}</option>
        
        @endforeach
      </select>
    </div>

  </div>
  </form>

<div class="table-responsive mt-3">
<table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
  <thead class="thead-dark">
    <tr>
      <th>No</th>
      <th>NIS</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Tahun Ajaran</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($siswa as $s)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{ $s->nis }}</td>
      <td>{{ $s->nama }}</td>
      <td>{{ $s->kelas->nama }}</td>
      <td>{{ $s->tahun_ajaran->nama }}</td>
      <td>
        <a href="/laporan/{{$s->nis}}/lihat" class="btn btn-info btn-sm">Lihat</a>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

@endsection