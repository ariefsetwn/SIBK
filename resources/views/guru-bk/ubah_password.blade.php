@extends('layouts.master')

@section('title', 'Ubah Password')
<!-- ########## Siswa Ubah Password  ########## -->
@section('content')

<div class="col-11 mx-auto">
  @if (!empty(session('pesan')))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ session('pesan') }}</strong>
  </div>
  @endif
  @if (!empty(session('error')))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ session('error') }}</strong>
  </div>
  @endif
  <form action="/guru-bk/ubah-password/simpan" method="post">
    @csrf
    @method('PUT')
  <div class="form-group row">
    <label for="old_password" class="col-sm-3 col-form-label">Password Lama</label>
    <div class="col-sm-9">
    <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" name="old_password">
    @error('old_password')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-3 col-form-label">Password Baru</label>
    <div class="col-sm-9">
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
    @error('password')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="password-confirm" class="col-sm-3 col-form-label">Ulangi Password</label>
    <div class="col-sm-9">
    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation">
    @error('password_confirmation')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-3 col-form-label"></div>
    <div class="col-sm-9">
      <button type="submit" class="btn btn-primary">Simpan Data</button>
      <a class="btn btn-secondary" href="/home">Kembali</a>
    </div>
  </div>
</form>
  @endsection