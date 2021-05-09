@extends('layouts.master')

@section('title', 'Tambah Siswa')
<!-- ########## Siswa Create  ########## -->
@section('content')

<div class="col-11 mx-auto">
<!-- Form -->
<form action="/siswa/store" method="POST" enctype="multipart/form-data">
  @CSRF
{{-- <h3>Biodata Siswa</h3>
<br> --}}
  
<!-- NIS -->
<div class="form-group row">
  <label for="nis" class="col-sm-2 col-form-label">NIS</label>
  <div class="col-sm-10">
    <input type="text" id="nis" name="nis" value="{{old('nis')}}" class="form-control @error('nis') is-invalid @enderror">
    @error('nis')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Nama Siswa -->
<div class="form-group row">
  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
  <div class="col-sm-10">
    <input type="text" name="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
    @error('nama')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Kelas -->
<div class="form-group row">
  <label for="kelas_id" class="col-sm-2 col-form-label">Kelas</label>
  <div class="col-sm-10">
  <select id="kelas_id" name="kelas_id" class="form-control @error('kelas_id') is-invalid @enderror">
    <option value="">Pilih</option>
    @foreach ($kelas as $k)
      <option value="{{$k->id}}" {{old('kelas_id') == $k->id ? 'selected' : '' }}> {{$k->nama}} </option>
    @endforeach
  </select>
  @error('kelas_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Tahun Ajaran -->
<div class="form-group row">
  <label for="tahun_ajaran_id" class="col-sm-2 col-form-label">Tahun Ajaran</label>
  <div class="col-sm-10">
  <select id="tahun_ajaran_id" name="tahun_ajaran_id" class="form-control @error('tahun_ajaran_id') is-invalid @enderror">
    <option value="">Pilih</option>
    @foreach ($tahun_ajaran as $ta)
      <option value="{{$ta->id}}" {{old('tahun_ajaran_id') == $ta->id ? 'selected' : '' }}> {{$ta->nama}} </option>
    @endforeach
  </select>
  @error('tahun_ajaran_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Jenis Kelamin -->
<div class="form-group row">
  <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
  <div class="col-sm-10">
    <div class="form-check">
      <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="pria" value="Pria" {{old('jenis_kelamin') == 'Pria' ? 'checked' : ''}}>
      <label class="form-check-label" for="pria"> Pria </label>
    </div>
    <div class="form-check">
      <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="wanita" value="Wanita" {{old('jenis_kelamin') == 'Wanita' ? 'checked' : ''}}>
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
    <option value="">Pilih</option>
    <option value="Islam">islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Katolik">Katolik</option>
    <option value="Hindu">Hindu</option>
    <option value="Budha">Budha</option>
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
    <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control @error('tempat_lahir') is-invalid @enderror">
    @error('tempat_lahir')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Tanggal Lahir -->
<div class="form-group row">
  <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
  <div class="col-sm-10">
  <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" class="form-control @error('tanggal_lahir') is-invalid @enderror" min="2000-01-01">
  @error('tanggal_lahir')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Alamat -->
<div class="form-group row">
  <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
  <div class="col-sm-10">
  <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="20" rows="2">{{old('alamat')}}</textarea>
  @error('alamat')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Telepon -->
<div class="form-group row">
  <label for="telepon" class="col-sm-2 col-form-label">Telepon</label>
  <div class="col-sm-10">
    <input type="text" id="telepon" name="telepon" value="{{old('telepon')}}" class="form-control @error('telepon') is-invalid @enderror">
    @error('telepon')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
</div>
<!-- Email -->
<div class="form-group row">
  <label for="email" class="col-sm-2 col-form-label">Email</label>
  <div class="col-sm-10">
    <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror">
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

<hr class="border-info">
<h3>Biodata Orang Tua Siswa</h3>
<br>
    
    <!-- Nama Siswa -->
    <div class="form-group row">
      <label for="nama_ortu" class="col-sm-2 col-form-label">Nama Orang Tua</label>
      <div class="col-sm-10">
        <input type="text" name="nama_ortu" value="{{old('nama_ortu')}}" class="form-control @error('nama_ortu') is-invalid @enderror">
        @error('nama_ortu')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>
    </div>
    
    
    <!-- Telepon -->
    <div class="form-group row">
      <label for="telepon_ortu" class="col-sm-2 col-form-label">Telepon</label>
      <div class="col-sm-10">
        <input type="text" id="telepon_ortu" name="telepon_ortu" value="{{old('telepon_ortu')}}" class="form-control @error('telepon_ortu') is-invalid @enderror">
        @error('telepon_ortu')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>
    </div>
    
    <!-- pekerjaan -->
    <div class="form-group row">
      <label for="pekerjaan_ortu" class="col-sm-2 col-form-label">Pekerjaan</label>
      <div class="col-sm-10">
        <input type="text" id="pekerjaan_ortu" name="pekerjaan_ortu" value="{{old('pekerjaan_ortu')}}" class="form-control @error('pekerjaan_ortu') is-invalid @enderror">
        @error('pekerjaan_ortu')
        <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>
    </div>
    
    <!-- Alamat -->
    <div class="form-group row">
      <label for="alamat_ortu" class="col-sm-2 col-form-label">Alamat</label>
      <div class="col-sm-10">
        <textarea id="alamat_ortu" name="alamat_ortu" class="form-control @error('alamat_ortu') is-invalid @enderror" cols="20" rows="2">{{old('alamat_ortu')}}</textarea>
        @error('alamat_ortu')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
    </div>
    
    <!-- Button -->
    <div class="form-group row">
      <div class="col-sm-2 col-form-label"></div>
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/siswa" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
    
    
</form>

@endsection