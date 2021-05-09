@extends('layouts.master')

@section('title', 'Detail Pelanggaran Siswa')
<!-- ########## Detail Pelanggaran Siswa  ########## -->
@section('content')

<div class="row mx-auto">
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
        @foreach ($pelanggaran_siswa as $p)
        <form action="/pelanggaran-siswa/{{$p->id}}/update" method="POST" class="d-inline">
          @CSRF
          @method('PUT')
          <input type="hidden" name="detail" value="detail">
          <input type="hidden" name="id_kategori" value="{{$p->id_kategori}}">
          <input type="hidden" name="kategori_id" value="{{$p->id_kategori}}">
          <input type="hidden" name="nis" value="{{$p->nis}}">
        </form>
        <form action="/pelanggaran-siswa/{{$p->id}}/update" method="POST" class="d-inline">
          @CSRF
          @method('PUT')
          <input type="hidden" name="detail" value="detail">
          <input type="hidden" name="id_kategori" value="{{$p->id_kategori}}">
          <input type="hidden" name="kategori_id" value="{{$p->id_kategori}}">
          <input type="hidden" name="nis" value="{{$p->nis}}">
        </form>
        <a href="/pelanggaran-siswa/{{$p->id}}/edit" class="btn btn-warning ">Ubah</a>
        <x-button link="/pelanggaran-siswa" text="Kembali" type="secondary"/>
        <hr class="border-info">
        <h6>NIS</h6>
        <p class="text-dark">{{$p->nis}}</p>
        <hr class="border-info">
        <h6>Nama</h6>
        <p class="text-link">{{$p->nama_siswa}}</p>
        <hr class="border-info">
        <h6>Kelas</h6>
        <p class="text-dark">{{$p->nama_kelas}}</p>
        <hr class="border-info">
      </div>
    </div>
  </div>
  
  <!-- Border Bottom Utilities -->
  <div class="col-6">
    <div class="card shadow border-left-primary">
      <div class="card-body">
        
       
        <h6>Tanggal Pelanggaran</h6>
        <p class="text-dark">{{$p->tanggal}}</p>
        <hr class="border-info">
        <h6>Kategori Pelanggaran</h6>
        <p class="text-link">{{$p->nama_kategori}}</p>
        <hr class="border-info">
        <h6>Poin</h6>
        <p class="text-dark">{{$p->poin}}</p>
        <hr class="border-info">
        <h6>Keterangan</h6>
        <p class="text-dark">{{$p->keterangan}}</p>
        <hr class="border-info">
      </div>
    </div>
  </div>
  @endforeach
@endsection