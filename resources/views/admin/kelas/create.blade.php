@extends('layouts.master')

@section('title', 'Tambah Kelas')
<!-- ########## Kelas Create  ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/kelas/store" method="POST" enctype="multipart/form-data">
  @CSRF
<!-- Kelas -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Kelas</label>
  <div class="col-sm-10">
    <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>

<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/kelas" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection