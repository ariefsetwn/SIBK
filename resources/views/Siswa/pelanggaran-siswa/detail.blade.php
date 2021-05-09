@extends('layouts.master')

@section('title', 'Detail Pelanggaran')
<!-- ########## SISWA Pelanggaran Detail  ########## -->
@section('content')

<div class="row mx-auto">
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
        @forelse ($pelanggaran_siswa as $p)
        <h6>NIS</h6>
        <p class="text-dark">{{$p->nis}}</p>
        <hr class="border-info">
        <h6>Nama Siswa</h6>
        <a href="/siswa/profile"><p class="text-link">{{$p->nama_siswa}}</p></a>
        <hr class="border-info">
        <h6>Kelas</h6>
        <p class="text-dark">{{$p->nama_kelas}}</p>
      </div>
    </div>
  </div>

  <!-- Border Bottom Utilities -->
  <div class="col-6">
    <div class="card shadow border-bottom-primary">
      <div class="card-body">
        <h6>Tanggal Pelanggaran</h6>
        <p class="text-dark">{{$p->tanggal}}</p>
        <hr class="border-info">
        <h6>Kategori Pelanggaran</h6>
        <p class="text-dark">{{$p->nama_kategori}}</p>
        <hr class="border-info">
        <h6>Keterangan</h6>
        <p class="text-dark">{{$p->keterangan}}</p>
        
      </div>
    </div>
  </div>
  @empty
  <p>Anda belum mendaftar</p>
  @endforelse
@endsection