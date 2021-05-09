@extends('layouts.master')

@section('title', 'Ubah Profile')

@section('content')

<div class="col-11 mx-auto">
@foreach ($guru_bk as $bk)
<form action="/guru-bk/profile/simpan" method="POST" enctype="multipart/form-data">
  @CSRF
  @method('PUT')
  <input type="hidden" name="{{$bk->nip}}">
  <!-- NIP -->
  {{-- <div class="form-group row">
    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
    <input type="text" id="nip" name="nip" value="{{old('nip') == '' ? $bk->nip : old('nip')}}" class="form-control @error('nip') is-invalid @enderror"  maxlength="50">
    @error('nip')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div> --}}
  <!-- Nama -->
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
    <input type="text" id="nama" name="nama" value="{{old('nama') == '' ? $bk->nama : old('nama')}}" class="form-control @error('nama') is-invalid @enderror"  maxlength="50">
    @error('nama')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <!-- Jenis Kelamin -->
  <div class="form-group row">
    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="Pria" @if($bk->jenis_kelamin == 'Pria') checked @endif>
        <label class="form-check-label" for="pria"> Pria </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="Wanita" @if($bk->jenis_kelamin == 'Wanita') checked @endif>
        <label class="form-check-label" for="wanita"> Wanita </label>
      </div>
    </div>
  </div>
  <!-- Agama -->
<div class="form-group row">
  <label for="agama" class="col-sm-2 col-form-label">Agama</label>
  <div class="col-sm-10">
  <select id="agama" name="agama" class="form-control @error('agama') is-invalid @enderror">
    <option value="Islam" {{$bk->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
    <option value="Kristen" {{$bk->agama == 'Kristen' ? 'selected' : '' }} >Kristen</option>
    <option value="Katolik" {{$bk->agama == 'Katolik' ? 'selected' : '' }} >Katolik</option>
    <option value="Hindu" {{$bk->agama == 'Hindu' ? 'selected' : '' }} >Hindu</option>
    <option value="Budha" {{$bk->agama == 'Budha' ? 'selected' : '' }} >Budha</option>
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
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') == '' ? $bk->tempat_lahir : old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror"  maxlength="50">
    @error('tempat_lahir')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <!-- Tanggal Lahir -->
  <div class="form-group row">
    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
    <div class="col-sm-10">
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') == '' ? $bk->tanggal_lahir : old('tanggal_lahir')}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" min="1960-01-01">
    @error('tanggal_lahir')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <!-- Alamat -->
  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
    <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="20" rows="2">{{old('alamat') == '' ? $bk->alamat : old('alamat')}}</textarea>
    @error('alamat')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <!-- Telepon -->
  <div class="form-group row">
    <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
    <div class="col-sm-10">
    <input type="number" id="telepon" name="telepon" value="{{old('telepon') == '' ? $bk->telepon : old('telepon')}}" class="form-control @error('telepon') is-invalid @enderror">
    @error('telepon')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  <!-- Email -->
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" id="email" name="email" value="{{old('email') == '' ? $bk->email : old('email')}}" class="form-control @error('email') is-invalid @enderror">
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
      <button type="submit" class="btn btn-primary mb-1">Simpan</button>
      <a class="btn btn-secondary mb-1" href="/home">Kembali</a>
    </div>
  </div>
</form>
@endforeach
 
@endsection