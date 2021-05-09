@extends('layouts.master')

@section('title', 'Detail Guru BK')
<!-- ########## Guru BK Detail ########## -->
@section('content')

<div class="row mx-auto">
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
        <div class="text-center mb-4">
          <img src="@if(empty($guru_bk->foto))
                      /img/default.jpeg
                    @else
                      {{"/img/" . $guru_bk->foto}}
                    @endif" alt="" height="200px" width="200px" class="rounded">
        </div>
        <hr class="border-info">
        <h6>Nomer Induk Pegawai</h6>
        <P class="text-dark">{{$guru_bk->nip}}</P>
        <hr class="border-info">
        <h6>Nama</h6>
        <p class="text-dark">{{$guru_bk->nama}}</p>
        <hr class="border-info">
        <h6>Jenis Kelamin</h6>
        <p class="text-dark">{{$guru_bk->jenis_kelamin}}</p>
        <hr class="border-info">
        <h6>Tanggal Lahir</h6>
        <p class="text-dark">{{$guru_bk->tanggal_lahir}}</p>
        <hr class="border-info">
      </div>
    </div>
  </div>
  <!-- Border Bottom Utilities -->
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
          <a href="/guru-bk/{{$guru_bk->nip}}/edit" class="btn btn-warning">Ubah</a>
          <a href="/guru-bk" class="btn btn-secondary">Kembali</a>
        <hr class="border-info">
        <h6>Agama</h6>
        <p class="text-dark">{{$guru_bk->agama}}</p>
        <hr class="border-info">
        <h6>Tempat Lahir</h6>
        <p class="text-dark">{{$guru_bk->tempat_lahir}}</p>
        <hr class="border-info">
        <h6>Alamat</h6>
        <p class="text-dark">{{$guru_bk->alamat}}</p>
        <hr class="border-info">
        <h6>Telepon</h6>
        <p class="text-dark">{{$guru_bk->telepon}}</p>
        <hr class="border-info">
        <h6>Email</h6>
        <p class="text-dark">{{$guru_bk->email}}</p>
        <hr class="border-info">
      </div>
    </div>
  </div>
@endsection