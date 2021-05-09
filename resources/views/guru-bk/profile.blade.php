@extends('layouts.master')

@section('title', 'Guru BK')

@section('content')

<!-- Border Left Utilities -->
<div class="row mx-auto">
  @forelse ($guru_bk as $bk)
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
        <div class="text-center mb-4">
          <img src="@if(empty($bk->foto))
                    /img/default.jpeg
                    @else
                    {{"/img/" . $bk->foto}}
                    @endif" alt="" height="200px" width="200px" class="rounded">
        </div>
        <hr class="border-info">
        <h6>Nomer Induk Pegawai</h6>
        <p class="text-dark">{{$bk->nip}}</p>
        <hr class="border-info">
        <h6>Nama</h6>
        <p class="text-dark">{{$bk->nama}}</p>
        <hr class="border-info">
        <h6>Jenis Kelamin</h6>
        <p class="text-dark">{{$bk->jenis_kelamin}}</p>
        <hr class="border-info">
        <h6>Agama</h6>
        <p class="text-dark">{{$bk->agama}}</p>
        <hr class="border-info">
      </div>
    </div>
  </div>
  
  <!-- Border Bottom Utilities -->
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
        {{-- <a href="/guru-bk/profile/ubah" class="btn btn-warning">Ubah</a> --}}
        <a href="/home" class="btn btn-secondary">Kembali</a>
        <hr class="border-info">
        <h6>Tanggal Lahir</h6>
        <p class="text-dark">{{$bk->tanggal_lahir}}</p>
        <hr class="border-info">
        <h6>Tempat Lahir</h6>
        <p class="text-dark">{{$bk->tempat_lahir}}</p>
        <hr class="border-info">
        <h6>Alamat</h6>
        <p class="text-dark">{{$bk->alamat}}</p>
        <hr class="border-info">
        <h6>Telepon</h6>
        <p class="text-dark">{{$bk->telepon}}</p>
        <hr class="border-info">
        <h6>Email</h6>
        <p class="text-dark">{{$bk->email}}</p>
        <hr class="border-info">
        
      </div>
    </div>
  </div>

  @empty
  <h3 class="center">Data tidak ditemukan</h3>
@endforelse

@endsection