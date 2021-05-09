@extends('layouts.master')

@section('title', 'Ubah Pelanggaran')
<!-- ########## Pelanggaran Create  ########## -->
@section('content')

@if (!empty(session('pesan')))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button> 
	<strong>{{session('pesan')}}</strong>
</div>
@endif
<div class="col-11 mx-auto">
<!-- Form -->
<form action="/pelanggaran-siswa/{{$pelanggaran_siswa->id}}/update" method="POST">
  @CSRF
  @method('PUT')
  <input type="hidden" name="id_kategori" value="{{$pelanggaran_siswa->kategori_id}}">
  {{-- <fieldset disabled> --}}
  <!-- Siswa -->
  <div class="form-group row">
    <label for="disabledSelect" class="col-sm-2 col-form-label">Siswa</label>
    <div class="col-sm-10">
    <select id="disabledSelect" name="nis" disabled class="form-control @error('nis') is-invalid @enderror">
      @foreach ($siswa as $i)
        @if ($i->nis)
          <option value="{{$i->nis}}" {{old('nis') == $i->nis  || $pelanggaran_siswa->nis == $i->nis ? 'selected' : ''}}> {{$i->nis}} | {{$i->nama}} </option>
        @endif
      @endforeach
    </select>
    @error('nis')
      <div class="invalid-feedback"> {{ $message }} </div>
    @enderror
    </div>
  </div>
  {{-- <div class="form-group row">
    <label for="disabledSelect" class="col-sm-2 col-form-label">Siswa</label>
    <div class="col-sm-10">
      <input type="wadidaw" value="{{$pelanggaran_siswa->siswa->nama}}" disabled>  
    </div>
  </div> --}}
<input type="hidden" name="nis" value="{{$pelanggaran_siswa->nis}}">

{{-- </fieldset> --}}
  <!-- kategori -->
<div class="form-group row">
  <label for="kategori_id" class="col-sm-2 col-form-label">Kategori</label>
  <div class="col-sm-10">
  <select id="kategori_id" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
    @foreach ($kategori as $i)
      @if ($i->nama)
        <option value="{{$i->id}}" {{old('kategori_id') == $i->id  || $pelanggaran_siswa->kategori_id == $i->id ? 'selected' : ''}}>{{$i->poin}} | {{$i->nama}}</option>
      @endif
    @endforeach
  </select>
  @error('kategori_id')
    <div class="invalid-feedback"> {{ $message }} </div>
  @enderror
  </div>
</div>
<!-- Keterangan -->
<div class="form-group row">
  <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
  <div class="col-sm-10">
  <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" cols="20" rows="2">{{old('keterangan') == '' ? $pelanggaran_siswa->keterangan : old('keterangan')}}</textarea>
  @error('keterangan')
    <div class="invalid-feedback"> {{$message}} </div>
  @enderror
  </div>
</div>
<!-- Button -->
<div class="form-group row">
  <div class="col-sm-2 col-form-label"></div>
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/pelanggaran-siswa" class="btn btn-secondary">Kembali</a>
  </div>
</div>
</form>
@endsection