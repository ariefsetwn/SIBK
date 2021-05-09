@extends('layouts.master')

@section('title', 'Ubah Data Guru BK')
<!-- ########## Guru BK Edit ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/guru-bk/{{$guru_bk->nip}}/update" method="POST" enctype="multipart/form-data">
  @CSRF
  @method('PUT')
<!-- NIP -->
<div class="form-group row">
  <label for="nip" class="col-sm-2 col-form-label">NIP</label>
  <div class="col-sm-10">
    <input type="text" id="nip" name="nip" value="{{old('nip') == '' ? $guru_bk->nip : old('nip')}}" class="form-control @error('nip') is-invalid @enderror">
    @error('nip')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Nama Guru BK -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
  <div class="col-sm-10">
    <input type="text" id="nama" name="nama" value="{{old('nama') == '' ? $guru_bk->nama : old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Jenis Kelamin -->
<div class="form-group row">
  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
  <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="pria" value="Pria" {{old('jenis_kelamin') == 'Pria' || $guru_bk->jenis_kelamin == 'Pria' ? 'checked' : ''}}>
      <label class="form-check-label" for="pria"> Pria </label>
    </div>
    <div class="form-check">
      <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="wanita" value="Wanita" {{old('jenis_kelamin') == 'Wanita' || $guru_bk->jenis_kelamin == 'Wanita' ? 'checked' : ''}}>
      <label class="form-check-label" for="wanita"> Wanita </label>
        @error('jenis_kelamin')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>
  </div>
</div>
<!-- Agama -->
<div class="form-group row">
  <label for="agama" class="col-sm-2 col-form-label">Agama</label>
  <div class="col-sm-10">
  <select id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror">
    <option value="Islam" {{$guru_bk->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
    <option value="Kristen" {{$guru_bk->agama == 'Kristen' ? 'selected' : '' }} >Kristen</option>
    <option value="Katolik" {{$guru_bk->agama == 'Katolik' ? 'selected' : '' }} >Katolik</option>
    <option value="Hindu" {{$guru_bk->agama == 'Hindu' ? 'selected' : '' }} >Hindu</option>
    <option value="Budha" {{$guru_bk->agama == 'Budha' ? 'selected' : '' }} >Budha</option>
  </select>
  @error('agama')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Tempat Lahir -->
<div class="form-group row">
  <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
  <div class="col-sm-10">
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') == '' ? $guru_bk->tempat_lahir : old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror">
    @error('tempat_lahir')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Tanggal Lahir -->
<div class="form-group row">
  <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
  <div class="col-sm-10">
  <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') == '' ? $guru_bk->tanggal_lahir : old('tanggal_lahir')}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" min="1960-01-01">
  @error('tanggal_lahir')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Alamat -->
<div class="form-group row">
  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
  <div class="col-sm-10">
  <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="20" rows="2">{{old('alamat') == '' ? $guru_bk->alamat : old('alamat')}}</textarea>
  @error('alamat')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Telepon -->
<div class="form-group row">
  <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
  <div class="col-sm-10">
    <input type="text" id="telepon" name="telepon" value="{{old('telepon') == '' ? $guru_bk->telepon : old('telepon')}}" class="form-control @error('telepon') is-invalid @enderror">
    @error('telepon')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Email -->
<div class="form-group row">
  <label for="email" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="email" id="email" name="email" value="{{old('email') == '' ? $guru_bk->email : old('email')}}" class="form-control @error('email') is-invalid @enderror">
    @error('email')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
</div>
<!-- Foto -->
<div class="form-group row">
  <label for="foto" class="col-sm-2 col-form-label">Foto</label>
  <div class="col-sm-10">
    <input type="file" id="foto" name="foto" class="form-control @error('foto') is-invalid @enderror" accept=".jpg,.jpeg,.png">
    @error('foto')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
  </div>
</div>
<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/guru-bk" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection