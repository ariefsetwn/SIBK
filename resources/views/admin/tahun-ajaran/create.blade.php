@extends('layouts.master')

@section('title', 'Tambah Tahun Ajaran')
<!-- ########## Tahun Ajaran Create  ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/tahun-ajaran/store" method="POST">
  @CSRF
<!-- Tahun Ajaran -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Tahun Ajaran</label>
  <div class="col-sm-10">
    <input type="text" id="nama" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Is Active / Status -->
<div class="form-group row">
  <label for="is_active" class="col-sm-2 col-form-label">Status</label>
  <div class="col-sm-10">
  <select id="is_active" name="is_active" class="form-control @error('is_active') is-invalid @enderror">
    <option value="">Pilih</option>
    <option value="aktif" @if(old('is_active') == 'aktif') selected @endif>Aktif</option>
    <option value="non-aktif" @if(old('is_active') == 'non-aktif') selected @endif>Tidak Aktif</option>
  </select>
  @error('is_active')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/tahun-ajaran" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection