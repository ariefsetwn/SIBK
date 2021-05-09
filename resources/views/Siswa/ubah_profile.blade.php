@extends('layouts.master')

@section('title', 'Ubah Profile')
<!-- Role Siswa Profile Edit -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/siswa/profile/simpan" method="POST" enctype="multipart/form-data">
  @CSRF
  @method('PUT')
<!-- NIS -->
<input type="hidden" name="nis" value="{{$siswa->nis}}">
<!-- Nama Siswa -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
  <div class="col-sm-10">
    <input type="text" name="nama" value="{{old('nama') == '' ? $siswa->nama : old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<input type="hidden" name="kelas_id" value="{{$siswa->kelas_id}}">
<input type="hidden" name="tahun_ajaran_id" value="{{$siswa->tahun_ajaran_id}}">
<!-- Kelas -->
{{-- <div class="form-group row">
  <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
  <div class="col-sm-10">
  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
    @foreach ($kelas as $k)
      <option value="{{$k->id}}" {{($siswa->kelas_id == $k->id) || (old('kelas_id') == $k->id) ? 'selected' : ''}}> {{$k->nama}} </option>
    @endforeach  
  </select>
  @error('kelas_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div> --}}
<!-- Tahun Ajaran -->
{{-- <div class="form-group row">
  <label for="tahun_ajaran_id" class="col-sm-2 col-form-label">Tahun Ajaran</label>
  <div class="col-sm-10">
  <select id="tahun_ajaran_id" name="tahun_ajaran_id" class="form-control @error('tahun_ajaran_id') is-invalid @enderror">
    @foreach ($tahun_ajaran as $ta)
      <option value="{{$ta->id}}" {{($siswa->tahun_ajaran_id == $ta->id) || (old('tahun_ajaran_id') == $ta->id) ? 'selected' : ''}}> {{$ta->nama}} </option>
    @endforeach
  </select>
  @error('tahun_ajaran_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div> --}}
<!-- Jenis Kelamin -->
<div class="form-group row">
  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
  <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="pria" value="Pria" {{old('jenis_kelamin') == 'Pria' || $siswa->jenis_kelamin == 'Pria' ? 'checked' : ''}}>
      <label class="form-check-label" for="pria"> Pria </label>
    </div>
    <div class="form-check">
      <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="wanita" value="Wanita" {{old('jenis_kelamin') == 'Wanita' || $siswa->jenis_kelamin == 'Wanita' ? 'checked' : ''}}>
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
    <option value="Islam" {{$siswa->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
    <option value="Kristen" {{$siswa->agama == 'Kristen' ? 'selected' : '' }} >Kristen</option>
    <option value="Katolik" {{$siswa->agama == 'Katolik' ? 'selected' : '' }} >Katolik</option>
    <option value="Hindu" {{$siswa->agama == 'Hindu' ? 'selected' : '' }} >Hindu</option>
    <option value="Budha" {{$siswa->agama == 'Budha' ? 'selected' : '' }} >Budha</option>
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
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir') == '' ? $siswa->tempat_lahir : old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror">
    @error('tempat_lahir')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Tanggal Lahir -->
<div class="form-group row">
  <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
  <div class="col-sm-10">
  <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir') == '' ? $siswa->tanggal_lahir : old('tanggal_lahir')}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" min="2000-01-01">
  @error('tanggal_lahir')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Alamat -->
<div class="form-group row">
  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
  <div class="col-sm-10">
  <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="20" rows="2">{{old('alamat') == '' ? $siswa->alamat : old('alamat')}}</textarea>
  @error('alamat')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Telepon -->
<div class="form-group row">
  <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
  <div class="col-sm-10">
    <input type="text" id="telepon" name="telepon" value="{{old('telepon') == '' ? $siswa->telepon : old('telepon')}}" class="form-control @error('telepon') is-invalid @enderror">
    @error('telepon')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Email -->
<div class="form-group row">
  <label for="email" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="email" id="email" name="email" value="{{old('email') == '' ? $siswa->email : old('email')}}" class="form-control @error('email') is-invalid @enderror">
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
    <a href="/siswa/profile" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>

@endsection