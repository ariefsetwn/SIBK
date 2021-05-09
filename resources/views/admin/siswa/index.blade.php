@extends('layouts.master')

@section('title', 'Data Siswa')
<!-- ########## Siswa Index  ########## -->
@section('content')

<!-- Button Tambah -->
@if (auth()->user()->role->nama == 'Admin')
  <a href="/siswa/create" class="btn btn-primary">Tambah Siswa</a>
@endif

<form action="/siswa" method="GET" enctype="multipart/form-data">
<div class="form-group row mt-3">

  <label for="tahun_ajaran" class="ml-3 mr-3 col-form-label">Tahun ajaran :</label>
  <div class="">
    <select id="tahun_ajaran" name="tahun_ajaran" class="form-control" onchange="location = this.value;">
      <option value="">Pilih</option>
    
      @foreach ($tahun_ajaran as $t)
      
    <option value="/siswa/{{$t->id}}">
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
      
    <option value="/siswa/{{$k->id}}"> {{$k->nama}}</option>
      
      @endforeach
    </select>
  </div>
  
  
  
  {{-- <div class="col-sm-1">
    <button type="submit" class="btn btn-success">Pilih</button>
  </div> --}}

  
</div>
</form>

{{-- <label for="kelas" class="col-1 col-form-label">Kelas :</label>
<div class="">
  <select id="kelas" name="kelas" class="form-control" onchange="location = this.value;">
    <option value="">Pilih</option>
  
    @foreach ($kelas as $k)
    
  <option value="/siswa/{{$k->id}}">
    {{$k->nama}}
      </option>
    
    @endforeach
  </select>
</div> --}}

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
      <th>NIS</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Kelas</th>
      <th>Tahun Ajaran</th>
      <th>Opsi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($siswa as $s)
    <tr>
      <td>{{ $s->nis }}</td>
      <td>{{ $s->nama }}</td>
      <td>{{ $s->jenis_kelamin}}</td>
      <td>{{ $s->kelas->nama ?? ''}}</td>
      <td>{{ $s->tahun_ajaran->nama ?? '' }}</td>
      <td>
        <a href="/siswa/{{$s->nis}}/detail" class="btn btn-info btn-sm">Detail</a>
        @if (auth()->user()->role->nama == 'Admin')
        <a href="/siswa/{{$s->nis}}/edit" class="btn btn-warning btn-sm">Ubah</a>
        <form action="/siswa/{{$s->nis}}/destroy" method="post" class="d-inline">
          @csrf
          @method('DELETE')
          <input type="submit" value="Hapus" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger">
        </form>
      @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection