@extends('layouts.master')

@section('title', 'Ubah Kategori Pelanggaran')
<!-- ########## kategori Edit  ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/kategori/{{$kategori->id}}/update" method="POST">
  @CSRF
  @method('PUT')
<!-- Nama kategori -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggaran</label>
  <div class="col-sm-10">
    <input type="text" id="nama" name="nama" value="{{old('nama') == '' ? $kategori->nama : old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Poin -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Poin</label>
  <div class="col-sm-10">
    <input type="text" id="poin" name="poin" value="{{old('poin') == '' ? $kategori->poin : old('poin')}}" class="form-control @error('poin') is-invalid @enderror">
    @error('poin')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/kategori" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection