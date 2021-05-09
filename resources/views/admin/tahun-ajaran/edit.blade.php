@extends('layouts.master')

@section('title', 'Ubah Tahun Ajaran')
<!-- ########## Tahun Ajaran Edit  ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/tahun-ajaran/{{$tahun_ajaran->id}}/update" method="POST">
  @CSRF
  @method('PUT')
<!-- Tahun Ajaran -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Tahun Ajaran</label>
  <div class="col-sm-10">
    <input type="text" id="nama" name="nama" value="{{old('nama') == '' ? $tahun_ajaran->nama : old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
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
    <option value="aktif" @if(old('is_active') == 'aktif' || $tahun_ajaran->nama == 'aktif') selected @endif>Aktif</option>
    <option value="non-aktif" @if(old('is_active') == 'non-aktif' || $tahun_ajaran->nama == 'non-aktif') selected @endif>Tidak Aktif</option>
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