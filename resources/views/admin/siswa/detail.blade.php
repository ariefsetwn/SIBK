@extends('layouts.master')

@section('title', 'Detail Siswa')
<!-- ########## Siswa Detail  ########## -->
@section('content')

<div class="row mx-auto">
  @forelse ($siswa as $s)
    <div class="col-6">
    <div class="card shadow border-left-primary">
    <div class="card-body">
      <h3>Biodata Siswa</h3>
    <div class="text-center mb-4">
      <img src="@if(empty($s->foto))
        /img/default.jpeg
                @else
                {{"/img/" . $s->foto}}
                @endif" alt="" height="200px" width="200px" class="rounded img-fluid">
    </div>
    <h6>Nomor Induk Siswa</h6>
    <p class="text-dark">{{$s->nis}}</p>
    <hr class="border-info">
    <h6>Nama</h6>
    <p class="text-dark">{{$s->nama}}</p>
    <hr class="border-info">
    <h6>Jenis Kelamin</h6>
    <p class="text-dark">{{$s->jenis_kelamin}}</p>
    <hr class="border-info">
    <h6>Tanggal Lahir</h6>
    <p class="text-dark">{{$s->tanggal_lahir}}</p>
    <hr class="border-info">
    <h6>Agama</h6>
    <p class="text-dark">{{$s->agama}}</p>
    <hr class="border-info">
    <h6>Tempat Lahir</h6>
    <p class="text-dark">{{$s->tempat_lahir}}</p>
    <hr class="border-info">
    <h6>Alamat</h6>
    <p class="text-dark">{{$s->alamat}}</p>
    <hr class="border-info">
    <h6>Kelas</h6>
    <p class="text-dark">{{$s->nama_kelas}}</p>
    <hr class="border-info">
    <h6>Tahun Ajaran</h6>
    <p class="text-dark">{{$s->nama_tahun_ajaran}}</p>
    <hr class="border-info">
    <h6>Telepon</h6>
    <p class="text-dark">{{$s->telepon}}</p>
    <hr class="border-info">
    <h6>Email</h6>
    <p class="text-dark">{{$s->email}}</p>
    <hr class="border-info">
  </div>
</div>
</div>

<!-- Border Bottom Utilities -->
<div class="col-6">
  <div class="card shadow border-left-primary">
    <div class="card-body">
      @if (auth()->user()->role->nama == 'Admin')
        <a href="/siswa/{{$s->nis}}/edit" class="btn btn-warning">Ubah</a>
      @endif
      <x-button link="/siswa" type="secondary" text="Kembali"/>
      <hr class="border-info">
      <h3>Biodata Orang Tua Siswa</h3>
      <hr class="border-info">
      <h6>Nama Orang Tua Siswa</h6>
      <p class="text-dark">{{$s->nama_ortu}}</p>
      <hr class="border-info">
      <h6>Telepon</h6>
      <p class="text-dark">{{$s->telepon_ortu}}</p>
      <hr class="border-info">
      <h6>Pekerjaan</h6>
      <p class="text-dark">{{$s->pekerjaan_ortu}}</p>
      <hr class="border-info">
      <h6>Alamat</h6>
      <p class="text-dark">{{$s->alamat_ortu}}</p>
      <hr class="border-info">
    </div>
  </div>
</div>



      @empty
      <h3 class="center">Siswa tidak ditemukan</h3>
      @endforelse
@endsection